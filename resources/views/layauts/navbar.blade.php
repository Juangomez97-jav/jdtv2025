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
<div class="navbar  bg-red-200 fixed top-0 left-0 w-full z-10">
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
              <li><a href="{{route('empresas.index')}}">Empresas</a></li>
              <li><a href="{{route('servicios.index')}}">Servicios de tv</a></li>
              <li><a href="{{route('materials.index')}}">Materiales</a></li>
              <li><a href="{{route('clientes.index')}}">Clientes</a></li>
            </ul>
          </details>
        </li>
        <li>
          <details>
            <summary>Pagos</summary>
              <ul class="p-2">
                <li><a href="{{route('pagos.index')}}">Recaudo</a></li>
              </ul>
          </details>
        </li>
        <li><a href="{{route('perfil')}}">Mi perfil</a></li>
      </ul>
    </div>
    
    {{-- Si esta autenticado muestra boton Nuevo usuario, sino muestra solo el mensaje de bienvenida  --}}
    @auth
    @if(auth()->user()->rol == 'admin')
      <h3 class="mr-2 font-semibold text-sm">Hola, {{ auth()->user()->name }}</h3>
      <!-- Mostrar el botón de "Nuevo usuario" solo si el usuario es administrador -->
      <form method="POST" action="{{ route('registro') }}">
         @csrf
         <a href="{{ route('registro') }}" class="btn btn-outline btn-sm">Nuevo usuario</a>
      </form>
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