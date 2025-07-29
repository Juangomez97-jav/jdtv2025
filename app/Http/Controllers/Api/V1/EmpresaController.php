<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function __construct()
    {
        //Sólo los usuarios autenticados y rol admin pueden acceder a todas las rutas de este controlador
        //los usuarios autenticados y rol diferente de admin pueden acceder únicamente a la ruta index de este controlador
        $this->middleware('auth:sanctum'); //Tipo de autenticación: sanctum (token)
        $this->middleware('admin')->except('index');
    }
    public function index()
    {
        return response()->json(Empresa::all(),200); //mostrar todas las empresas
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        //validar datos
        $datos = $request->validate([
            'nombre' => ['required','string','max:30'],
            'sede' => ['required','string','max:30'],
            'descripcion' => ['nullable','string','max:100']
        ]);

        //guardar datos
        $empresa = Empresa::create($datos);

        //respuesta al cliente
        return response()->json([
            'success' => true,
            'message' => 'Empresa creada con exito',
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        return response()->json($empresa, 200); //mostrar una empresa
    }

   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empresa $empresa)
    {
        //validar datos
        $datos = request->validate([
            'nombre' => ['required','string','max:30'],
            'sede' => ['required','string','max:30'],
            'descripcion' => ['nullable','string','max:100']
        ]);
        //actualizar datos
        $empresa->update($datos);
        //respuesta al cliente
        return response()->json([
            'success' => true,
            'message' => 'Empresa actualizada con exito',
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        //Eliminar empresa
        $empresa->delete();
        //respuesta al cliente
        return response()->json([
            'success' => true,
            'message' => 'Empresa eliminada con exito'
        ],204);
    }
}