<div class="fixed left-0 top-0 h-screen w-64 bg-black p-6 shadow-2xl z-50">
    <div class="mb-10 border-b border-gray-800 pb-4">
        <h1 class="text-xl font-bold uppercase italic text-white tracking-widest">IoTernak Admin</h1>
    </div>

    <nav class="space-y-6">
        <div>
            <p class="text-xs font-bold text-gray-500 mb-4 uppercase">Menu Utama</p>
            <ul class="space-y-2">
                <li><a href="{{ route('dashboard') }}" class="block p-3 rounded text-white hover:bg-gray-800">Dashboard</a></li>
                <li><a href="{{ route('devices.index') }}" class="block p-3 rounded bg-gray-800 text-white border-l-4 border-white font-bold">Kelola Device</a></li>
            </ul>
        </div>
    </nav>
</div>