<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;

class PembayaranController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = config('services.midtrans.is_sanitized');
        Config::$is3ds = config('services.midtrans.is_3ds');
    }


    public function checkout($pemesananId)
    {
        $pemesanan = Pemesanan::with(['lapangan', 'jadwal'])->findOrFail($pemesananId);

        if ($pemesanan->payment_status === 'paid') {
            return redirect()->route('pembayaran.sukses', $pemesananId)
                ->with('info', 'Pemesanan ini sudah dibayar.');
        }

        $pemesanan->order_id = 'ORDER-' . time() . '-' . $pemesanan->id;
        $pemesanan->snap_token = null; // Reset snap token lama
        $pemesanan->save();

        $transactionDetails = [
            'order_id' => $pemesanan->order_id,
            'gross_amount' => (int) $pemesanan->total_price,
        ];

        $items = [
            [
                'id' => $pemesanan->lapangan->id,
                'price' => (int) $pemesanan->lapangan->harga_per_jam,
                'quantity' => $pemesanan->duration,
                'name' => $pemesanan->lapangan->nama_lapangan,
            ]
        ];

        $customerDetails = [
            'first_name' => $pemesanan->customer_name,
            'email' => $pemesanan->customer_email,
            'phone' => $pemesanan->customer_phone,
        ];

        $expiryTime = now()->addHour()->format('Y-m-d H:i:s O'); 

        $midtransParams = [
            'transaction_details' => $transactionDetails,
            'item_details' => $items,
            'customer_details' => $customerDetails,
            'expiry' => [
                'start_time' => now()->format('Y-m-d H:i:s O'),
                'unit' => 'minutes',
                'duration' => 15,
            ],
        ];

        try {
            Log::info('Membuat Snap Token untuk Order ID: ' . $pemesanan->order_id, [
                'pemesanan_id' => $pemesanan->id,
                'total_price' => $pemesanan->total_price,
            ]);

            $snapToken = Snap::getSnapToken($midtransParams);
            
            Log::info('Snap Token berhasil dibuat: ' . $snapToken);

            $pemesanan->snap_token = $snapToken;
            $pemesanan->payment_status = 'pending';
            $pemesanan->save();

            return view('payment.checkout', [
                'pemesanan' => $pemesanan,
                'snapToken' => $snapToken,
                'clientKey' => config('services.midtrans.client_key'),
            ]);

        } catch (\Exception $e) {
            Log::error('Error saat membuat Snap Token: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return back()
                ->with('error', 'Gagal membuat pembayaran. Silakan coba lagi.')
                ->with('error_detail', 'Error: ' . $e->getMessage());
        }
    }


    public function callback(Request $request)
    {
        try {
            $notification = new Notification();

            $transactionStatus = $notification->transaction_status;
            $fraudStatus = $notification->fraud_status;
            $orderId = $notification->order_id;

            Log::info('Notifikasi Midtrans diterima', [
                'order_id' => $orderId,
                'transaction_status' => $transactionStatus,
                'fraud_status' => $fraudStatus,
            ]);

            $pemesanan = Pemesanan::where('order_id', $orderId)->firstOrFail();

            $pemesanan->transaction_id = $notification->transaction_id;

            if ($transactionStatus == 'capture') {
                if ($fraudStatus == 'accept') {
                    $pemesanan->payment_status = 'paid';
                    $pemesanan->status = 'confirmed';
                    $pemesanan->paid_at = now();
                    $pemesanan->payment_method = $notification->payment_type;
                    
                    $startDate = $pemesanan->jadwal->date;
                    $startTime = $pemesanan->jadwal->start_time;
                    $duration = $pemesanan->duration;
                    $courtId = $pemesanan->court_id;

                    for ($i = 0; $i < $duration; $i++) {
                        $jadwalStartTime = \Carbon\Carbon::parse($startTime)->addHours($i)->format('H:i');
                        
                        \App\Models\Jadwal::where('court_id', $courtId)
                            ->where('date', $startDate)
                            ->where('start_time', $jadwalStartTime)
                            ->update(['status' => 'terboking']);
                    }
                }
            } else if ($transactionStatus == 'settlement') {
                $pemesanan->payment_status = 'paid';
                $pemesanan->status = 'confirmed';
                $pemesanan->paid_at = now();
                $pemesanan->payment_method = $notification->payment_type;
                
                $startDate = $pemesanan->jadwal->date;
                $startTime = $pemesanan->jadwal->start_time;
                $duration = $pemesanan->duration;
                $courtId = $pemesanan->court_id;

                for ($i = 0; $i < $duration; $i++) {
                    $jadwalStartTime = \Carbon\Carbon::parse($startTime)->addHours($i)->format('H:i');
                    
                    \App\Models\Jadwal::where('court_id', $courtId)
                        ->where('date', $startDate)
                        ->where('start_time', $jadwalStartTime)
                        ->update(['status' => 'terboking']);
                }
            } else if ($transactionStatus == 'pending') {
                $pemesanan->payment_status = 'pending';
            } else if ($transactionStatus == 'cancel') {
                $pemesanan->payment_status = 'failed';
                $pemesanan->status = 'cancelled';
                
                $startDate = $pemesanan->jadwal->date;
                $startTime = $pemesanan->jadwal->start_time;
                $duration = $pemesanan->duration;
                $courtId = $pemesanan->court_id;

                for ($i = 0; $i < $duration; $i++) {
                    $jadwalStartTime = \Carbon\Carbon::parse($startTime)->addHours($i)->format('H:i');
                    
                    \App\Models\Jadwal::where('court_id', $courtId)
                        ->where('date', $startDate)
                        ->where('start_time', $jadwalStartTime)
                        ->update(['status' => 'tersedia']);
                }
            } else if ($transactionStatus == 'deny' || $transactionStatus == 'expire') {
                $pemesanan->payment_status = 'failed';
                $pemesanan->status = 'cancelled';
                
                // Update SEMUA jadwal untuk durasi booking
                $startDate = $pemesanan->jadwal->date;
                $startTime = $pemesanan->jadwal->start_time;
                $duration = $pemesanan->duration;
                $courtId = $pemesanan->court_id;

                for ($i = 0; $i < $duration; $i++) {
                    $jadwalStartTime = \Carbon\Carbon::parse($startTime)->addHours($i)->format('H:i');
                    
                    \App\Models\Jadwal::where('court_id', $courtId)
                        ->where('date', $startDate)
                        ->where('start_time', $jadwalStartTime)
                        ->update(['status' => 'tersedia']);
                }
            }

            $pemesanan->save();

            return response()->json(['status' => 'success']);

        } catch (\Exception $e) {
            Log::error('Error di callback Midtrans: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }


    public function sukses($pemesananId)
    {
        $pemesanan = Pemesanan::with(['lapangan', 'jadwal'])->findOrFail($pemesananId);

        return view('payment.success', compact('pemesanan'));
    }

    public function pending($pemesananId)
    {
        $pemesanan = Pemesanan::with(['lapangan', 'jadwal'])->findOrFail($pemesananId);

        return view('payment.pending', compact('pemesanan'));
    }


    public function gagal($pemesananId)
    {
        $pemesanan = Pemesanan::with(['lapangan', 'jadwal'])->findOrFail($pemesananId);

        return view('payment.failed', compact('pemesanan'));
    }


    public function cekStatus($pemesananId)
    {
        $pemesanan = Pemesanan::with('jadwal')->findOrFail($pemesananId);

        try {
            if ($pemesanan->order_id) {
                $status = \Midtrans\Transaction::status($pemesanan->order_id);
                
                Log::info('Cek status Midtrans untuk Order ID: ' . $pemesanan->order_id, [
                    'transaction_status' => $status->transaction_status,
                    'fraud_status' => $status->fraud_status ?? null,
                ]);

                $transactionStatus = $status->transaction_status;
                $fraudStatus = $status->fraud_status ?? 'accept';

                if ($transactionStatus == 'capture') {
                    if ($fraudStatus == 'accept') {
                        $pemesanan->payment_status = 'paid';
                        $pemesanan->status = 'confirmed';
                        $pemesanan->paid_at = now();
                        $pemesanan->payment_method = $status->payment_type;
                        $pemesanan->transaction_id = $status->transaction_id;
                        
                        $startDate = $pemesanan->jadwal->date;
                        $startTime = $pemesanan->jadwal->start_time;
                        $duration = $pemesanan->duration;
                        $courtId = $pemesanan->court_id;

                        for ($i = 0; $i < $duration; $i++) {
                            $jadwalStartTime = \Carbon\Carbon::parse($startTime)->addHours($i)->format('H:i');
                            
                            \App\Models\Jadwal::where('court_id', $courtId)
                                ->where('date', $startDate)
                                ->where('start_time', $jadwalStartTime)
                                ->update(['status' => 'terboking']);
                        }
                    }
                } else if ($transactionStatus == 'settlement') {
                    $pemesanan->payment_status = 'paid';
                    $pemesanan->status = 'confirmed';
                    $pemesanan->paid_at = now();
                    $pemesanan->payment_method = $status->payment_type;
                    $pemesanan->transaction_id = $status->transaction_id;
                    
                    $startDate = $pemesanan->jadwal->date;
                    $startTime = $pemesanan->jadwal->start_time;
                    $duration = $pemesanan->duration;
                    $courtId = $pemesanan->court_id;

                    for ($i = 0; $i < $duration; $i++) {
                        $jadwalStartTime = \Carbon\Carbon::parse($startTime)->addHours($i)->format('H:i');
                        
                        \App\Models\Jadwal::where('court_id', $courtId)
                            ->where('date', $startDate)
                            ->where('start_time', $jadwalStartTime)
                            ->update(['status' => 'terboking']);
                    }
                } else if ($transactionStatus == 'pending') {
                    $pemesanan->payment_status = 'pending';
                } else if ($transactionStatus == 'cancel') {
                    $pemesanan->payment_status = 'failed';
                    $pemesanan->status = 'cancelled';
                    
                    $startDate = $pemesanan->jadwal->date;
                    $startTime = $pemesanan->jadwal->start_time;
                    $duration = $pemesanan->duration;
                    $courtId = $pemesanan->court_id;

                    for ($i = 0; $i < $duration; $i++) {
                        $jadwalStartTime = \Carbon\Carbon::parse($startTime)->addHours($i)->format('H:i');
                        
                        \App\Models\Jadwal::where('court_id', $courtId)
                            ->where('date', $startDate)
                            ->where('start_time', $jadwalStartTime)
                            ->update(['status' => 'tersedia']);
                    }
                } else if (in_array($transactionStatus, ['deny', 'expire'])) {
                    $pemesanan->payment_status = 'failed';
                    $pemesanan->status = 'cancelled';
                    $startDate = $pemesanan->jadwal->date;
                    $startTime = $pemesanan->jadwal->start_time;
                    $duration = $pemesanan->duration;
                    $courtId = $pemesanan->court_id;

                    for ($i = 0; $i < $duration; $i++) {
                        $jadwalStartTime = \Carbon\Carbon::parse($startTime)->addHours($i)->format('H:i');
                        
                        \App\Models\Jadwal::where('court_id', $courtId)
                            ->where('date', $startDate)
                            ->where('start_time', $jadwalStartTime)
                            ->update(['status' => 'tersedia']);
                    }
                }

                $pemesanan->save();
            }
        } catch (\Exception $e) {
            Log::error('Error cek status Midtrans: ' . $e->getMessage());
        }

        return response()->json([
            'payment_status' => $pemesanan->payment_status,
            'status' => $pemesanan->status,
            'paid_at' => $pemesanan->paid_at,
            'payment_method' => $pemesanan->payment_method,
        ]);
    }
}

