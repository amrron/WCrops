<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/assets/js/jquery-3.7.1.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  
  @include('partials.navbar')
  
  <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
     @include('partials.aside')
     <div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>
     <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
      <main>
         @yield('contain')
      </main>
    </div>
  </div>  

  @include('js.script')
  @yield('script')
</body>
</html>