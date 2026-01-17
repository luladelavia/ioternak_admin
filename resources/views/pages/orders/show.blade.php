@extends('welcome')

@section('content')
<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white">Detail Order #ORD-2024-001</h2>
        <button class="inline-flex items-center justify-center rounded-md bg-black py-2 px-6 text-white hover:bg-opacity-90">
            Cetak Invoice (PDF)
        </button>
    </div>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <div class="rounded-sm border border-stroke bg-white p-6 shadow-default dark:border-strokedark dark:bg-boxdark">
            <h3 class="mb-4 text-xl font-bold">Informasi Penyewa</h3>
            <p class="mb-2"><strong>Nama:</strong> Budi Santoso</p>
            <p class="mb-2"><strong>Alamat:</strong> Jl. Peternakan No. 12, Bekasi</p>
            <a href="https://wa.me/628123456789" target="_blank" class="mt-4 inline-block rounded bg-success py-2 px-4 text-white">
                Chat via WhatsApp
            </a>
        </div>

        <div class="rounded-sm border border-stroke bg-white p-6 shadow-default dark:border-strokedark dark:bg-boxdark">
            <h3 class="mb-4 text-xl font-bold">Rincian Aset</h3>
            <p class="mb-2"><strong>Device ID:</strong> IOP-9921 (IoPeka)</p>
            <p class="mb-2"><strong>Status:</strong> <span class="text-success font-bold">Active</span></p>
            <p class="mb-2"><strong>Jatuh Tempo:</strong> 17-02-2026</p>
        </div>
    </div>
</div>
@endsection