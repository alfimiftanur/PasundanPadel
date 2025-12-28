<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PemesananController;

Route::get('/', [LapanganController::class, 'indexHome'])->name('home');

Route::get('/court', [LapanganController::class, 'indexPublic'])->name('court.index');

Route::get('/court/{id}', [LapanganController::class, 'showPublic'])->name('court.detail');

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

// Booking Creation View
Route::get('/booking/{courtId}', [PemesananController::class, 'create'])->name('booking.create');
Route::post('/booking', [PemesananController::class, 'store'])->name('pemesanan.store');

// 2. Route Success Page (BARU)
Route::get('/booking-success', function() {
    return view('booking.success');
})->name('booking.success');

// 3. Route Detail & Upload Proof (BARU)
Route::get('/booking/{pemesanan}/detail', [PemesananController::class, 'show'])->name('pemesanan.show');

// Route untuk orders history (user yang login)
Route::get('/orders-history', [PemesananController::class, 'ordersHistory'])
    ->middleware('auth')
    ->name('booking.orders-history');



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

        // Pemesanan Routes (Admin)
    Route::get('/booking-list', [PemesananController::class, 'index'])->name('pemesanan.index');
    Route::get('/detail-booking/{pemesanan}', [PemesananController::class, 'show'])->name('pemesanan.show.admin');
    Route::put('/pemesanan/{pemesanan}', [PemesananController::class, 'update'])->name('pemesanan.update');
    Route::delete('/pemesanan/{pemesanan}', [PemesananController::class, 'destroy'])->name('pemesanan.destroy');

});