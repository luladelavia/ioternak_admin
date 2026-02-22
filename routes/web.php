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
// Rute untuk menampilkan semua device
Route::get('/devices', [DeviceController::class, 'index'])->name('devices.index');

// Rute untuk menampilkan halaman form edit device (Berdasarkan ID)
Route::get('/devices/{id}/edit', [DeviceController::class, 'edit'])->name('devices.edit');

// Rute untuk memproses update data ke database
Route::put('/devices/{id}', [DeviceController::class, 'update'])->name('devices.update');


// 3. Jalur Cadangan (Placeholder) agar Menu Samping Tidak Error
Route::get('/orders', function () { 
    return view('pages.dashboard.ecommerce'); 
})->name('orders.index');

Route::get('/profile', function () { 
    return "Halaman Profile"; 
})->name('profile.edit');

// 4. MODUL USERS
Route::prefix('users')->group(function () {
    
    // Menampilkan daftar user
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    
    // Menampilkan Form Tambah User
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    
    // Memproses Simpan User Baru ke Database (Method POST)
    Route::post('/', [UserController::class, 'store'])->name('users.store');
    
    // Menampilkan Form Edit User
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    
    // Memproses Update Data User ke Database (Method PUT)
    Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
    
    // Placeholder untuk Hapus User (Karena belum ada di Controller)
    Route::delete('/{id}', function ($id) { 
        return "Proses Hapus User ID: " . $id; 
    })->name('users.destroy');
    
});
    