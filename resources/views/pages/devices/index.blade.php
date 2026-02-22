@extends('layouts.app')

@section('content')
<div class="ml-64 p-8 bg-[#f4f7fe] min-h-screen">
    
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-bold text-[#2b3674]">Inventaris Asset</h2>
            <p class="text-sm text-gray-500 mt-1">Total Devices: {{ count($devices) }} Unit</p>
        </div>
        <button class="bg-black text-white px-6 py-2 rounded-xl font-bold hover:bg-gray-800 transition shadow-lg flex items-center gap-2">
            <span>+</span> Generate Kode
        </button>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden w-full overflow-x-auto">
        <table class="w-full text-left whitespace-nowrap">
            
            <thead class="bg-gray-50 border-b border-gray-100 text-gray-400 text-xs font-bold uppercase">
                <tr>
                    <th class="px-6 py-4">ID Device</th>
                    <th class="px-6 py-4">Nama & Tipe</th>
                    <th class="px-6 py-4">No. WhatsApp</th>
                    <th class="px-6 py-4">Threshold (Batas)</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Penyewa (Owner)</th>
                    <th class="px-6 py-4">Terdaftar Sejak</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-50">
                @forelse($devices as $d)
                <tr class="hover:bg-gray-50 transition">
                    
                    {{-- 1. ID Device (Primary Key) --}}
                    <td class="px-6 py-4">
                        <div class="font-bold text-[#2b3674] font-mono text-sm">
                            {{ data_get($d, 'device_id') }}
                        </div>
                    </td>

                    <td class="px-6 py-4">
                        <div class="text-sm font-bold text-gray-700">
                            {{ data_get($d, 'device_name') ?? 'Tanpa Nama' }}
                        </div>
                        <div class="text-xs text-gray-400 mt-0.5">
                            Tipe: <span class="uppercase">{{ data_get($d, 'type') ?? '-' }}</span>
                        </div>
                    </td>

                    <td class="px-6 py-4 text-sm text-gray-600">
                        @if(data_get($d, 'whatsapp_number'))
                            <div class="flex items-center gap-1">
                                <span class="text-green-500">📱</span> 
                                {{ data_get($d, 'whatsapp_number') }}
                            </div>
                        @else
                            <span class="text-gray-300 italic">-</span>
                        @endif
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex flex-col gap-1 text-xs font-medium">
                            <span class="text-red-500 bg-red-50 px-2 py-0.5 rounded w-fit">
                                Suhu: {{ data_get($d, 'threshold_temp', '30.0') }}°C
                            </span>
                            <span class="text-blue-500 bg-blue-50 px-2 py-0.5 rounded w-fit">
                                Gas: {{ data_get($d, 'threshold_gas', '10.0') }}%
                            </span>
                        </div>
                    </td>

                    {{-- 5. Status (Logika: Jika owned_by terisi = Disewa) --}}
                    <td class="px-6 py-4">
                        @php $isRented = data_get($d, 'owned_by'); @endphp
                        <span class="{{ $isRented ? 'bg-orange-100 text-orange-600' : 'bg-green-100 text-green-600' }} px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide">
                            {{ $isRented ? 'Disewa' : 'Available' }}
                        </span>
                    </td>

                    <td class="px-6 py-4">
                        @if(data_get($d, 'owned_by'))
                            <div class="flex flex-col">
                                {{-- Mengambil nama user dari relasi 'owner'. Default '-' jika relasi gagal load --}}
                                <span class="text-sm font-bold text-gray-700">
                                    {{ data_get($d, 'owner.name') ?? 'User ID: ' . data_get($d, 'owned_by') }}
                                </span>
                                <span class="text-xs text-gray-400">
                                    Penyewa
                                </span>
                            </div>
                        @else
                            <span class="text-gray-400 italic text-sm">- Belum Ada -</span>
                        @endif
                    </td>

                    <td class="px-6 py-4 text-xs text-gray-500">
                        {{-- Mengambil tanggal saja (substr 10 karakter pertama: YYYY-MM-DD) --}}
                        {{ substr(data_get($d, 'created_at'), 0, 10) }}
                    </td>

                    <td class="px-6 py-4 text-right">
                    <a href="{{ route('devices.edit', $d->device_id) }}" class="text-blue-600 font-bold hover:text-blue-800...">
    Edit
</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-6 py-12 text-center text-gray-400 bg-gray-50">
                        <div class="flex flex-col items-center justify-center">
                            <span class="text-2xl mb-2">📭</span>
                            <p>Belum ada data devices di database.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection