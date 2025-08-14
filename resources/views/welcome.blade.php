<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Absensi SMP Negeri 2 Cigalontang</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/heroicons/2.0.1/20/solid.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">

    <!-- Preloader -->
    <div id="preloader" class="preloader fixed inset-0 bg-white dark:bg-black flex items-center justify-center z-50">
        <div class="spinner border-4 border-blue-600 border-t-transparent rounded-full w-12 h-12 animate-spin"></div>
    </div>

    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">

        <!-- Header -->
        <header class="px-6 py-6 lg:px-20 animate-fade-down sticky top-0 z-50 bg-white dark:bg-black shadow-md">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <x-application-logo class="size-12 sm:size-16" />
                    <h1 class="text-xl font-bold text-blue-700 dark:text-white">SMP Negeri 2 Cigalontang</h1>
                </div>
                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="hover:scale-105 transition-transform">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="hover:scale-105 transition-transform">Log in</a>
                        @endauth
                    </nav>
                @endif
            </div>
        </header>

        <!-- Main Content -->
        <main class="px-6 lg:px-20 mt-6">

            <!-- Hero Section dengan Carousel -->
            <section class="mt-6 lg:mt-10 grid gap-6 lg:grid-cols-2 items-center">

                <!-- Carousel Gambar -->
                <div class="relative w-full h-64 lg:h-96 overflow-hidden rounded-lg shadow-lg animate-fade-left">
                    <div id="carousel" class="w-full h-full relative">
                        <img src="{{ asset('asset/organize.jpg') }}" alt="Selamat Datang"
                            class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-100">
                        <img src="{{ asset('asset/welcome-2.jpg') }}" alt="Absensi Online"
                            class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0">
                    </div>
                    <!-- Kontrol Prev/Next -->
                    <button id="prev"
                        class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white/70 dark:bg-black/50 p-2 rounded-full hover:bg-white dark:hover:bg-black">
                        &#10094;
                    </button>
                    <button id="next"
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white/70 dark:bg-black/50 p-2 rounded-full hover:bg-white dark:hover:bg-black">
                        &#10095;
                    </button>
                </div>

                <!-- Cards Fitur -->
                <div class="grid gap-6 animate-fade-right">

                    <!-- Card 1: Input Absensi -->
                    <a href="{{ route('login') }}"
                        class="flex items-center gap-4 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md hover:scale-105 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-blue-700">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span class="text-lg font-medium text-black dark:text-white">Input Absensi</span>
                    </a>

                    <!-- Card 2: Laporan Absensi -->
                    <a href="{{ route('login') }}"
                        class="flex items-center gap-4 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md hover:scale-105 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-blue-700">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 17v-6h13M9 11h13M3 7h6v14H3V7z" />
                        </svg>
                        <span class="text-lg font-medium text-black dark:text-white">Laporan Absensi</span>
                    </a>

                    <!-- Card 3: Manajemen User -->
                    <a href="{{ route('login') }}"
                        class="flex items-center gap-4 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md hover:scale-105 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-blue-700">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg>
                        <span class="text-lg font-medium text-black dark:text-white">Manajemen User</span>
                    </a>

                    <!-- Card 4: Detail Absensi -->
                    <a href="{{ route('login') }}"
                        class="flex items-center gap-4 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md hover:scale-105 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-blue-700">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 7h18M3 12h18M3 17h18M4 7h.01M4 12h.01M4 17h.01" />
                        </svg>
                        <span class="text-lg font-medium text-black dark:text-white">Detail Absensi</span>
                    </a>

                    <!-- Card 5: Cetak Absensi -->
                    <a href="{{ route('login') }}"
                        class="flex items-center gap-4 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md hover:scale-105 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-blue-700">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 9v6h12V9M6 15v2a2 2 0 002 2h8a2 2 0 002-2v-2M6 9V7a2 2 0 012-2h8a2 2 0 012 2v2" />
                        </svg>
                        <span class="text-lg font-medium text-black dark:text-white">Cetak Absensi</span>
                    </a>

                </div>
            </section>

        </main>

        <!-- Footer -->
        <footer class="py-10 px-6 lg:px-20 text-center text-sm text-black dark:text-white/70 animate-fade-up mt-10">
            Sistem Absensi SMP Negeri 2 Cigalontang v1.0 by KKNTM0225 Politeknik LP3I Kampus Tasikmalaya
        </footer>
    </div>

    <!-- GSAP & Carousel Scripts -->
    <script>
        // GSAP Animations
        window.addEventListener('load', () => {
            gsap.to("#preloader", {
                opacity: 0,
                visibility: "hidden",
                duration: 1
            });
            gsap.from("header", {
                opacity: 0,
                y: -20,
                duration: 1
            });
            gsap.from("main", {
                opacity: 0,
                y: 20,
                duration: 1,
                delay: 0.5
            });
            gsap.from("footer", {
                opacity: 0,
                y: 20,
                duration: 1,
                delay: 1
            });

            // Carousel
            const slides = document.querySelectorAll('#carousel img');
            let current = 0;

            function showSlide(index) {
                slides.forEach((slide, i) => slide.style.opacity = i === index ? '1' : '0');
            }
            document.getElementById('prev').addEventListener('click', () => {
                current = (current - 1 + slides.length) % slides.length;
                showSlide(current);
            });
            document.getElementById('next').addEventListener('click', () => {
                current = (current + 1) % slides.length;
                showSlide(current);
            });
            setInterval(() => {
                current = (current + 1) % slides.length;
                showSlide(current);
            }, 5000);
            showSlide(current);
        });
    </script>

</body>

</html>
