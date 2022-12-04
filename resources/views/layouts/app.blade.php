<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @livewireStyles
    @fcStyles

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>





    @stack('styles')
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif


        @if (session()->has('danger'))

        <div class="bg-red-200 mt-4 flex justify-center w-3/6 mx-auto h-[50px] ">
            <span class="text-red-700 text-center text-xl font-bold my-auto">
                {{ session()->get('danger') }}
            </span>
        </div>

        @endif


        @if (session()->has('success'))
        <div class="bg-green-200 mt-4 flex justify-center w-3/6 mx-auto h-[50px] ">
            <span class="text-green-700 text-center text-xl font-bold my-auto">
                {{ session()->get('success') }}
            </span>
        </div>
        @endif

        @if (session()->has('warning'))
        <div class="bg-yellow-200 mt-4 flex justify-center w-3/6 mx-auto h-[50px] ">
            <span class="text-yellow-700 text-center text-xl font-bold my-auto">
                {{ session()->get('warning') }}
            </span>
        </div>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <footer class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="https://flowbite.com/" class="hover:underline">Pedro Henrique Lopes</a>.
            </span>
            <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">Sobre</a>
                </li>

                <li>
                    <a href="#" class="hover:underline">Contato</a>
                </li>
            </ul>
        </footer>

    </div>
    @livewireScripts
    @fcScripts
    @stack('scripts')

</body>

</html>