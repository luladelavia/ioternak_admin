<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withCount('devices')->latest('created_at')->get();
        return view('pages.users.index', compact('users'));
    }

    // Menampilkan Form Tambah User
    public function create()
    {
        return view('pages.users.create');
    }

    // Memproses Simpan User Baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name'      => 'required|string|max:255',
            'birth_date'     => 'nullable|date',
            'phone_number'   => 'required|numeric',
            'password'       => 'required|string|min:6',
            'address'        => 'nullable|string',
            'province'       => 'nullable|string',
            'city'           => 'nullable|string',
            'district'       => 'nullable|string',
            'postal_code'    => 'nullable|numeric',
            'livestock_type' => 'nullable|string',
            'population'     => 'nullable|numeric',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['created_at'] = now(); // Jika timestamp manual

        User::create($validated);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan!');
    }

    // Menampilkan Form Detail & Edit User
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.users.edit', compact('user'));
    }

    // Memproses Update User
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'full_name'      => 'required|string|max:255',
            'birth_date'     => 'nullable|date',
            'phone_number'   => 'required|numeric',
            'password'       => 'nullable|string|min:6', // Nullable saat edit
            'address'        => 'nullable|string',
            'province'       => 'nullable|string',
            'city'           => 'nullable|string',
            'district'       => 'nullable|string',
            'postal_code'    => 'nullable|numeric',
            'livestock_type' => 'nullable|string',
            'population'     => 'nullable|numeric',
        ]);

        // Cek jika password diisi, maka update password. Jika kosong, hapus dari array update.
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'Data User berhasil diperbarui!');
    }
}