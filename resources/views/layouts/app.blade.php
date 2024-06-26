<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/x-icon" href="/assets/images/logo-icon.png">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@100;300&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="/assets/js/jquery-3.7.1.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- CDN Import -->
        @yield('cdn')
    </head>
    <body class="font-sans antialiased scroll-smooth">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            {{-- <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

            <!-- Page Content -->
            <main>
                <div class="py-12 pt-[72px] md:pt-[116px] bg-white">
                    <div class="max-w-7xl mx-auto min-h-dvh">
                        <div class="overflow-hidden sm:rounded-lg p-0 py-4 md:p-4">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </main>
        </div>

        @include('layouts.footer')


        <div id="toast" class="hidden fixed top-24 md:top-32 right-1/2 translate-x-1/2 transition ease-in-out delay-300 items-center w-[90%] md:w-full max-w-md p-4 text-gray-500 bg-white rounded-lg shadow-xl dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="text-sm font-normal" id="toast-message">
            
            </div>
            <div class="flex items-center ms-auto space-x-2 rtl:space-x-reverse">
                <a class="text-sm font-medium text-wc-red-400 p-1.5 hover:bg-wc-red-000 rounded-lg" href="#" id="toast-action"></a>
                {{-- <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button> --}}
            </div>
        </div>

        @include('js.script')
        @yield('script')
    </body>
</html>
