<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <script src="/script/jquery-3.7.1.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  
  @include('partials.navbar')
  @include('partials.aside')

  
  <div class="p-4 sm:ml-64">
     <div class="p-4 border-2 border-gray-200 rounded-lg  mt-14">
        @yield('contain')
     </div>
  </div>  

  <script>
   
  </script>

  @yield('script')
</body>
</html>