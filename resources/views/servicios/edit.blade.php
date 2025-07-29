@extends('layauts.navbar')

@section('titulo','Editar Servicio')

@section('contenido')
<div class="flex flex-col min-h-screen">
   <div>
    <h2 class="text-center text-5xl font-bold text-success mt-6">Actualizar Servicio</h2>
   </div>
   <div class="flex justify-center my-6">
      <div class="card bg-blue-200 w-96 shadow-2x1">
        <form class="card-body" action="{{ route('servicios.update', $servicio->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Nombre --}}
            <div class="form-control form-flexbox">
                <label class="label">
                <span class="label-text">Nombre del servicio</span>
                </label>
                <input type="text" name="nombre" value="{{ $servicio->nombre }}" placeholder="Nombre del servicio" class="input input-bordered" required />
            </div>
            {{-- Precio --}}
            <div class="form-control">
                <label class="label">
                <span class="label-text">Precio</span>
                </label>
                <input type="text" name="sede" value="{{ $servicio->precio }}" placeholder="Precio" class="input input-bordered" />
            </div>
            {{-- Empresa y sede --}}
            <div class="form-control">
                <label class="label" for="empresa_id">
                    <span class="label-text">Empresa</span>
                </label>
                <select name="empresa_id" class="select select-bordered">
                    @foreach ($empresas as $empresa)
                        @if ($empresa->id == $servicio->empresa_id)
                            <option value="{{$empresa->id}}" selected>{{$empresa->nombre}} - {{$empresa->sede}}</option>
                        @else
                            <option value="{{$empresa->id}}">{{$empresa->nombre}} - {{$empresa->sede}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

		    <div class="form-control mt-6">
                <button type="submit" class="btn btn-primary">Actualizar Servicio</button>
                <a href="{{ route('servicios.index')}}" class="btn btn-outline mt-4" >Cancelar</a>
            </div>
	   </form>
      </div>
   </div>
</div>
@endsection