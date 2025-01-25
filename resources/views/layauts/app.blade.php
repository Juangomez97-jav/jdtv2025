<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('titulo','JDTV')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
       {{-- barra de navegacion --}}
       @include('layauts.navbar')
    </header>
    <main>
       @yield('contenido')
    </main>
    <footer>
       @yield('layauts.footer')
    </footer>
</body>
</html>