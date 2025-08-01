<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AutenticaController extends Controller
{
    
    public function registro(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:5|confirmed'
        ],
        [
            'name.required' => 'El nombre es obligatorio',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email no es válido',
            'email.unique' => 'El email ya está registrado',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 5 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden']
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'rol' => 'user'
        ]);

        return to_route('dashboard')->with('info', 'Registro exitoso');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:5'
        ],
        [
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email no es válido',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 5 caracteres'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('info', 'Bienvenido, ' . auth()->user()->name);
        }

        return back()->withErrors([
            'email' => 'Datos de acceso incorrectos',
        ]);
        
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('home')->with('info', 'Sesión cerrada correctamente');
    }

    public function perfil(){
        $user = auth()->user();
        return view('auth.perfil', compact('user'));
    }

    public function perfilUpdate(Request $request, User $user){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . ($user->id ?? 'NULL')
        ],
        [
            'name.required' => 'El nombre es obligatorio',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email no es válido',
            'email.unique' => 'El email ya está registrado',
        ]);

        $user->update($request->all());
        return view('auth.login')->with('info', 'Perfil actualizado correctamente');
    }

    public function passwordUpdate(Request $request, User $user){
        $request->validate([
            'password_old' => 'required',
            'password' => 'required|min:5|confirmed'
        ],
        [
            'password_old.required' => 'La contraseña actual es obligatoria',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 5 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden'
        ]);
        //Validar si la contraseña actual es correcta
        if(!password_verify($request->password_old, $user->password)){
            return back()->withErrors([
                'password_old' => 'La contraseña actual no es correcta'
            ]);
        }
        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return view('auth.login')->with('info', 'Contraseña actualizada correctamente');
    }

}