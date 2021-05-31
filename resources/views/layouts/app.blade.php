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
    <div class="min-h-screen bg-gray-100">
        <x-general.navigations.navbar :breadcrumbs="$breadcrumbs"></x-general.navigations.navbar>

        {{ $slot }}
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
