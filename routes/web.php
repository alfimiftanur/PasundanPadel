<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

<<<<<<< HEAD
Route::get('/court', function () {
    return view('court.index', [
        'title' => 'Pasundan Padel - Court List'
    ]);
})->name ('court.index');
=======

>>>>>>> feature/loginregis
