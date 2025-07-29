@extends('layauts.navbar')

@section('titulo','Servicios')

@section('contenido')
<div class="flex flex-col min-h-screen">
    <div class=" grid grid-cols-3 lg:grid-cols-3 gap-5 m-20">
        @foreach ($servicios as $servicio)
       <div class="card card-compact bg-base-100 w-96 shadow-xl">
        <figure>
          <div class="flex justify-center">
            <img width="150" src="imagenes/servicios.jpg">
          </div>
        </figure>
        <div class="card-body">
          <h2 class="card-title">Empresa: {{$servicio->empresa->nombre}}</h2>
          <h3>Sede: {{$servicio->empresa->sede}}</h3>
          <p>Servicio: {{$servicio->nombre}}</p>
          <p>Presio: {{$servicio->precio}}</p>

          <div class="stat">
            <div class="stat-figure flex justify-center">
              <a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-outline btn-success">Editar</a>
              <form action="{{ route('servicios.destroy', $servicio->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline btn-error mx-2">Eliminar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="flex justify-center my-1">
      <a href="{{route('servicios.create')}}" class="btn btn-outline btn-info mx-4">Nuevo Servicio</a>
  </div>
</div>
@endsection