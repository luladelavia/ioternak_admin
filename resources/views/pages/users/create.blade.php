@extends('welcome')

@section('content')
<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
        <div class="border-b border-stroke py-4 px-6.5 dark:border-strokedark">
            <h3 class="font-medium text-black dark:text-white">Tambah User / Penyewa Baru</h3>
        </div>
        <form action="#" class="p-6.5">
            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full xl:w-1/2">
                    <label class="mb-2.5 block text-black dark:text-white">Nama Lengkap</label>
                    <input type="text" placeholder="Masukkan nama" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary" />
                </div>
                <div class="w-full xl:w-1/2">
                    <label class="mb-2.5 block text-black dark:text-white">Nomor WhatsApp</label>
                    <input type="number" placeholder="628..." class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary" />
                </div>
            </div>

            <div class="mb-4.5">
                <label class="mb-2.5 block text-black dark:text-white">Alamat Lengkap</label>
                <textarea rows="3" placeholder="Alamat rumah/kandang" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary"></textarea>
            </div>

            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full xl:w-1/2">
                    <label class="mb-2.5 block text-black dark:text-white">Jenis Ternak</label>
                    <select class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary">
                        <option value="broiler">Ayam Broiler</option>
                        <option value="petelur">Ayam Petelur</option>
                        <option value="puyuh">Burung Puyuh</option>
                    </select>
                </div>
                <div class="w-full xl:w-1/2">
                    <label class="mb-2.5 block text-black dark:text-white">Populasi (Ekor)</label>
                    <input type="number" placeholder="Contoh: 1000" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary" />
                </div>
            </div>

            <button class="flex w-full justify-center rounded bg-primary p-3 font-medium text-white">Simpan Data User</button>
        </form>
    </div>
</div>
@endsection