<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PembayaranController;

Route::get('/', [LapanganController::class, 'indexHome'])->name('home');

Route::get('/court', [LapanganController::class, 'indexPublic'])->name('court.index');

Route::get('/court/{id}', [LapanganController::class, 'showPublic'])->name('court.detail');

Route::get('/schedule', [JadwalController::class, 'indexPublic'])->name('user.schedule');


Route::get('/login', function () {
    return redirect()->to(url()->previous() ?: '/')
        ->with('showLogin', true);
})->name('login');

Route::get('/register', function () {
    return redirect()->to(url()->previous() ?: '/')
        ->with('showRegister', true);
})->name('register');

Route::get('/booking/{courtId}', [PemesananController::class, 'create'])->name('booking.create');
Route::post('/booking', [PemesananController::class, 'store'])->name('pemesanan.store');


Route::get('/booking/{courtId}', [PemesananController::class, 'create'])->name('booking.create');
Route::post('/booking', [PemesananController::class, 'store'])->name('pemesanan.store');

Route::get('/booking-success', function() {
    return view('booking.success');
})->name('booking.success');

Route::get('/booking/{pemesanan}/detail', [PemesananController::class, 'show'])->name('pemesanan.show');

Route::get('/orders-history', [PemesananController::class, 'ordersHistory'])
    ->middleware('auth')
    ->name('booking.orders-history');

Route::post('/booking/{id}/cancel', [PemesananController::class, 'cancel'])
    ->middleware('auth')
    ->name('booking.cancel');

Route::get('/booking/{pemesanan}/pdf', [App\Http\Controllers\PemesananController::class, 'exportPdf'])
    ->middleware('auth')
    ->name('booking.pdf');



Route::get('/pembayaran/{pemesanan}', [PembayaranController::class, 'checkout'])
    ->name('pembayaran.checkout');

Route::post('/pembayaran/callback', [PembayaranController::class, 'callback'])
    ->name('pembayaran.callback');

Route::get('/pembayaran/{pemesanan}/sukses', [PembayaranController::class, 'sukses'])
    ->name('pembayaran.sukses');

Route::get('/pembayaran/{pemesanan}/pending', [PembayaranController::class, 'pending'])
    ->name('pembayaran.pending');

Route::get('/pembayaran/{pemesanan}/gagal', [PembayaranController::class, 'gagal'])
    ->name('pembayaran.gagal');

Route::get('/pembayaran/{pemesanan}/cek-status', [PembayaranController::class, 'cekStatus'])
    ->name('pembayaran.cek-status');

Route::get('/booking-report', function () {
    return view('pdf.report-booking');
});

Route::get('/booking-detail', function () {
    return view('pdf.user-booking-detail');
});




Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('lapangan', LapanganController::class);


     Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
    Route::get('/jadwal/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
    Route::post('/jadwal/{id}/update-status', [JadwalController::class, 'updateStatus'])->name('jadwal.updateStatus');

    Route::get('/booking-list', [PemesananController::class, 'index'])->name('pemesanan.index');
    Route::get('/detail-booking/{pemesanan}', [PemesananController::class, 'show'])->name('pemesanan.show.admin');
    Route::put('/pemesanan/{pemesanan}', [PemesananController::class, 'update'])->name('pemesanan.update');
    Route::delete('/pemesanan/{pemesanan}', [PemesananController::class, 'destroy'])->name('pemesanan.destroy');

});