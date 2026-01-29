@extends('layouts.app')

@section('content')
<div class="ml-64 p-8 bg-[#f4f7fe] min-h-screen">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-bold text-[#2b3674]">Inventaris Asset</h2>
        <button class="bg-black text-white px-6 py-2 rounded-xl font-bold hover:bg-gray-800 transition shadow-lg">
            + Generate Kode
        </button>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b border-gray-100 text-gray-400 text-xs font-bold uppercase">
                <tr>
                    <th class="px-6 py-4">ID Device</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Penyewa Aktif</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($devices as $d)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-bold text-[#2b3674]">{{ $d['id'] }}</td>
                    <td class="px-6 py-4">
                        <span class="{{ $d['status'] == 'Available' ? 'bg-green-100 text-green-600' : 'bg-orange-100 text-orange-600' }} px-3 py-1 rounded-full text-xs font-bold">
                            {{ $d['status'] }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-500">{{ $d['user'] }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('devices.edit') }}" class="text-blue-600 font-bold hover:underline">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection