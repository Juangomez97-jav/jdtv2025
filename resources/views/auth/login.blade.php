{{--<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>--}}

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

