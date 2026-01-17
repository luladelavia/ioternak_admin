<?php

use Illuminate\Support\Facades\Route;

// 1. Arahkan halaman awal langsung ke Login
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. Semua halaman di dalam group ini hanya bisa dibuka jika sudah Login
Route::middleware(['auth'])->group(function () {
    
    // DASHBOARD (MODUL 1)
    Route::get('/dashboard', function () {
        return view('pages.dashboard.ecommerce');
    })->name('dashboard');

    // ORDERS (MODUL 2)
    Route::get('/orders', function () {
        return view('pages.orders.index');
    })->name('orders.index');

    Route::get('/orders/create', function () {
        return view('pages.orders.create');
    })->name('orders.create');

    Route::get('/orders/{id}', function () {
        return view('pages.orders.show');
    })->name('orders.show');

    // DEVICES (MODUL 3)
    Route::get('/devices', function () {
        return view('pages.devices.index');
    })->name('devices.index');

    // USERS (MODUL 4)
    Route::get('/users', function () {
        return view('pages.users.index');
    })->name('users.index');
});

require __DIR__.'/auth.php';