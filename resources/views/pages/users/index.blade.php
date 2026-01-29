@extends('welcome')

@section('content')
<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white">Database Penyewa (Users)</h2>
        <a href="{{ route('users.create') }}" class="inline-flex items-center justify-center rounded-md bg-primary py-3 px-6 text-white hover:bg-opacity-90">
            + Tambah User Baru
        </a>
    </div>

    <div class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <div class="max-w-full overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-2 text-left dark:bg-meta-4">
                        <th class="py-4 px-4 font-medium text-black dark:text-white">Nama</th>
                        <th class="py-4 px-4 font-medium text-black dark:text-white">WhatsApp</th>
                        <th class="py-4 px-4 font-medium text-black dark:text-white">Lokasi</th>
                        <th class="py-4 px-4 font-medium text-black dark:text-white">Tipe Ternak</th>
                        <th class="py-4 px-4 font-medium text-black dark:text-white">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-[#eee] dark:border-strokedark">
                        <td class="py-5 px-4"><p class="text-black dark:text-white">Budi Santoso</p></td>
                        <td class="py-5 px-4"><p>08123456789</p></td>
                        <td class="py-5 px-4"><p>Bekasi, Jawa Barat</p></td>
                        <td class="py-5 px-4"><p>Ayam Broiler</p></td>
                        <td class="py-5 px-4">
                            <button class="text-primary hover:underline">Detail & Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection