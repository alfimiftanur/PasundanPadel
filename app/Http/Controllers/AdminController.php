<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        
        $totalCourts = 6;
        $totalUsers = \App\Models\User::count();
        $totalBookings = 1;
        $pendingBookings = 0;
        $confirmedBookings = 0;
        $cancelledBookings = 0;
        $revenue = 'Rp 0';
        $todayRevenue = 0;
        $monthRevenue = 0;

        return view('dashboard.admin-dashboard', compact(
            'totalCourts',
            'totalUsers',
            'totalBookings',
            'pendingBookings',
            'confirmedBookings',
            'cancelledBookings',
            'revenue',
            'todayRevenue',
            'monthRevenue'
        ));
    }
}