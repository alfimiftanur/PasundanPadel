<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Lapangan;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PemesananController extends Controller
{
   
    public function index()
    {
        $title = 'Kelola Booking';
        
        $pemesanans = Pemesanan::with(['user', 'lapangan', 'jadwal'])
            ->latest()
            ->get();
        
        $stats = [
            'total' => $pemesanans->count(),
            'pending' => $pemesanans->where('status', 'pending')->count(),
            'confirmed' => $pemesanans->where('status', 'confirmed')->count(),
            'cancelled' => $pemesanans->where('status', 'cancelled')->count(),
            'completed' => $pemesanans->where('status', 'completed')->count(),
        ];
        
        return view('pemesanan.index', compact('pemesanans', 'title', 'stats'));
    }

    
    public function create(Request $request, $courtId)
    {
        $lapangan = Lapangan::findOrFail($courtId);
        
        $date = $request->get('date', now()->format('Y-m-d'));
        $startTime = $request->get('start_time');
        
        return view('booking.create', compact('lapangan', 'date', 'startTime'));
    }

   
    public function store(Request $request)
<<<<<<< Updated upstream
{
    $request->validate([
        'court_id' => 'required|exists:lapangans,id',
        'date' => 'required|date|after_or_equal:today',
        'start_time' => 'required',
        'duration' => 'required|integer|min:1',
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string',
    ]);
=======
    {
        if (!auth()->check()) {
            return redirect()->back()
                ->withErrors(['auth' => 'You must log in first to make a booking.'], 'booking')
                ->withInput();
        }

        $request->validate([
            'court_id' => 'required|exists:lapangans,id',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required',
            'duration' => 'required|integer|min:1',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);
>>>>>>> Stashed changes

        $duration = (int) $request->duration;

        $selectedDate = \Carbon\Carbon::parse($request->date)->startOfDay();
        $today = today();

<<<<<<< Updated upstream
    if ($selectedDate->lt($today)) {
        return back()->withErrors(['date' => 'Tanggal booking tidak boleh kurang dari hari ini.'], 'booking')->withInput();
    }
=======
        if ($selectedDate->lt($today)) {
            return back()->withErrors(['date' => 'The booking date cannot be less than today.'], 'booking')->withInput();
        }
>>>>>>> Stashed changes

        $bookingDateTime = \Carbon\Carbon::parse($request->date . ' ' . $request->start_time);
        $now = now();

<<<<<<< Updated upstream
    if ($bookingDateTime->lte($now)) {
        return back()->withErrors(['start_time' => 'Waktu booking sudah lewat. Silakan pilih waktu yang akan datang.'], 'booking')->withInput();
    }

    $minimumBookingTime = $now->copy()->addHour();
    if ($bookingDateTime->lt($minimumBookingTime)) {
        return back()->withErrors([
            'start_time' => 'Booking harus dilakukan minimal 1 jam sebelum waktu main. Sekarang: ' . $now->format('H:i') . ', Minimal: ' . $minimumBookingTime->format('H:i')
        ], 'booking')->withInput();
    }
=======
        if ($bookingDateTime->lte($now)) {
            return back()->withErrors(['start_time' => 'Booking time has already passed. Please select a future time.'], 'booking')->withInput();
        }

        $minimumBookingTime = $now->copy()->addHour();
        if ($bookingDateTime->lt($minimumBookingTime)) {
            return back()->withErrors([
                'start_time' => 'Booking must be made at least 1 hour before the playing time. Current time: ' . $now->format('H:i') . ', Minimum: ' . $minimumBookingTime->format('H:i')
            ], 'booking')->withInput();
        }

        $closingTime = \Carbon\Carbon::parse($request->date . ' 22:00:00');
        $endBookingTime = $bookingDateTime->copy()->addHours($duration);
        
        if ($endBookingTime->gt($closingTime)) {
            $maxStartHour = 22 - $duration;
            return back()->withErrors([
                'duration' => "Booking exceeds closing time 22:00. Maximum start time is {$maxStartHour}:00 for a {$duration} hour duration."
            ], 'booking')->withInput();
        }
>>>>>>> Stashed changes

        $lapangan = Lapangan::findOrFail($request->court_id);
        $totalPrice = $lapangan->harga_per_jam * $duration;

<<<<<<< Updated upstream
   
    $jadwalIds = [];
    
    for ($i = 0; $i < $duration; $i++) {
        $startTime = \Carbon\Carbon::parse($request->start_time)->addHours($i)->format('H:i');
        $endTime = \Carbon\Carbon::parse($request->start_time)->addHours($i + 1)->format('H:i');

        $jadwal = Jadwal::where('court_id', $request->court_id)
            ->where('date', $request->date)
            ->where('start_time', $startTime)
            ->where('end_time', $endTime)
            ->first();

        if ($jadwal) {
            if (in_array($jadwal->status, ['pending', 'terboking'])) {
                return back()->withErrors([
                    'start_time' => "Jadwal jam $startTime - $endTime sudah dibooking. Silakan pilih waktu lain."
                ], 'booking')->withInput();
            }
            
            $jadwal->update(['status' => 'pending']);
        } else {
        try {
            $jadwal = Jadwal::create([
                'court_id' => $request->court_id,
                'date' => $request->date,
                'start_time' => $startTime,
                'end_time' => $endTime,
                'status' => 'pending'
            ]);
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->getCode() == 23000) {
                return back()->withErrors([
                    'start_time' => "Jadwal jam $startTime - $endTime baru saja dibooking orang lain. Silakan pilih waktu lain."
                ], 'booking')->withInput();
            }
            throw $e; 
        }
    }

        $jadwalIds[] = $jadwal->id;
    }

    $pemesanan = Pemesanan::create([
        'user_id' => auth()->check() ? auth()->id() : null,
        'jadwal_id' => $jadwalIds[0], 
        'court_id' => $request->court_id,
        'customer_name' => $request->name,
        'customer_email' => $request->email,
        'customer_phone' => $request->phone,
        'notes' => $request->notes,
        'duration' => $duration,
        'total_price' => $totalPrice,
        'status' => 'pending',
        'payment_status' => 'unpaid',
    ]);

    \Log::info('Booking berhasil dibuat!', [
        'pemesanan_id' => $pemesanan->id,
        'jadwal_ids' => $jadwalIds,
    ]);

    return redirect()
        ->route('pembayaran.checkout', $pemesanan->id)
        ->with('success', 'Booking berhasil dibuat! Silakan lakukan pembayaran.');
}


 
    public function show($id)
{
    $title = 'Detail Booking';
    
    $pemesanan = Pemesanan::with(['user', 'lapangan', 'jadwal'])
        ->findOrFail($id);
    
    return view('pemesanan.show', compact('pemesanan', 'title'));
}
=======
        try {
            $result = DB::transaction(function () use ($request, $duration, $totalPrice) {
                $jadwalIds = [];
                
                for ($i = 0; $i < $duration; $i++) {
                    $startTime = \Carbon\Carbon::parse($request->start_time)->addHours($i)->format('H:i');
                    $endTime = \Carbon\Carbon::parse($request->start_time)->addHours($i + 1)->format('H:i');

                    $bentrok = Jadwal::where('court_id', $request->court_id)
                        ->where('date', $request->date)
                        ->where('start_time', $startTime)
                        ->whereIn('status', ['pending', 'terboking'])
                        ->exists();

                    if ($bentrok) {
                        throw new \Exception("The $startTime - $endTime schedule is already booked. Please choose another time.");
                    }

                    try {
                        $jadwal = Jadwal::firstOrCreate(
                            [
                                'court_id' => $request->court_id,
                                'date' => $request->date,
                                'start_time' => $startTime,
                                'end_time' => $endTime,
                            ],
                            [
                                'status' => 'pending'
                            ]
                        );
                    } catch (\Illuminate\Database\QueryException $e) {
                        if ($e->getCode() == 23000) {
                            throw new \Exception("The $startTime - $endTime schedule is already booked by someone else. Please choose another time.");
                        }
                        throw $e;
                    }

                    if (!$jadwal->wasRecentlyCreated && in_array($jadwal->status, ['pending', 'terboking'])) {
                        throw new \Exception("The $startTime - $endTime schedule is already booked by someone else. Please choose another time.");
                    }

                    $jadwal->update(['status' => 'pending']);
                    $jadwalIds[] = $jadwal->id;
                }

                $pemesanan = Pemesanan::create([
                    'user_id' => auth()->check() ? auth()->id() : null,
                    'jadwal_id' => $jadwalIds[0], 
                    'court_id' => $request->court_id,
                    'customer_name' => $request->name,
                    'customer_email' => $request->email,
                    'customer_phone' => $request->phone,
                    'notes' => $request->notes,
                    'duration' => $duration,
                    'total_price' => $totalPrice,
                    'status' => 'pending',
                    'payment_status' => 'unpaid',
                ]);

                \Log::info('Booking successfully created!', [
                    'pemesanan_id' => $pemesanan->id,
                    'jadwal_ids' => $jadwalIds,
                ]);

                return redirect()->route('pembayaran.checkout', $pemesanan->id)
                    ->with('success', 'Booking successfully created! Please proceed with payment.');
            });

            return $result;

        } catch (\Exception $e) {
            return back()->withErrors([
                'start_time' => $e->getMessage()
            ], 'booking')->withInput();
        }
    }

 
    public function show($id)
    {
        $title = 'Detail Booking';
        
        $pemesanan = Pemesanan::with(['user', 'lapangan', 'jadwal'])
            ->findOrFail($id);
        
        return view('pemesanan.show', compact('pemesanan', 'title'));
    }
>>>>>>> Stashed changes

    
    public function update(Request $request, Pemesanan $pemesanan)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed',
            'payment_status' => 'required|in:unpaid,pending,paid,failed',
        ]);

        $pemesanan->update($validated);

        if ($validated['status'] === 'confirmed' && $validated['payment_status'] === 'paid') {
            $pemesanan->jadwal->update(['status' => 'terboking']);
        } elseif ($validated['status'] === 'cancelled') {
            $pemesanan->jadwal->update(['status' => 'tersedia']);
        }

        return redirect()->route('pemesanan.index')
            ->with('success', 'Status pemesanan berhasil diperbarui!');
    }
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
   
    public function destroy(Pemesanan $pemesanan)
    {
        $jadwal = $pemesanan->jadwal;
        if ($jadwal) {
            $jadwal->update(['status' => 'tersedia']);
        }

        $pemesanan->delete();
        
        return redirect()->route('pemesanan.index')
            ->with('success', 'Pemesanan berhasil dihapus!');
    }

   
    public function ordersHistory()
