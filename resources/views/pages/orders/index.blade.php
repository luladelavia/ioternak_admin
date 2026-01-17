@extends('welcome')

@section('content')
<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white">Inventaris Device (Assets)</h2>
        <button class="inline-flex items-center justify-center rounded-md bg-primary py-3 px-6 text-white hover:bg-opacity-90">
            + Generate Device ID Baru
        </button>
    </div>

    <div class="mb-4 flex flex-wrap gap-3">
        <input type="text" placeholder="Cari Device ID..." class="rounded border border-stroke py-2 px-4 outline-none focus:border-primary dark:border-strokedark dark:bg-boxdark">
        <select class="rounded border border-stroke py-2 px-4 outline-none dark:border-strokedark dark:bg-boxdark">
            <option value="">Semua Status</option>
            <option value="available">Available</option>
            <option value="rented">Rented</option>
            <option value="maintenance">Maintenance</option>
        </select>
    </div>

    <div class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <div class="max-w-full overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-2 text-left dark:bg-meta-4">
                        <th class="py-4 px-4 font-medium text-black dark:text-white">Device ID</th>
                        <th class="py-4 px-4 font-medium text-black dark:text-white">Tipe</th>
                        <th class="py-4 px-4 font-medium text-black dark:text-white">Status</th>
                        <th class="py-4 px-4 font-medium text-black dark:text-white">Penyewa Saat Ini</th>
                        <th class="py-4 px-4 font-medium text-black dark:text-white">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-[#eee] dark:border-strokedark">
                        <td class="py-5 px-4"><p class="font-bold">IOP-9921</p></td>
                        <td class="py-5 px-4"><p>IoPeka</p></td>
                        <td class="py-5 px-4">
                            <span class="inline-flex rounded-full bg-success bg-opacity-10 py-1 px-3 text-sm font-medium text-success">Rented</span>
                        </td>
                        <td class="py-5 px-4"><p class="text-primary underline">Budi Santoso</p></td>
                        <td class="py-5 px-4">
                            <button class="text-primary hover:underline">Detail</button>
                        </td>
                    </tr>
                    <tr class="border-b border-[#eee] dark:border-strokedark">
                        <td class="py-5 px-4"><p class="font-bold">IOP-9922</p></td>
                        <td class="py-5 px-4"><p>IoPakan</p></td>
                        <td class="py-5 px-4">
                            <span class="inline-flex rounded-full bg-blue-500 bg-opacity-10 py-1 px-3 text-sm font-medium text-blue-500">Available</span>
                        </td>
                        <td class="py-5 px-4"><p class="text-gray-400">- Di Gudang -</p></td>
                        <td class="py-5 px-4">
                            <button class="text-primary hover:underline">Detail</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection