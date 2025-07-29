@extends('layauts.navbar')
@section('titulo', 'Registro de nuevo usuario')
@section('contenido') 
  <div class="flex flex-col min-h-screen my-20">
    <div class="flex justify-center my-6">
        <div class="card w-96 bg-blue-200 shandow-2xl">
            <div class="card-body">
                {{-- Mostrar mensajes de error --}}
                <div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="badge badge-warning">{{$error}}</div>
                        @endforeach
                    @endif
                </div>
                <form action="{{route('registro.store')}}" method="POST">
                    @csrf
                    {{-- Nombre --}}
                    <div class="form-control">
                        <label class="label" for="name">
                            <span class="label-text">Nombre</span>
                        </label>
                        <input type="text" name="name" placeholder="Escriba su nombre" maxlength="255" class="input input-sm input-bordered" required autofocus value="{{old('name')}}" />
                    </div>
                    {{-- Email --}}
                    <div class="form-control">
                        <label class="label" for="email">
                            <span class="label-text">Correo</span>
                        </label>
                        <input type="email" name="email" placeholder="Escriba su correo" maxlength="255" class="input input-sm input-bordered" required value="{{old('email')}}" />
                    </div>
                    {{-- Contraseña --}}
                    <div class="form-control">
                        <label class="label" for="password">
                            <span class="label-text">Contraseña</span>
                        </label>
                        <input type="password" name="password" placeholder="Mínimo 5 caracteres" maxlength="45" class="input input-sm input-bordered" required />
                    </div>
                    {{-- Confirmar Contraseña --}}
                    <div class="form-control">
                        <label class="label" for="password_confirmation">
                            <span class="label-text">Confirmar contraseña</span>
                        </label>
                        <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" maxlength="45" class="input input-sm input-bordered" required />
                    </div>
                    {{-- Botones --}}
                    <div class="form-control mt-6">
                        <button class="btn btn-sm btn-primary">Crear ususario</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline btn-primary mt-4">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
@endsection