<<<<<<< Updated upstream
{
    if (!auth()->check()) {
        return redirect()->route('login')
            ->with('error', 'Silakan login terlebih dahulu.');
=======
    {
        if (!auth()->check()) {
            return redirect()->route('login')
                ->with('error', 'Please login first.');
        }

        $pemesanans = Pemesanan::with(['lapangan', 'jadwal'])
            ->where(function($query) {
                $query->where('user_id', auth()->id())
                      ->orWhere('customer_email', auth()->user()->email);
            })
            ->latest()
            ->get()
            ->fresh();

        return view('booking.orders-history', compact('pemesanans'));
>>>>>>> Stashed changes
    }

    $pemesanans = Pemesanan::with(['lapangan', 'jadwal'])
        ->where(function($query) {
            $query->where('user_id', auth()->id())
                  ->orWhere('customer_email', auth()->user()->email);
        })
        ->latest()
        ->get()
        ->fresh();

    return view('booking.orders-history', compact('pemesanans'));
}

    public function cancel($id)
<<<<<<< Updated upstream
{
    $pemesanan = Pemesanan::findOrFail($id);
    
    $pemesanan->update([
        'status' => 'cancelled'
    ]);
    
    $pemesanan->jadwal->update(['status' => 'tersedia']);
    
    return redirect()->back()
        ->with('success', 'Booking berhasil dibatalkan.');
}

}
=======
    {
        $pemesanan = Pemesanan::findOrFail($id);
        
        $pemesanan->update([
            'status' => 'cancelled'
        ]);
        
        $pemesanan->jadwal->update(['status' => 'tersedia']);
        
        return redirect()->back()
            ->with('success', 'Booking successfully cancelled.');
    }

}
>>>>>>> Stashed changes
