@extends('layouts.app')

@section('content')
<div class="ml-64 p-8 bg-[#f4f7fe] min-h-screen">
    
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-bold text-[#2b3674]">Manajemen Pengguna</h2>
            <p class="text-sm text-gray-500 mt-1">Total Terdaftar: {{ count($users) }} Orang</p>
        </div>
        <a href="{{ route('users.create') }}" class="bg-black text-white px-6 py-2 rounded-xl font-bold hover:bg-gray-800 transition shadow-lg flex items-center gap-2">
            <span>+</span> Tambah User
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden w-full overflow-x-auto">
        <table class="w-full text-left whitespace-nowrap">
            
            <thead class="bg-gray-50 border-b border-gray-100 text-gray-400 text-xs font-bold uppercase">
                <tr>
                    <th class="px-6 py-4">ID User</th>
                    <th class="px-6 py-4">Nama Lengkap</th>
                    <th class="px-6 py-4">Kontak (WhatsApp)</th>
                    <th class="px-6 py-4">Lokasi & Usaha</th>
                    <th class="px-6 py-4">Status Akun</th>
                    <th class="px-6 py-4">Bergabung Pada</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-50">
                @forelse($users as $u)
                <tr class="hover:bg-gray-50 transition">
                    
                    {{-- 1. ID User --}}
                    <td class="px-6 py-4">
                        <div class="font-bold text-[#2b3674] font-mono text-sm">
                            #{{ data_get($u, 'user_id') }}
                        </div>
                    </td>

                    {{-- 2. Nama --}}
                    <td class="px-6 py-4">
                        <div class="text-sm font-bold text-gray-700">
                            {{ data_get($u, 'full_name') ?? 'Tanpa Nama' }}
                        </div>
                        <div class="text-xs text-gray-400 mt-0.5">
                            Customer / Peternak
                        </div>
                    </td>

                    {{-- 3. Kontak --}}
                    <td class="px-6 py-4 text-sm text-gray-600">
                        @if(data_get($u, 'phone_number'))
                            <div class="flex items-center gap-1">
                                <span class="text-green-500">📱</span> 
                                {{ data_get($u, 'phone_number') }}
                            </div>
                        @else
                            <span class="text-gray-300 italic">-</span>
                        @endif
                    </td>

                    {{-- 4. Lokasi & Ternak --}}
                    <td class="px-6 py-4">
                        <div class="flex flex-col gap-1 text-xs font-medium">
                            <span class="text-blue-500 bg-blue-50 px-2 py-0.5 rounded w-fit">
                                Kota: {{ data_get($u, 'city', 'Belum diatur') }}
                            </span>
                            <span class="text-orange-500 bg-orange-50 px-2 py-0.5 rounded w-fit">
                                Ternak: {{ data_get($u, 'livestock_type', '-') }}
                            </span>
                        </div>
                    </td>

                    {{-- 5. Status --}}
                    <td class="px-6 py-4">
                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide">
                            Aktif
                        </span>
                    </td>

                    {{-- 6. Bergabung Pada --}}
                    <td class="px-6 py-4 text-xs text-gray-500">
                        {{ substr(data_get($u, 'created_at'), 0, 10) }}
                    </td>

                    {{-- 7. Aksi --}}
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('users.edit', $u->user_id) }}" class="text-blue-600 font-bold hover:text-blue-800 text-sm transition">
                            Edit
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center text-gray-400 bg-gray-50">
                        <div class="flex flex-col items-center justify-center">
                            <span class="text-2xl mb-2">👥</span>
                            <p>Belum ada data pengguna di database.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection