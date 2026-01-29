<?php
use Illuminate\Support\Facades\Route;

// Dashboard Utama
Route::get('/', function () {
    return view('pages.dashboard.ecommerce');
})->name('dashboard');

// MODUL 3: Kelola Device
Route::get('/devices', function () {
    // Kita buat data contoh di sini agar tabel isi
    $devices = [
        ['id' => '#IPK-001', 'name' => 'IoPeka V1', 'status' => 'Available', 'user' => '-'],
        ['id' => '#IPK-002', 'name' => 'IoPakan Smart', 'status' => 'Rented', 'user' => 'Budi Santoso'],
    ];
    return view('pages.devices.index', compact('devices'));
})->name('devices.index');

Route::get('/devices/edit', function () {
    return view('pages.devices.edit');
})->name('devices.edit');

// Jalur Cadangan agar tidak Error Merah
Route::get('/users', function () { return view('pages.dashboard.ecommerce'); })->name('users.index');
Route::get('/orders', function () { return view('pages.dashboard.ecommerce'); })->name('orders.index');
Route::get('/profile', function () { return "Profile"; })->name('profile.edit');