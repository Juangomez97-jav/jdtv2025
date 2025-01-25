<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo','pagina principal')</title>
    @vite ('resources/css/app.css')
</head>
<body>
<main>    
<div class="navbar  bg-red-200">
    <div class="navbar-start">
      <p class="text-xl font-bold">JDTV</p>
    </div>
    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-horizontal px-2">
        <li><a href="{{route('dashboard')}}">Inicio</a></li>
        <li>
          <details>
            <summary>Clientes</summary>
            <ul class="p-2">
              <li><a href="{{route('empresas.index')}}">Usuarios tv</a></li>
              <li><a>Submenu 2</a></li>
            </ul>
          </details>
        </li>
      </ul>
    </div>
    
    {{-- Si esta autenticado muestra boton Nuevo usuario, sino muestra solo el mensaje de bienvenida  --}}
    @auth
    @if(auth()->user()->role == 'administrador')
      <h3 class="mr-2 font-semibold text-sm">Hola, {{ auth()->user()->name }}</h3>
      <!-- Mostrar el botón de "Nuevo usuario" solo si el usuario es administrador -->
      <div class="mx-4 space-x-4">
        <a href="{{ route('register') }}" class="btn btn-outline btn-sm">Nuevo usuario</a>
      </div>
    @else
      <h3 class="mr-2 font-semibold text-sm">Hola, {{ auth()->user()->name }}</h3>
    @endif
  @endauth
  <div class="navbar-end">
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="btn">Cerrar Sesion</a>
      </form>
  </div>
</div>
  @yield('contenido')
</main>
<footer>
    @include('layauts.footer')
</footer>
</body>
</html>