<?php

namespace App\Console\Commands;

use App\Models\Pemesanan;
use App\Models\Jadwal;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CancelExpiredBookings extends Command
{
    /**
     * Nama dan signature command
     */
    protected $signature = 'bookings:cancel-expired';

    /**
     * Deskripsi command
     */
    protected $description = 'Cancel pembayaran yang sudah melewati batas waktu 15  menit';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Cari semua booking dengan status pending yang sudah lebih dari 1 jam
        $expiredBookings = Pemesanan::where('payment_status', 'pending')
            ->where('created_at', '<=', now()->subHour())
            ->get();

        $canceledCount = 0;

        foreach ($expiredBookings as $pemesanan) {
            try {
                // Update status pembayaran jadi cancelled
                $pemesanan->payment_status = 'cancelled';
                $pemesanan->status = 'cancelled';
                $pemesanan->save();

                // Kembalikan jadwal jadi tersedia
                $jadwal = Jadwal::find($pemesanan->jadwal_id);
                if ($jadwal) {
                    $jadwal->status = 'tersedia';
                    $jadwal->save();
                }

                $canceledCount++;

                Log::info('Booking expired dibatalkan: ' . $pemesanan->order_id);
                
            } catch (\Exception $e) {
                Log::error('Error saat cancel booking expired: ' . $e->getMessage());
            }
        }

        $this->info("Berhasil membatalkan {$canceledCount} booking yang expired.");
        
        return 0;
    }
}
