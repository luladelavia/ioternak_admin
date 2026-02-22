@extends('layouts.app')

@section('content')
<div class="ml-64 p-8 bg-[#f4f7fe] min-h-screen">
    
    {{-- Header & Link Index Device --}}
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-bold text-[#2b3674]">Edit Device: {{ $device->device_id }}</h2>
            <div class="flex items-center gap-4 mt-2">
                {{-- Status Terkini (Mockup Online/Offline) --}}
                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide flex items-center gap-1">
                    <span class="w-2 h-2 rounded-full bg-green-500"></span> Online
                </span>
                <p class="text-sm text-gray-500">
                    Kepemilikan: <span class="font-bold text-gray-700">{{ $device->owner ? $device->owner->name : 'Belum Ada (Available)' }}</span>
                </p>
            </div>
        </div>
        <a href="{{ route('devices.index') }}" class="bg-white text-gray-700 border border-gray-200 px-6 py-2 rounded-xl font-bold hover:bg-gray-50 transition shadow-sm flex items-center gap-2">
            <span>←</span> Kembali ke Index
        </a>
    </div>

    {{-- Form Edit --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-8">
        <form action="{{ route('devices.update', $device->device_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Nama Device --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Device</label>
                    <input type="text" name="device_name" value="{{ old('device_name', $device->device_name) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#2b3674] outline-none transition text-sm">
                </div>

                {{-- Tipe Device --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tipe Device</label>
                    <input type="text" name="type" value="{{ old('type', $device->type) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#2b3674] outline-none transition text-sm">
                </div>

                {{-- No WhatsApp --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">No. WhatsApp Notifikasi</label>
                    <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number', $device->whatsapp_number) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#2b3674] outline-none transition text-sm">
                </div>

                {{-- Kepemilikan User --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Kepemilikan (Owner)</label>
                    <select name="owned_by" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#2b3674] outline-none transition text-sm">
                        <option value="">-- Available (Tidak Ada Penyewa) --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->user_id }}" {{ old('owned_by', $device->owned_by) == $user->user_id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Threshold Suhu --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Batas Suhu (°C)</label>
                    <input type="number" step="0.1" name="threshold_temp" value="{{ old('threshold_temp', $device->threshold_temp) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#2b3674] outline-none transition text-sm">
                </div>

                {{-- Threshold Gas --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Batas Gas (%)</label>
                    <input type="number" step="0.1" name="threshold_gas" value="{{ old('threshold_gas', $device->threshold_gas) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#2b3674] outline-none transition text-sm">
                </div>
            </div>

            <div class="mt-8 flex justify-end">
                <button type="submit" class="bg-[#2b3674] text-white px-8 py-2.5 rounded-xl font-bold hover:bg-blue-900 transition shadow-lg">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    {{-- Tabel Data Historis (Sesuai Permintaan) --}}
    <h3 class="text-xl font-bold text-[#2b3674] mb-4 mt-8">Tabel Data Masuk Terakhir</h3>
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden w-full overflow-x-auto">
        <table class="w-full text-left whitespace-nowrap">
            <thead class="bg-gray-50 border-b border-gray-100 text-gray-400 text-xs font-bold uppercase">
                <tr>
                    <th class="px-6 py-4">Waktu</th>
                    <th class="px-6 py-4">Suhu (°C)</th>
                    <th class="px-6 py-4">Kadar Gas (%)</th>
                    <th class="px-6 py-4">Status Pengiriman</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                {{-- Ini adalah dummy data untuk tampilan tabel. Nanti bisa diganti dengan relasi ke tabel sensor_data --}}
                <tr class="hover:bg-gray-50 transition text-sm text-gray-700">
                    <td class="px-6 py-4">21 Feb 2026, 21:20 WIB</td>
                    <td class="px-6 py-4"><span class="text-red-500 font-bold">31.2</span></td>
                    <td class="px-6 py-4"><span class="text-blue-500 font-bold">5.4</span></td>
                    <td class="px-6 py-4"><span class="text-green-500">✔ Sukses</span></td>
                </tr>
                <tr class="hover:bg-gray-50 transition text-sm text-gray-700">
                    <td class="px-6 py-4">21 Feb 2026, 21:15 WIB</td>
                    <td class="px-6 py-4"><span class="text-red-500 font-bold">29.8</span></td>
                    <td class="px-6 py-4"><span class="text-blue-500 font-bold">5.2</span></td>
                    <td class="px-6 py-4"><span class="text-green-500">✔ Sukses</span></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection