@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white">
            Detail Device: <span class="text-primary">#IPK-2026-001</span>
        </h2>
    </div>

    <div class="grid grid-cols-1 gap-9 sm:grid-cols-2">
        <div class="flex flex-col gap-9">
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke py-4 px-6.5 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">Pengaturan Asset</h3>
                </div>
                <div class="p-6.5">
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">Status Alat</label>
                        <select class="w-full rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-strokedark">
                            <option value="Available">Available</option>
                            <option value="Rented">Rented</option>
                            <option value="Maintenance">Maintenance</option>
                        </select>
                    </div>
                    <button class="flex w-full justify-center rounded bg-primary p-3 font-medium text-white">Simpan Perubahan</button>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-9">
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke py-4 px-6.5 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">Status Terkini</h3>
                </div>
                <div class="p-6.5">
                    <div class="mb-6">
                        <label class="mb-1 block text-sm font-medium text-black">Konektivitas:</label>
                        <div class="flex items-center gap-2">
                            <span class="h-3 w-3 rounded-full bg-success"></span>
                            <span class="font-bold text-success text-lg">Online</span>
                        </div>
                        <p class="text-xs text-body mt-1 italic">*Terakhir mengirim data: 19:45 WIB</p>
                    </div>

                    <div class="rounded-sm border border-stroke bg-gray-2 p-4 dark:bg-meta-4">
                        <label class="mb-1 block text-sm font-medium">Penyewa Aktif:</label>
                        <p class="text-lg font-bold text-black dark:text-white">Ridho Batara</p>
                        <p class="text-sm text-body">Masa Sewa: 20 Jan - 20 Feb 2026</p>
                        <hr class="my-3 border-stroke">
                        <a href="#" class="text-sm text-primary font-medium hover:underline italic">Lihat Profil Lengkap User →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection