@extends('welcome')

@section('content')
<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white">
            Dashboard Overview
        </h2>
    </div>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
        
        <a href="{{ route('orders.index') }}" class="block rounded-sm border border-stroke bg-white py-6 px-7.5 shadow-default hover:shadow-lg transition dark:border-strokedark dark:bg-boxdark">
            <h4 class="text-title-md font-bold text-black dark:text-white">12</h4>
            <span class="text-sm font-medium text-yellow-500">Pending Payments →</span>
        </a>

        <div class="rounded-sm border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
            <h4 class="text-title-md font-bold text-black dark:text-white">Rp 45.2M</h4>
            <span class="text-sm font-medium text-green-500">Total Revenue</span>
        </div>

        <a href="{{ route('devices.index') }}" class="block rounded-sm border border-stroke bg-white py-6 px-7.5 shadow-default hover:shadow-lg transition dark:border-strokedark dark:bg-boxdark">
            <h4 class="text-title-md font-bold text-black dark:text-white">98%</h4>
            <span class="text-sm font-medium text-blue-500">Device Online →</span>
        </a>

        <a href="{{ route('users.index') }}" class="block rounded-sm border border-stroke bg-white py-6 px-7.5 shadow-default hover:shadow-lg transition dark:border-strokedark dark:bg-boxdark">
            <h4 class="text-title-md font-bold text-black dark:text-white">89</h4>
            <span class="text-sm font-medium text-meta-3">Penyewa Aktif →</span>
        </a>
    </div>
</div>
@endsection