<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin IoTernak</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body
  x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
  x-init="darkMode = JSON.parse(localStorage.getItem('darkMode')); $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
  <body style="background-color: white; color: black;">
  <div
    x-show="loaded"
    x-init="window.addEventListener('DOMContentLoaded', () => {setTimeout(() => loaded = false, 500)})"
    class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-white dark:bg-black"
  >
    <div class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-primary border-t-transparent"></div>
  </div>
  <div class="flex h-screen overflow-hidden">
    
    <aside :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'" class="absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-hidden bg-black duration-300 ease-linear dark:bg-boxdark lg:static lg:translate-x-0">
        <div class="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-6.5">
            <a href="{{ route('dashboard') }}" class="text-white text-2xl font-bold">IoTernak Admin</a>
        </div>

        <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
            <nav class="mt-5 py-4 px-4 lg:mt-9 lg:px-6">
                <ul class="mb-6 flex flex-col gap-1.5">
                    
                    <li>
                        <a href="{{ route('dashboard') }}" class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4">
                            Dashboard
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('users.index') }}" class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4">
                            Data Pengguna
                        </a>

                </ul>
            </nav>
        </div>
    </aside>
    <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
        
        <header class="sticky top-0 z-999 flex w-full bg-white drop-shadow-1 dark:bg-boxdark dark:drop-shadow-none">
            <div class="flex flex-grow items-center justify-between px-4 py-4 shadow-2 md:px-6 2xl:px-11">
                <div class="flex items-center gap-2 sm:gap-4 lg:hidden">
                    <button @click.stop="sidebarToggle = !sidebarToggle" class="z-99999 block rounded-sm border border-stroke bg-white p-1.5 shadow-sm dark:border-strokedark dark:bg-boxdark lg:hidden">
                        <span class="block h-5.5 w-5.5 cursor-pointer">Menu</span>
                    </button>
                </div>

                <div class="hidden sm:block">
                    <p class="font-medium">Halo, Admin</p>
                </div>
            </div>
        </header>
        <main>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        @yield('content')
        
        @if(isset($slot))
            {{ $slot }}
        @endif
    </div>
</main>
        </div>
    </div>
    </div> 
    </main>

    <script>
        function generateDeviceCode() {
            // Membuat angka random 4 digit
            const randomDigits = Math.floor(1000 + Math.random() * 9000);
            const newCode = `IPK-2026-${randomDigits}`;

            // Menampilkan pesan bahwa kode berhasil dibuat
            alert("Kode Unik Berhasil Dibuat: " + newCode);

            // Menampilkan di console
            console.log("Generated Code: ", newCode);
        }
    </script>
</body>
</html>
  </body>
</html>