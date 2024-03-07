<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menjamur</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('partials.nav')
    <main class="max-w-7xl mx-auto p-4 md:p-6 min-h-dvh">
        @yield('contain')
    </main>
    @include('partials.footer')
</body>
</html>