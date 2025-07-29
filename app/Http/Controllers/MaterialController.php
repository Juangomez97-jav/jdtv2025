<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Servicio;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::all();
        return view('materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servicios = Servicio::orderBy('nombre')->get();
        //si no existen servicios, redirigir a la vista de creación de servicios
        if ($servicios->isEmpty()) {
            return redirect()->route('servicios.create')->with('info', 'Primero debes crear un servicio');
        }
        return view('materials.create', ['servicios' => $servicios]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Material::create($request->all());
        return redirect()->route('materials.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        $servicios = Servicio::all();
        return view('materials.edit', ['material' => $material , 'servicios' => $servicios]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        $material->update($request->all());
        return redirect()->route('materials.index')->with('info','Se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('materials.index')->with('info', 'Se elimino correctamente el material');
    }
}
