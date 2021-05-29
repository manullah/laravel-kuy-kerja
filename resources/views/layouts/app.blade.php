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
    @yield('scripts')
</head>

<body>
    {{-- <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!--
    When the mobile menu is open, add `overflow-hidden` to the `body` element to prevent double scrollbars

    Menu open: "fixed inset-0 z-40 overflow-y-auto", Menu closed: ""
  -->
        <x-general.navigations.navbar></x-general.navigations.navbar>

        <div class="py-10">
            <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
                <x-general.navigations.sidebar></x-general.navigations.sidebar>

                <div class="col-span-10">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div> --}}
    <div class="min-h-screen bg-gray-100">
        <x-general.navigations.navbar :breadcrumbs="$breadcrumbs"></x-general.navigations.navbar>

        <main class="py-10">
            <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl">
                {{ $slot }}
            </div>
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
