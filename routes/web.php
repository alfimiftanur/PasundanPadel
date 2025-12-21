<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LapanganController;

Route::get('/', [LapanganController::class, 'indexHome'])->name('home');

Route::get('/court', [LapanganController::class, 'indexPublic'])->name('court.index');

/* AUTH MODAL TRIGGER */
Route::get('/login', function () {
    return redirect()->to(url()->previous() ?: '/')
        ->with('showLogin', true);
})->name('login');

Route::get('/register', function () {
    return redirect()->to(url()->previous() ?: '/')
        ->with('showRegister', true);
})->name('register');

Route::get('/court/{id}', function ($id) {
    return view('court.detail');
})->name('court.detail');

Route::get('/booking/{court}', function ($court) {
    return view('booking.create', [
        'court' => $court
    ]);
})->name('booking.create');

/* AUTH ACTION */
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* ADMIN ROUTES */
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('lapangan', LapanganController::class);
});