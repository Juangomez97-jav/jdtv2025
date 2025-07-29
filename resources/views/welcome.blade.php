@extends('layauts.inicio')

@section('titulo','Página Principal')

@section('contenido')
<div class="hero bg-blue-200 min-h-screen">
  <div class="hero-content flex-col lg:flex-row-reverse">
    <div class="text-center lg:text-left">
      <div class="flex justify-center">
        <img width="150" src="imagenes/LOGO.png"/>
      </div>
      <h1 class="text-center text-5xl font-bold">Bienvenido a JDTV!</h1>
      <p class="py-6">
        Gracias por preferir nuestro sistema.
      </p>
    </div>
    <div class="card bg-red-100 w-full max-w-sm shrink-0 shadow-2xl">
      <form method="POST" action="{{ route('login') }}" class="card-body">
        @csrf

        <!--Titulo -->
        <div>
          <h2 class="text-center text-3xl font-bold">Ingresar</h2>
        </div>
        <!-- Email Address -->
        <div class="form-control">
          <label class="label">
            <span class="label-text">Correo</span>
          </label>
          <x-text-input 
            id="email" 
            class="input input-bordered" 
            type="email" 
            name="email" 
            :value="old('email')" 
            required 
            autofocus 
            placeholder="Correo" 
          />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-control mt-4">
          <label class="label">
            <span class="label-text">Contraseña</span>
          </label>
          <x-text-input 
            id="password" 
            class="input input-bordered" 
            type="password" 
            name="password" 
            required 
            placeholder="Contraseña"
          />

        <!-- Submit Button -->
        <div class="form-control mt-6">
          <button type="submit" class="btn btn-primary w-full">Iniciar sesión</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection