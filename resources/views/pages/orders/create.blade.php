@extends('layouts.app')

@section('content')
<div class="ml-64 p-8 bg-[#f4f7fe] min-h-screen">
    
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-bold text-[#2b3674]">Tambah Order Baru</h2>
            <p class="text-sm text-gray-500 mt-1">Silakan pilih pengguna, perangkat, dan durasi sewa untuk mencatat transaksi baru.</p>
        </div>
        <a href="{{ route('orders.index') }}" class="bg-white text-gray-700 border border-gray-200 px-6 py-2 rounded-xl font-bold hover:bg-gray-50 transition shadow-sm flex items-center gap-2">
            <span>←</span> Kembali
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-2xl">
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <div class="space-y-6">
                {{-- 1. Pilih User --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Penyewa (User)</label>
                    <select name="user_id" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#052917] outline-none transition text-sm">
                        <option value="">-- Pilih Penyewa --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->user_id }}">{{ $user->full_name }} ({{ $user->phone_number }})</option>
                        @endforeach
                    </select>
                </div>

                {{-- 2. Pilih Device --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Perangkat (Device)</label>
                    <select name="device_id" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#052917] outline-none transition text-sm">
                        <option value="">-- Pilih Device yang Tersedia --</option>
                        @foreach($devices as $device)
                            <option value="{{ $device->device_id }}">{{ $device->device_name }} ({{ $device->device_id }}) - Tipe: {{ $device->type }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- 3. Durasi Sewa --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Durasi Sewa (Bulan)</label>
                    <div class="relative">
                        <input type="number" name="duration" min="1" max="60" required placeholder="Contoh: 12" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#052917] outline-none transition text-sm">
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 text-sm text-gray-400 font-semibold">Bulan</div>
                    </div>
                </div>

                {{-- 4. Biaya Sewa Info --}}
                <div class="bg-emerald-50 rounded-xl p-4 border border-emerald-100">
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-emerald-800 font-semibold">Estimasi Biaya Sewa:</span>
                        <span class="text-emerald-950 font-bold">Rp 200.000 / Bulan</span>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex justify-end">
                <button type="submit" class="bg-[#052917] text-white px-8 py-2.5 rounded-xl font-bold hover:bg-[#0a4d2c] transition shadow-lg">
                    Buat Transaksi Order
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
