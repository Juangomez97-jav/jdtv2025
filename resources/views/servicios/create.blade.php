
@extends('layauts.navbar')

@section('titulo','Crear Servicio')

@section('contenido')
 <div class="flex flex-col min-h-screen">
   <div>
    <h2 class="text-center text-5xl font-bold text-success mt-6">Crear Servicio</h2>
   </div>
   <div class="flex justify-center my-6">
    <div class="card bg-blue-200 w-90 shadow-2xl">
        <form class="card-body" action="{{ route('servicios.store') }}" method="POST">
            @csrf
            {{-- Nombre de la empresa y Sede en una sola línea --}}
            <div class="form-control flex space-x-2 grid grid-cols-2 lg:grid-cols-2">
                <div class="w-1/8">
                    <label class="label">
                        <span class="label-text">Nombre del servicio</span>
                    </label>
                    <input type="text" name="nombre" placeholder="Nombre del servicio" class="input input-bordered w-full" required />
                </div>
                <div class="w-1/8">
                    <label class="label">
                        <span class="label-text">Precio</span>
                    </label>
                    <input type="text" name="precio" placeholder="Precio" class="input input-bordered w-full" required />
                </div>
                {{-- Categoria --}}
                <div class="form-control">
                    <label class="label" for="empresa_id">
                        <span class="label-text">Empresa</span>
                    </label>
                    <select name="empresa_id" class="select select-bordered">
                        @foreach ($empresas as $empresa)
                            <option value="{{ $empresa->id }}">{{ $empresa->nombre }} - {{ $empresa->sede }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-control mt-6">
                <button type="submit" class="btn btn-success">Crear Servicio</button>
                <a href="{{route('servicios.index')}}" class="btn btn-outline mt-4">Cancelar</a>
            </div>
        </form>
    </div>
</div>

 </div>
@endsection