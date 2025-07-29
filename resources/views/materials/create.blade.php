@extends('layauts.navbar')

@section('titulo','Crear Material')

@section('contenido')
<div class="flex flex-col min-h-screen">
   <div>
    <h2 class="text-center text-5xl font-bold text-success mt-6">Nuevo Material</h2>
   </div>
   <div class="flex justify-center my-6">
      <div class="card bg-blue-200 w-96 shadow-2x1">
        <form class="card-body" action="{{ route('materials.store') }}" method="POST">
            @csrf

            {{-- Nombre --}}
            <div class="form-control form-flexbox">
                <label class="label">
                <span class="label-text">Nombre del Material</span>
                </label>
                <input type="text" name="nombre" placeholder="Nombre del servicio" class="input input-bordered" required />
            </div>
            {{-- Cantidad --}}
            <div class="form-control">
                <label class="label">
                <span class="label-text">Cantidad</span>
                </label>
                <input type="text" name="cantidad" placeholder="Cantidad" class="input input-bordered" />
            </div>
            {{-- Precio --}}
            <div class="form-control">
                <label class="label">
                <span class="label-text">Precio</span>
                </label>
                <input type="text" name="precio" placeholder="Precio" class="input input-bordered" />
            </div>

            {{-- Servicio --}}
            <div class="form-control">
                <label class="label" for="servicio_id">
                    <span class="label-text">Servicio</span>
                </label>
                <select name="servicio_id" class="select select-bordered">
                    @foreach ($servicios as $servicio)
                        <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                    @endforeach
                </select>
            </div>

            

		    <div class="form-control mt-6">
                <button type="submit" class="btn btn-primary">Crear Material</button>
                <a href="{{ route('materials.index')}}" class="btn btn-outline mt-4" >Cancelar</a>
            </div>
	   </form>
      </div>
   </div>
</div>
@endsection