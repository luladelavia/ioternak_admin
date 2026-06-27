@extends('layouts.app')

@section('content')
<div class="ml-64 p-8 bg-[#f4f7fe] min-h-screen">
    
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-bold text-[#2b3674]">Daftar Transaksi Order</h2>
            <p class="text-sm text-gray-500 mt-1">Total Order: {{ count($orders) }} Transaksi</p>
        </div>
        <a href="{{ route('orders.create') }}" class="bg-[#052917] text-white px-6 py-2 rounded-xl font-bold hover:bg-[#0a4d2c] transition shadow-lg flex items-center gap-2">
            <span>+</span> Tambah Order Baru
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden w-full overflow-x-auto">
        <table class="w-full text-left whitespace-nowrap">
            <thead class="bg-gray-50 border-b border-gray-100 text-gray-400 text-xs font-bold uppercase">
                <tr>
                    <th class="px-6 py-4">Kode Order</th>
                    <th class="px-6 py-4">Penyewa (User)</th>
                    <th class="px-6 py-4">Device</th>
                    <th class="px-6 py-4">Durasi</th>
                    <th class="px-6 py-4">Total Tagihan</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Tanggal Transaksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-50">
                @forelse($orders as $o)
                <tr class="hover:bg-gray-50 transition">
                    {{-- 1. Kode Order --}}
                    <td class="px-6 py-4">
                        <div class="font-bold text-[#2b3674] font-mono text-sm">
                            {{ data_get($o, 'order_code') }}
                        </div>
                    </td>

                    {{-- 2. Penyewa --}}
                    <td class="px-6 py-4">
                        <div class="text-sm font-bold text-gray-700">
                            {{ data_get($o, 'user.full_name') ?? 'User ID: ' . data_get($o, 'user_id') }}
                        </div>
                        <div class="text-xs text-gray-400 mt-0.5">
                            {{ data_get($o, 'user.phone_number') ?? '-' }}
                        </div>
                    </td>

                    {{-- 3. Device --}}
                    <td class="px-6 py-4 text-sm text-gray-600">
                        <div class="font-semibold text-gray-700">
                            {{ data_get($o, 'device.device_name') ?? 'Device ID: ' . data_get($o, 'device_id') }}
                        </div>
                        <div class="text-xs text-gray-400">
                            Tipe: {{ data_get($o, 'device.type') ?? '-' }}
                        </div>
                    </td>

                    {{-- 4. Durasi --}}
                    <td class="px-6 py-4 text-sm text-gray-700 font-semibold">
                        {{ data_get($o, 'duration') }} Bulan
                    </td>

                    {{-- 5. Total Tagihan --}}
                    <td class="px-6 py-4 text-sm font-bold text-[#2b3674]">
                        Rp {{ number_format(data_get($o, 'total_bill'), 0, ',', '.') }}
                    </td>

                    {{-- 6. Status --}}
                    <td class="px-6 py-4">
                        @php
                            $status = data_get($o, 'status', 'Pending');
                            $badgeClass = 'bg-orange-100 text-orange-600';
                            if (strtolower($status) == 'success') {
                                $badgeClass = 'bg-green-100 text-green-600';
                            } elseif (strtolower($status) == 'failed') {
                                $badgeClass = 'bg-red-100 text-red-600';
                            }
                        @endphp
                        <span class="{{ $badgeClass }} px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide">
                            {{ $status }}
                        </span>
                    </td>

                    {{-- 7. Tanggal --}}
                    <td class="px-6 py-4 text-xs text-gray-500">
                        {{ substr(data_get($o, 'created_at'), 0, 10) }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center text-gray-400 bg-gray-50">
                        <div class="flex flex-col items-center justify-center">
                            <span class="text-2xl mb-2">📦</span>
                            <p>Belum ada data transaksi order.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection