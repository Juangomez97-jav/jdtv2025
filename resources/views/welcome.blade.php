@extends('layauts.inicio')

@section('titulo','Página Principal')

@section('contenido')
<div class="hero bg-blue-200 min-h-screen">
  <div class="hero-content flex-col lg:flex-row-reverse">
    <div class="text-center lg:text-left">
      <h1 class="text-center text-5xl font-bold">Bienvenido a JDTV!</h1>
      <p class="py-6">
        Gracias por preferir nuestro sistema.
      </p>
    </div>
    <div class="card bg-red-100 w-full max-w-sm shrink-0 shadow-2xl">
      <form method="POST" action="{{ route('login') }}" class="card-body">
        @csrf

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
          <x-input-error :messages="$errors->get('password')" class="mt-2" />
          <label class="label">
            <a href="{{ route('password.request') }}" class="label-text-alt link link-hover">¿Olvidaste la contraseña?</a>
          </label>
        </div>

        <!-- Remember Me -->
        <div class="form-control mt-4 flex items-center">
          <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" />
            <span class="ms-2 text-sm text-gray-600">Recordarme</span>
          </label>
        </div>

        <!-- Submit Button -->
        <div class="form-control mt-6">
          <button type="submit" class="btn btn-primary w-full">Iniciar sesión</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection