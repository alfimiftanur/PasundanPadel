<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Lapangan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JadwalController extends Controller
{
    // Menampilkan halaman kalender jadwal. Di sini admin bisa filter jadwal berdasarkan tanggal dan lapangan.
    public function index(Request $request)
    {
        // Filter berdasarkan court & date
        $selectedDate = $request->get('date', now()->format('Y-m-d'));
        $selectedCourtId = $request->get('court_id');

        // Ambil semua lapangan
        $lapangans = Lapangan::orderBy('nama_lapangan')->get();

        // Filter lapangan yang akan ditampilkan
        if ($selectedCourtId) {
            $displayedLapangans = Lapangan::where('id', $selectedCourtId)->get();
        } else {
            $displayedLapangans = $lapangans;
        }

        // Generate time slots (08:00 - 22:00)
        $timeSlots = [];
        for ($hour = 8; $hour < 22; $hour++) {
            $timeSlots[] = str_pad($hour, 2, '0', STR_PAD_LEFT) . ':00';
        }

        // Ambil jadwal untuk tanggal tertentu
        $jadwals = Jadwal::with('lapangan')
            ->whereDate('date', $selectedDate)
            ->when($selectedCourtId, function($query) use ($selectedCourtId) {
                $query->where('court_id', $selectedCourtId);
            })
            ->get()
            ->groupBy('court_id');

        return view('jadwal.index', compact(
            'lapangans',
            'displayedLapangans',
            'timeSlots',
            'jadwals',
            'selectedDate',
            'selectedCourtId'
        ));
    }

    public function indexPublic(Request $request)
    {
        $selectedDate   = $request->get('date', now()->format('Y-m-d'));
        $selectedCourtId = $request->get('court_id');

        $lapangans = Lapangan::where('status', 'tersedia')
        ->orderBy('nama_lapangan')
        ->get();

        $displayedLapangans = $selectedCourtId
            ? Lapangan::where('id', $selectedCourtId)->get()
            : $lapangans;

        $timeSlots = [];
        for ($hour = 8; $hour < 22; $hour++) {
            $timeSlots[] = str_pad($hour, 2, '0', STR_PAD_LEFT).':00';
        }

        $jadwals = Jadwal::with('lapangan')
            ->whereDate('date', $selectedDate)
            ->when($selectedCourtId, function ($q) use ($selectedCourtId) {
                $q->where('court_id', $selectedCourtId);
            })
            ->get()
            ->groupBy('court_id');

        // Bedanya hanya di view yang dipakai
        return view('schedule.index', compact(
            'lapangans',
            'displayedLapangans',
            'timeSlots',
            'jadwals',
            'selectedDate',
            'selectedCourtId'
        ));
    }

    // Menampilkan form untuk mengatur jadwal, membuat jadwal baru dan mengubah jadwal yang sudah ada.
    public function edit(Request $request)
    {
        $lapangans = Lapangan::all();
        
        // Cek apakah edit mode (ada jadwal_id)
        $jadwalId = $request->get('jadwal_id');
        $existingJadwal = null;
        
        if ($jadwalId) {
            $existingJadwal = Jadwal::find($jadwalId);
        }
        
        // Auto-fill dari kalender
        $prefilledData = [
            'court_id' => $request->get('court_id'),
            'date' => $request->get('date'),
            'start_time' => $request->get('start_time'),
            'end_time' => $request->get('start_time') 
                ? \Carbon\Carbon::parse($request->get('start_time'))->addHour()->format('H:i') 
                : null,
        ];
        
        return view('jadwal.edit', compact('lapangans', 'prefilledData', 'existingJadwal'));
    }

    // Menyimpan jadwal baru ke database.Termasuk validasi input dan pengecekan bentrok dengan jadwal lain.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'court_id' => 'required|exists:lapangans,id',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required|in:tersedia,terboking'
        ]);

        // Validasi bentrok
        $bentrok = Jadwal::where('court_id', $request->court_id)
            ->where('date', $request->date)
            ->where(function($query) use ($request) {
                $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                      ->orWhereBetween('end_time', [$request->start_time, $request->end_time])
                      ->orWhere(function($q) use ($request) {
                          $q->where('start_time', '<=', $request->start_time)
                            ->where('end_time', '>=', $request->end_time);
                      });
            })
            ->exists();

        if ($bentrok) {
            return back()->withErrors(['error' => 'Jadwal bentrok dengan jadwal lain!'])->withInput();
        }

        Jadwal::create($validated);
        
        return redirect()
            ->route('jadwal.index', ['date' => $request->date])
            ->with('success', 'Jadwal berhasil ditambahkan!');
    }

//   Update status jadwal dari tersedia ke terboking
    public function updateStatus(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:tersedia,terboking'
        ]);

        $jadwal->update([
            'status' => $request->status
        ]);

        return redirect()
            ->route('jadwal.index', ['date' => $jadwal->date->format('Y-m-d')])
            ->with('success', 'Status berhasil diperbarui!');
    }


    public function destroy(Jadwal $jadwal)
    {
        
    }
    

}
