<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://cdn.tiny.cloud/1/950h9e4w6ghsa51btqxfimcz6gwkoj6zavbz1xxj4zg53w8z/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="https://kit.fontawesome.com/4db6b32bd3.js" crossorigin="anonymous"></script>
    @yield('scripts')
</head>

<body>
    <div class="min-h-screen bg-gray-100">
        <x-general.navigations.navbar :breadcrumbs="$breadcrumbs"></x-general.navigations.navbar>

        {{ $slot }}

        <div class="w-full bg-white">
            <div class="py-12 container">
                <div class="w-full flex flex-col sm:flex-row space-y-2  justify-start">
                    <div class="w-full sm:w-2/5 pr-6 flex flex-col space-y-4">
                        <h2>Kuy Kerja</h2>
                        <p class="opacity-60">Cari lowongan pekerjaanmu atau buka lowongan sekarang juga.</p>
                    </div>
                    <div class="w-full sm:w-1/5 flex flex-col space-y-4">
                        <a class="opacity-60">About Us</a>
                        <a class="opacity-60">Out Services</a>
                        <a class="opacity-60">Contact</a>
                    </div>
                    <div class="w-full sm:w-1/5 flex flex-col space-y-4">
                        <a class="opacity-60">Privacy Policy</a>
                        <a class="opacity-60">Terms of Service</a>
                    </div>
                    <div class="w-full sm:w-1/5 pt-6 flex items-end mb-1">
                        <div class="flex flex-row space-x-4">
                            <i class="fab fa-facebook-f"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-instagram"></i>
                            <i class="fab fa-google"></i>
                        </div>
                    </div>
                </div>
                <div class="opacity-60 pt-2">
                    <p>© 2021 Kuy Kerja.</p>
                </div>
            </div>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
