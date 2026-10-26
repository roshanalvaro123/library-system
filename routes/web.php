<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;

// Redirect halaman utama langsung ke daftar buku
Route::get('/', function () {
    return redirect()->route('books.index');
});

// Route untuk Guest (Belum Login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

// Route untuk Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Route yang Dilindungi (Harus Login)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('books.index');
    })->name('dashboard');

    Route::resource('books', BookController::class);
});