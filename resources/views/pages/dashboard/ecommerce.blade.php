@extends('welcome')

@section('content')
<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
    <div class="mb-6">
        <h2 class="text-title-md2 font-bold text-black dark:text-white text-center">
            Dashboard Overview
        </h2>
    </div>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
        
        <a href="{{ route('orders.index') }}" class="rounded-sm border border-stroke bg-white py-6 px-7.5 shadow-default hover:shadow-lg transition dark:border-strokedark dark:bg-boxdark">
            <div class="flex items-end justify-between">
                <div>
                    <h4 class="text-title-md font-bold text-black dark:text-white">12</h4>
                    <span class="text-sm font-medium">Pending Payments →</span>
                </div>
            </div>
        </a>

        <div class="rounded-sm border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex items-end justify-between">
                <div>
                    <h4 class="text-title-md font-bold text-black dark:text-white">Rp 45.2M</h4>
                    <span class="text-sm font-medium">Total Revenue</span>
                </div>
            </div>
        </div>

        <a href="{{ route('devices.index') }}" class="rounded-sm border border-stroke bg-white py-6 px-7.5 shadow-default hover:shadow-lg transition dark:border-strokedark dark:bg-boxdark">
            <div class="flex items-end justify-between">
                <div>
                    <h4 class="text-title-md font-bold text-black dark:text-white">98%</h4>
                    <span class="text-sm font-medium">Device Online →</span>
                </div>
            </div>
        </a>

        <a href="{{ route('users.index') }}" class="rounded-sm border border-stroke bg-white py-6 px-7.5 shadow-default hover:shadow-lg transition dark:border-strokedark dark:bg-boxdark">
            <div class="flex items-end justify-between">
                <div>
                    <h4 class="text-title-md font-bold text-black dark:text-white">89</h4>
                    <span class="text-sm font-medium">Penyewa Aktif →</span>
                </div>
            </div>
        </a>

    </div>
</div>
@endsection