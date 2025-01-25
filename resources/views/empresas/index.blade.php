@extends('layauts.navbar')

@section('titulo','Empresa')

@section('contenido')
<div class="flex flex-col min-h-screen">
<div class=" grid grid-cols-1 lg:grid-cols-1 gap-5 m-20">
@foreach ($empresas as $empresa)
<div class="stats shadow">
    <div class="stat">
      <div class="stat-figure text-primary">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          class="inline-block h-4 w-10 stroke-current">
        </svg>
      </div>
      <div class="stat-title">Nombre de la empresa</div>
      <div class="stat-value text-primary">{{ $empresa->nombre}}</div>
    </div>
  
    <div class="stat">
      <div class="stat-figure text-secondary">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          class="inline-block h-8 w-8 stroke-current">
        </svg>
      </div>
      <div class="stat-title">Sede</div>
      <div class="stat-value text-secondary">{{ $empresa->sede}}</div>
    </div>
  
    <div class="stat">
      <div class="stat-figure flex justify-center">
        <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-outline btn-success">Editar</a>
        <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-outline btn-error mx-2">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
@endforeach
</div>
<div class="flex justify-center">
<a href="{{route('empresas.create')}}" class="btn btn-outline btn-info mx-4">Nueva Empresa</a>
</div>
</div>
@endsection