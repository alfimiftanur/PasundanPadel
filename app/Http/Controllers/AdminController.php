<?php
namespace App\Http\Controllers;

use App\Models\Lapangan;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $lapangans = Lapangan::all();
        $totalCourts = Lapangan::count();
        $totalUsers = \App\Models\User::count();
        $totalBookings = Pemesanan::count();
        $pendingBookings = Pemesanan::where('status', 'pending')->count();
        $confirmedBookings = Pemesanan::where('status', 'confirmed')->count();
        $cancelledBookings = Pemesanan::where('status', 'cancelled')->count();
        $revenue = 'Rp 0';
        $todayRevenue = Pemesanan::whereDate('created_at', today())
            ->where('payment_status', 'paid')
            ->where('status', '!=', 'cancelled')
            ->sum('total_price');
    
        $monthRevenue = Pemesanan::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->where('payment_status', 'paid')
            ->where('status', '!=', 'cancelled')
            ->sum('total_price');

        $recentBookings = Pemesanan::with(['lapangan', 'jadwal'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.admin-dashboard', compact(
            'lapangans',
            'totalCourts',
            'totalUsers',
            'totalBookings',
            'pendingBookings',
            'confirmedBookings',
            'cancelledBookings',
            'revenue',
            'todayRevenue',
            'monthRevenue',
            'recentBookings'
        ));
    }

    public function exportBookingReport()
    {
        $bookings = Pemesanan::with(['user', 'jadwal', 'lapangan'])
            ->orderBy('created_at', 'desc')
            ->get();

        $stats = [
            'total' => $bookings->count(),
            'pending' => $bookings->where('status', 'pending')->count(),
            'confirmed' => $bookings->where('status', 'confirmed')->count(),
            'completed' => $bookings->where('status', 'completed')->count(),
            'cancelled' => $bookings->where('status', 'cancelled')->count(),
        ];

        $data = [
            'bookings' => $bookings,
            'stats' => $stats,
            'exported_at' => now()->format('F d, Y · H:i')
        ];

         $pdf = Pdf::loadView('pdf.report-booking', $data)
         ->setPaper('a4', 'landscape');

        return $pdf->download('booking-report-' . now()->format('Y-m-d') . '.pdf');
    }
}