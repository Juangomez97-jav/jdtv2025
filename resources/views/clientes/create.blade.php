@extends('layauts.navbar')

@section('titulo','Crear Cliente')

@section('contenido')
 <div class="flex flex-col min-h-screen">
   <div>
    <h2 class="text-center text-5xl font-bold text-success mt-6">Crear Cliente</h2>
   </div>
   <div class="flex justify-center my-6">
    <div class="card bg-blue-200 w-90 shadow-2xl">
        <form class="card-body" action="{{ route('clientes.store') }}" method="POST">
            @csrf
            {{-- Nombre de la empresa y Sede en una sola línea --}}
            <div class="form-control flex space-x-2 grid grid-cols-2 lg:grid-cols-2">
                <div class="w-1/8">
                    <label class="label">
                        <span class="label-text">Identificacion</span>
                    </label>
                    <input type="text" name="identificacion" placeholder="N° de identificacion" class="input input-bordered w-full" required />
                </div>
                <div class="w-1/8">
                    <label class="label">
                        <span class="label-text">Nombres</span>
                    </label>
                    <input type="text" name="nombre" placeholder="Ingrese sus nombres" class="input input-bordered w-full" required />
                </div>

                <div class="w-1/8">
                    <label class="label">
                        <span class="label-text">Apellidos</span>
                    </label>
                    <input type="text" name="apellido" placeholder="Ingrese sus apellidos" class="input input-bordered w-full" required />
                </div>
                <div class="w-1/8">
                    <label class="label">
                        <span class="label-text">Telefono</span>
                    </label>
                    <input type="text" name="telefono" placeholder="Ingrese su telefono" class="input input-bordered w-full" required />
                </div>
                
                <div class="w-1/8">
                    <label class="label">
                        <span class="label-text">Barrio</span>
                    </label>
                    <input type="text" name="barrio" placeholder="Ingrese su barrio" class="input input-bordered w-full" required />
                </div>
                <div class="w-1/8">
                    <label class="label">
                        <span class="label-text">Calle</span>
                    </label>
                    <input type="text" name="calle" placeholder="Ingrese su calle" class="input input-bordered w-full" required />
                </div>

                <div class="w-1/8">
                    <label class="label">
                        <span class="label-text">Poste</span>
                    </label>
                    <input type="text" name="poste" placeholder="Ingrese su poste" class="input input-bordered w-full" required />
                </div>
                <div class="w-1/8">
                    <label class="label">
                        <span class="label-text">Correo</span>
                    </label>
                    <input type="email" name="email" placeholder="Ingrese su correo" class="input input-bordered w-full" required />
                </div>

                {{-- Empresa --}}
            <div class="form-control">
                <label class="label" for="empresa_id">
                    <span class="label-text">Empresa</span>
                </label>
                <select name="empresa_id" class="select select-bordered">
                    @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                    @endforeach
                </select>
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

            {{-- Cliente_estado --}}
            <div class="form-control">
                <label class="label" for="cliente_estado_id">
                    <span class="label-text">Estado</span>
                </label>
                <select name="cliente_estado_id" class="select select-bordered">
                    @foreach ($cliente_estados as $cliente_estado)
                        <option value="{{ $cliente_estado->id }}">{{ $cliente_estado->nombre }}</option>
                    @endforeach
                </select>
            </div>
                
            </div>
            <div class="form-control mt-6">
                <button type="submit" class="btn btn-success">Crear Cliente</button>
                <a href="{{route('clientes.index')}}" class="btn btn-outline mt-4">Cancelar</a>
            </div>
        </form>
    </div>
</div>

 </div>
@endsection