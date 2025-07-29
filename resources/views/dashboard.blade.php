
@extends('layauts.navbar')

@section('titulo','Página Principal')

@section('contenido')

<div class="flex justify-center min-h-screen">
    <div class="hero bg-base-200 min-h-screen">
        <div class="hero-content flex-col-2 lg:flex-row-reverse">
          <div class="flex justify-center">
            <img width="450" src="imagenes/LOGO.png"/>
          </div>
          <div>
            <div>
                <h5 class="text-center text-3xl font-bold text-success mt-6 my-6">Hola, {{ auth()->user()->name }}</h5>
            </div>
            <h1 class="text-5xl font-bold">Bienvenido a nuestro sistema!</h1>
            <p class="py-6">
              Este es un sistema de gestion de servicios en la web, donde podras llevar el control de todos tus
              usuarios de forma creativa y eficiente.
            </p>
          </div>
        </div>
      </div>
</div>
@endsection