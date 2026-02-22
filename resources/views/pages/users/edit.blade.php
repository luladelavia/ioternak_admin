@extends('layouts.app')

@section('content')
<div class="ml-64 p-8 bg-[#f4f7fe] min-h-screen">
    
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-bold text-[#2b3674]">Edit User: #{{ $user->user_id }}</h2>
            <div class="flex items-center gap-4 mt-2">
                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide flex items-center gap-1">
                    <span class="w-2 h-2 rounded-full bg-green-500"></span> Akun Aktif
                </span>
                <p class="text-sm text-gray-500">
                    Bergabung sejak: <span class="font-bold text-gray-700">{{ substr($user->created_at, 0, 10) }}</span>
                </p>
            </div>
        </div>
        <a href="{{ route('users.index') }}" class="bg-white text-gray-700 border border-gray-200 px-6 py-2 rounded-xl font-bold hover:bg-gray-50 transition shadow-sm flex items-center gap-2">
            <span>←</span> Kembali ke Index
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-8">
        <form action="{{ route('users.update', $user->user_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="full_name" value="{{ old('full_name', $user->full_name) }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#2b3674] outline-none transition text-sm">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">No. WhatsApp</label>
                    <input type="number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#2b3674] outline-none transition text-sm">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Password Baru <span class="text-xs font-normal text-gray-400">(Kosongkan jika tetap)</span></label>
                    <input type="password" name="password" placeholder="••••••••" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#2b3674] outline-none transition text-sm">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Lahir</label>
                    <input type="date" name="birth_date" value="{{ old('birth_date', $user->birth_date) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#2b3674] outline-none transition text-sm text-gray-600">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Alamat Lengkap</label>
                    <textarea name="address" rows="2" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#2b3674] outline-none transition text-sm">{{ old('address', $user->address) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Kota / Kabupaten</label>
                    <input type="text" name="city" value="{{ old('city', $user->city) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#2b3674] outline-none transition text-sm">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Jenis Ternak</label>
                    <select name="livestock_type" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#2b3674] outline-none transition text-sm">
                        <option value="">-- Pilih Jenis --</option>
                        <option value="Ayam Broiler" {{ old('livestock_type', $user->livestock_type) == 'Ayam Broiler' ? 'selected' : '' }}>Ayam Broiler</option>
                        <option value="Ayam Petelur" {{ old('livestock_type', $user->livestock_type) == 'Ayam Petelur' ? 'selected' : '' }}>Ayam Petelur</option>
                        <option value="Sapi" {{ old('livestock_type', $user->livestock_type) == 'Sapi' ? 'selected' : '' }}>Sapi</option>
                    </select>
                </div>
            </div>

            <div class="mt-8 flex justify-end">
                <button type="submit" class="bg-[#2b3674] text-white px-8 py-2.5 rounded-xl font-bold hover:bg-blue-900 transition shadow-lg">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    {{-- Tabel Informasi Ekstra (Disamakan dengan gaya Tabel Historis di Device) --}}
    <h3 class="text-xl font-bold text-[#2b3674] mb-4 mt-8">Daftar Device yang Disewa User Ini</h3>
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden w-full overflow-x-auto">
        <table class="w-full text-left whitespace-nowrap">
            <thead class="bg-gray-50 border-b border-gray-100 text-gray-400 text-xs font-bold uppercase">
                <tr>
                    <th class="px-6 py-4">ID Device</th>
                    <th class="px-6 py-4">Nama Device</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                {{-- Bisa di-loop nanti: @foreach($user->devices as $dev) --}}
                <tr class="hover:bg-gray-50 transition text-sm text-gray-700">
                    <td class="px-6 py-4 font-mono font-bold text-[#2b3674]">#DEV-001</td>
                    <td class="px-6 py-4 font-bold">Kandang Broiler A</td>
                    <td class="px-6 py-4"><span class="text-green-500 font-bold">Online</span></td>
                    <td class="px-6 py-4 text-right">
                        <a href="#" class="text-blue-600 font-bold hover:text-blue-800 transition">Lihat</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection