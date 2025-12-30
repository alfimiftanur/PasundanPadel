<?php
namespace App\Http\Controllers;

use App\Models\Lapangan;
use Illuminate\Http\Request;
use App\Models\Pemesanan;

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
}