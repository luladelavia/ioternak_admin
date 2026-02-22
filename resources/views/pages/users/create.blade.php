@extends('layouts.app')

@section('content')
<div class="ml-64 p-8 bg-[#f4f7fe] min-h-screen">
    
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-bold text-[#2b3674]">Tambah User Baru</h2>
            <p class="text-sm text-gray-500 mt-1">Silakan lengkapi form pendaftaran pengguna di bawah ini.</p>
        </div>
        <a href="{{ route('users.index') }}" class="bg-white text-gray-700 border border-gray-200 px-6 py-2 rounded-xl font-bold hover:bg-gray-50 transition shadow-sm flex items-center gap-2">
            <span>←</span> Kembali ke Index
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-8">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="full_name" value="{{ old('full_name') }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#2b3674] outline-none transition text-sm">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">No. WhatsApp</label>
                    <input type="number" name="phone_number" value="{{ old('phone_number') }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#2b3674] outline-none transition text-sm">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Password</label>
                    <input type="password" name="password" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#2b3674] outline-none transition text-sm">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Lahir</label>
                    <input type="date" name="birth_date" value="{{ old('birth_date') }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#2b3674] outline-none transition text-sm text-gray-600">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Alamat Lengkap</label>
                    <textarea name="address" rows="2" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#2b3674] outline-none transition text-sm">{{ old('address') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Kota / Kabupaten</label>
                    <input type="text" name="city" value="{{ old('city') }}" placeholder="Contoh: Boyolali" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#2b3674] outline-none transition text-sm">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Jenis Ternak</label>
                    <select name="livestock_type" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#2b3674] outline-none transition text-sm">
                        <option value="">-- Pilih Jenis --</option>
                        <option value="Ayam Broiler">Ayam Broiler</option>
                        <option value="Ayam Petelur">Ayam Petelur</option>
                        <option value="Sapi">Sapi</option>
                    </select>
                </div>
            </div>

            <div class="mt-8 flex justify-end">
                <button type="submit" class="bg-[#2b3674] text-white px-8 py-2.5 rounded-xl font-bold hover:bg-blue-900 transition shadow-lg">
                    Simpan User Baru
                </button>
            </div>
        </form>
    </div>
</div>
@endsection