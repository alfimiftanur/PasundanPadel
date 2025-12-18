<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
});

Route::get('/court', function () {
    return view('court.index', [
        'title' => 'Pasundan Padel - Court List'
    ]);
})->name('court.index');

/* AUTH MODAL TRIGGER */
Route::get('/login', function () {
    return redirect()->to(url()->previous() ?: '/')
        ->with('showLogin', true);
})->name('login');

Route::get('/register', function () {
    return redirect()->to(url()->previous() ?: '/')
        ->with('showRegister', true);
})->name('register');

/* AUTH ACTION */
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/register', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
