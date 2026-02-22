<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\User; // Pastikan model User di-import
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::with('owner')->latest('created_at')->get();
        return view('pages.devices.index', compact('devices'));
    }

    // Method untuk menampilkan halaman edit
    public function edit($id)
    {
        // Cari device berdasarkan device_id
        $device = Device::with('owner')->where('device_id', $id)->firstOrFail();
        
        // Ambil semua user untuk dropdown kepemilikan
        $users = User::all(); 

        return view('pages.devices.edit', compact('device', 'users'));
    }

    // Method untuk memproses update data
    public function update(Request $request, $id)
    {
        $device = Device::where('device_id', $id)->firstOrFail();
        
        // Validasi data (sesuaikan dengan kebutuhan)
        $request->validate([
            'device_name' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'whatsapp_number' => 'nullable|string|max:25',
            'threshold_temp' => 'nullable|numeric',
            'threshold_gas' => 'nullable|numeric',
            'owned_by' => 'nullable|exists:users,user_id', // pastikan primary key user adalah user_id
        ]);

        // Update data
        $device->update($request->only([
            'device_name', 'type', 'whatsapp_number', 
            'threshold_temp', 'threshold_gas', 'owned_by'
        ]));

        return redirect()->route('devices.index')->with('success', 'Data Device berhasil diperbarui!');
    }
}