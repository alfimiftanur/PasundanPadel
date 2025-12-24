<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\JadwalController;

Route::get('/', [LapanganController::class, 'indexHome'])->name('home');

Route::get('/court', [LapanganController::class, 'indexPublic'])->name('court.index');

Route::get('/schedule', [JadwalController::class, 'indexPublic'])->name('user.schedule');


/* AUTH MODAL TRIGGER */
Route::get('/login', function () {
    return redirect()->to(url()->previous() ?: '/')
        ->with('showLogin', true);
})->name('login');

Route::get('/register', function () {
    return redirect()->to(url()->previous() ?: '/')
        ->with('showRegister', true);
})->name('register');

// Court Detail View
Route::get('/court/{id}', function ($id) {
    return view('court.detail');
})->name('court.detail');

// Booking Creation View
Route::get('/booking/{court}', function ($court) {
    return view('booking.create', [
        'court' => $court
    ]);
})->name('booking.create');

// Booking List View
Route::get('/booking-list', function () {
    return view('pemesanan.index', [
        'title' => 'Kelola Booking'
    ]);
})->name('pemesanan.index');

Route::get('/detail-booking', function () {
    return view('pemesanan.show', [
        'title' => 'Detail Booking',
    ]);
})->name('pemesanan.show');


/* AUTH ACTION */
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* ADMIN ROUTES */
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('lapangan', LapanganController::class);
     // Jadwal Routes (SIMPLIFIED)


     Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
    Route::get('/jadwal/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
    Route::post('/jadwal/{id}/update-status', [JadwalController::class, 'updateStatus'])->name('jadwal.updateStatus');
});