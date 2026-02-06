@extends('layouts.app')

@section('content')
<div class="ml-64 p-8 bg-[#f4f7fe] min-h-screen font-sans">
    
    <div class="mb-8 flex justify-between items-end">
        <div>
            <h2 class="text-2xl font-bold text-[#2b3674]">Dashboard Overview</h2>
            <p class="text-sm text-gray-500 mt-1">Ringkasan aktivitas IoTernak hari ini.</p>
        </div>
        <div class="text-sm text-gray-400">
            {{ date('d M Y') }}
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">
        
        <a href="{{ route('orders.index') }}" class="group bg-white rounded-2xl p-5 shadow-sm border border-gray-100 hover:shadow-lg transition duration-300 relative overflow-hidden">
            <div class="flex justify-between items-start z-10 relative">
                <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Pending Orders</span>
                    <h4 class="text-3xl font-bold text-[#2b3674] mt-2 group-hover:text-[#4318FF] transition">12</h4>
                </div>
                <div class="bg-orange-50 text-orange-500 p-3 rounded-xl">
                    {{-- Icon Keranjang/Pending --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-1 text-xs font-medium text-orange-500">
                <span>Perlu diproses segera</span>
                <span>→</span>
            </div>
        </a>

        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
            <div class="flex justify-between items-start">
                <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Revenue</span>
                    <h4 class="text-3xl font-bold text-[#2b3674] mt-2">Rp 45.2M</h4>
                </div>
                <div class="bg-green-50 text-green-600 p-3 rounded-xl">
                    {{-- Icon Uang --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-1 text-xs font-medium text-green-500">
                <span>+2.5%</span>
                <span class="text-gray-400 font-normal">dari bulan lalu</span>
            </div>
        </div>

        <a href="{{ route('devices.index') }}" class="group bg-white rounded-2xl p-5 shadow-sm border border-gray-100 hover:shadow-lg transition duration-300">
            <div class="flex justify-between items-start">
                <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Device Online</span>
                    <h4 class="text-3xl font-bold text-[#2b3674] mt-2 group-hover:text-[#4318FF] transition">98%</h4>
                </div>
                <div class="bg-blue-50 text-blue-600 p-3 rounded-xl">
                    {{-- Icon Chip/Device --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-1 text-xs font-medium text-blue-500">
                <span>Sistem Stabil</span>
                <span>→</span>
            </div>
        </a>

        <a href="{{ route('users.index') }}" class="group bg-white rounded-2xl p-5 shadow-sm border border-gray-100 hover:shadow-lg transition duration-300">
            <div class="flex justify-between items-start">
                <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Penyewa Aktif</span>
                    <h4 class="text-3xl font-bold text-[#2b3674] mt-2 group-hover:text-[#4318FF] transition">89</h4>
                </div>
                <div class="bg-indigo-50 text-indigo-600 p-3 rounded-xl">
                    {{-- Icon Users --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-1 text-xs font-medium text-indigo-500">
                <span>+5 User Baru</span>
                <span>minggu ini</span>
            </div>
        </a>

    </div>

    <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 h-64 flex items-center justify-center text-gray-400">
            Grafik Penjualan (Coming Soon)
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 h-64 flex items-center justify-center text-gray-400">
            Peta Persebaran Alat (Coming Soon)
        </div>
    </div>
</div>
@endsection