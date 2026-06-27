@php
    $isDashboard = request()->routeIs('dashboard');
    $isDevices = request()->routeIs('devices.*');
    $isUsers = request()->routeIs('users.*');
    $isOrders = request()->routeIs('orders.*');
@endphp

<div class="fixed left-0 top-0 h-screen w-64 bg-[#052917] p-6 shadow-2xl z-50 border-r border-[#083a21]">
    <div class="mb-10 border-b border-[#083a21] pb-4">
        <h1 class="text-xl font-extrabold uppercase italic text-white tracking-widest flex items-center gap-2">
           IoTernak Admin
        </h1>
    </div>

    <nav class="space-y-6">
        <div>
            <p class="text-xs font-bold text-emerald-500/60 mb-4 uppercase tracking-wider">Menu Utama</p>
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('dashboard') }}" 
                       class="block p-3 rounded transition duration-200 {{ $isDashboard ? 'bg-[#0a4d2c] text-white border-l-4 border-emerald-400 font-bold shadow-md' : 'text-emerald-100/60 hover:bg-[#083a21] hover:text-white' }}">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('devices.index') }}" 
                       class="block p-3 rounded transition duration-200 {{ $isDevices ? 'bg-[#0a4d2c] text-white border-l-4 border-emerald-400 font-bold shadow-md' : 'text-emerald-100/60 hover:bg-[#083a21] hover:text-white' }}">
                        Kelola Device
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}" 
                       class="block p-3 rounded transition duration-200 {{ $isUsers ? 'bg-[#0a4d2c] text-white border-l-4 border-emerald-400 font-bold shadow-md' : 'text-emerald-100/60 hover:bg-[#083a21] hover:text-white' }}">
                        Kelola Pengguna
                    </a>
                </li>
                <li>
                    <a href="{{ route('orders.index') }}" 
                       class="block p-3 rounded transition duration-200 {{ $isOrders ? 'bg-[#0a4d2c] text-white border-l-4 border-emerald-400 font-bold shadow-md' : 'text-emerald-100/60 hover:bg-[#083a21] hover:text-white' }}">
                        Kelola Order
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>