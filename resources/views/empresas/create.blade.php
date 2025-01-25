
@extends('layauts.navbar')

@section('titulo','Crear Empresa')

@section('contenido')
 <div class="flex flex-col min-h-screen">
   <div>
    <h2 class="text-center text-5xl font-bold text-success mt-6">Crear Empresa</h2>
   </div>
   <div class="flex justify-center my-6">
    <div class="card bg-blue-200 w-90 shadow-2xl">
        <form class="card-body" action="{{ route('empresas.store') }}" method="POST">
            @csrf
            {{-- Nombre de la empresa y Sede en una sola línea --}}
            <div class="form-control flex space-x-2 grid grid-cols-2 lg:grid-cols-2">
                <div class="w-1/8">
                    <label class="label">
                        <span class="label-text">Nombre</span>
                    </label>
                    <input type="text" name="nombre" placeholder="Nombre de la empresa" class="input input-bordered w-full" required />
                </div>
                <div class="w-1/8">
                    <label class="label">
                        <span class="label-text">Sede</span>
                    </label>
                    <input type="text" name="sede" placeholder="Sede" class="input input-bordered w-full" required />
                </div>
                <div class="w-1/8">
                    <label class="label">
                        <span class="label-text">Descripcion</span>
                    </label>
                    <textarea type="textarea" name="descripcion" placeholder="Descripcion" class="textarea textarea-bordered w-full" required></textarea>
                </div>
                
            </div>
            <div class="form-control mt-6">
                <button type="submit" class="btn btn-success">Crear empresa</button>
                <a href="{{route('empresas.index')}}" class="btn btn-outline mt-4">Cancelar</a>
            </div>
        </form>
    </div>
</div>

 </div>
@endsection