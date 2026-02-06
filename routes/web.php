<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Dashboard Utama
Route::get('/', function () {
    return view('pages.dashboard.ecommerce');
})->name('dashboard');

// 2. MODUL DEVICE (KONEKSI DATABASE ASLI)
// Kita pakai Controller, JANGAN pakai function() agar data dari PostgreSQL masuk.
Route::get('/devices', [DeviceController::class, 'index'])->name('devices.index');

// Halaman Edit (Sementara pakai view statis dulu tidak apa-apa)
Route::get('/devices/edit', function () {
    return view('pages.devices.edit');
})->name('devices.edit');

// 3. Jalur Cadangan (Placeholder) agar Menu Samping Tidak Error
Route::get('/users', function () { 
    return view('pages.dashboard.ecommerce'); 
})->name('users.index');

Route::get('/orders', function () { 
    return view('pages.dashboard.ecommerce'); 
})->name('orders.index');

Route::get('/profile', function () { 
    return "Halaman Profile"; 
})->name('profile.edit');

Route::prefix('users')->group(function () {
    // Menampilkan daftar user dari PostgreSQL
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    
    // Placeholder untuk fitur User lainnya
    Route::get('/create', function () { 
        return "Halaman Tambah User"; 
    })->name('users.create');
    
    Route::get('/{id}/edit', function ($id) { 
        return "Halaman Edit User ID: " . $id; 
    })->name('users.edit');
    
    Route::delete('/{id}', function ($id) { 
        return "Proses Hapus User ID: " . $id; 
    })->name('users.destroy');
});