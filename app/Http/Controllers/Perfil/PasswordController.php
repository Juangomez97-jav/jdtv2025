<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Actualizar la contraseña.
     */
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

        return back()->with('info', 'Contraseña actualizada correctamente');
    }
}
