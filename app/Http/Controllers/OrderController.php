<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Device;

class OrderController extends Controller
{
    // 1. Halaman Utama Order (Daftar Transaksi)
    public function index()
    {
        $orders = Order::with(['user', 'device'])->get();
        return view('pages.orders.index', compact('orders'));
    }

    // 2. Halaman Tambah Order
    public function create()
    {
        $users = User::all();
        // $devices = Device::whereNull('owned_by')->get(); // Only available devices
        $devices = Device::all(); // Fetch all devices for testing purposes
        return view('pages.orders.create', compact('users', 'devices'));
    }

    // 3. Simpan Order (Kalkulasi Otomatis)
    public function store(Request $request)
    {
        $price_per_month = 200000;
        $total_bill = $request->duration * $price_per_month;

        Order::create([
            'order_code' => 'ORD-' . strtoupper(uniqid()),
            'user_id' => $request->user_id,
            'device_id' => $request->device_id,
            'duration' => $request->duration,
            'total_bill' => $total_bill,
            'status' => 'Success',
        ]);

        return redirect()->route('orders.index')->with('success', 'Order berhasil dibuat!');
    }
}