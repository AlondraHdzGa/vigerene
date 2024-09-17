<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VigenereController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/desencriptar', function () {
    return view('desencriptar');
});

Route::post('/encriptar',
[VigenereController::class, 'encriptar'])->name('encriptarRoute');

Route::post('/desencriptar',
[VigenereController::class, 'desencriptar'])->name('desencriptarRoute');
