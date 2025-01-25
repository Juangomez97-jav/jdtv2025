@extends('layauts.navbar')

@section('titulo','Editar empresa')

@section('contenido')
<div class="flex flex-col min-h-screen">
   <div>
    <h2 class="text-center text-5xl font-bold text-success mt-6">Actualizar Empresa</h2>
   </div>
   <div class="flex justify-center my-6">
      <div class="card bg-blue-200 w-96 shadow-2x1">
        <form class="card-body" action="{{ route('empresas.update', $empresa->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Nombre --}}
            <div class="form-control form-flexbox">
                <label class="label">
                <span class="label-text">Nombre de la empresa</span>
                </label>
                <input type="text" name="nombre" value="{{ $empresa->nombre }}" placeholder="Nombre de la empresa" class="input input-bordered" required />
            </div>
            {{-- Sede --}}
            <div class="form-control">
                <label class="label">
                <span class="label-text">Sede</span>
                </label>
                <input type="text" name="sede" value="{{ $empresa->sede }}" placeholder="Sede" class="input input-bordered" />
            </div>
            {{-- Descripcion --}}
            <div class="form-control">
                <label class="label">
                <span class="label-text">Descripcion</span>
                </label>
                <input type="text" name="descripcion" value="{{ $empresa->descripcion }}" placeholder="Descripcion" class="input input-bordered"/>
            </div>

		    <div class="form-control mt-6">
                <button type="submit" class="btn btn-primary">Actualizar empresa</button>
                <a href="{{ route('empresas.index')}}" class="btn btn-outline mt-4" >Cancelar</a>
            </div>
	   </form>
      </div>
   </div>
</div>
@endsection