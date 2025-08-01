@extends('layauts.navbar')
@section('titulo', 'Mi perfil')
@section('cabecera', 'Mi perfil')

@section('contenido')
    <div class="flex flex-col items-center my-20">
        {{-- Información del perfil de usuario --}}
        <div class="card w-1/2  shadow-2xl bg-base-100 mt-6">
            <div class="card-body">
                <h2 class="text-xl font-semibold">Información de usuario</h2>
                {{-- Mostrar mensajes de error --}}
                <div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="badge badge-warning">{{$error}}</div>
                        @endforeach
                    @endif
                </div>
                <form action="{{route('perfil.update', $user)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-control">
                        <label class="label" for="name">
                            <span class="label-text">Nombre</span>
                        </label>
                        <input type="text" name="name" placeholder="Nombre" class="input input-bordered" maxlength="255" value="{{$user->name}}" required />
                    </div>
                    <div class="form-control">
                        <label class="label" for="email">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" name="email" placeholder="Email" class="input input-bordered" maxlength="255" value="{{$user->email}}" />
                    </div>
                    <div class="form-control mt-6 w-1/2">
                        <button class="btn btn-sm btn-neutral normal-case">Actualizar perfil</button>
                    </div>
                </form>
            </div>
        </div>
        
        {{-- Actualizar contraseña --}}
        <div class="card w-1/2 shadow-2xl bg-base-100 mt-6">
            <div class="card-body">
                <h2 class="text-xl font-semibold">Cambiar contraseña</h2>
                <form action="{{route('password.update', $user)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-control">
                        <label class="label" for="password_old">
                            <span class="label-text">Contraseña actual</span>
                        </label>
                        <input type="password" name="password_old" placeholder="Ingrese la contraseña actual" class="input input-bordered" maxlength="45" required />
                    </div>
                    <div class="form-control">
                        <label class="label" for="password">
                            <span class="label-text">Nueva contraseña</span>
                        </label>
                        <input type="password" name="password" placeholder="Ingrese la nueva contraseña" class="input input-bordered" maxlength="45" required />
                    </div>
                    <div class="form-control">
                        <label class="label" for="password_confirmation">
                            <span class="label-text">Confirmar nueva contraseña</span>
                        </label>
                        <input type="password" name="password_confirmation" placeholder="Confirme la nueva contraseña" class="input input-bordered" maxlength="45" required />
                    </div>
                    <div class="form-control mt-6 w-1/2">
                        <button class="btn btn-sm btn-neutral normal-case">Cambiar contraseña</button>                        
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
