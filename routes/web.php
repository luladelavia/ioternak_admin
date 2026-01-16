<?php

use Illuminate\Support\Facades\Route;

// 1. Arahkan halaman awal langsung ke Login
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. Semua halaman di dalam group ini hanya bisa dibuka jika sudah Login (Middleware Auth)
Route::middleware(['auth', 'verified'])->group(function () {

    // MODUL 1: DASHBOARD
    Route::get('/dashboard', function () {
        return view('pages.dashboard.ecommerce');
    })->name('dashboard');

    // MODUL 2: ORDERS (Subscription Logic)
    Route::get('/orders', function () {
        return view('pages.orders.index');
    })->name('orders.index');

    // MODUL 3: DEVICES (Asset Management)
    Route::get('/devices', function () {
        return view('pages.devices.index');
    })->name('devices.index');

    // MODUL 4: USERS (Customer Management)
    Route::get('/users', function () {
        return view('pages.users.index');
    })->name('users.index');

    // ROUTE TAMBAHAN (PROFILE)
    Route::get('/profile', function () {
        return view('profile.edit');
    })->name('profile.edit');
});

require __DIR__.'/auth.php';