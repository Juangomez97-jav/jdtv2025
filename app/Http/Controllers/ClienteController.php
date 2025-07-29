<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Servicio;
use App\Models\Cliente_estado;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::with(['servicio', 'empresa', 'cliente_estado', 'pago'])->get();
return view('clientes.index', compact('clientes'));
        //$clientes = Cliente::all();
        //return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresas = Empresa::orderBy('nombre')->get();
        //si no existen empresas, redirigir a la vista de creación de empresas
        if ($empresas->isEmpty()) {
            return redirect()->route('empresas.create')->with('info', 'Primero debes crear una empresa');
        }
        $servicios = Servicio::orderBy('nombre')->get();
        //si no existen servicios, redirigir a la vista de creación de servicios
        if ($servicios->isEmpty()) {
            return redirect()->route('servicios.create')->with('info', 'Primero debes crear un servicio');
        }
        $cliente_estados = Cliente_estado::orderBy('nombre')->get();
        //si no existen estado, redirigir a la vista de creación de servicios
        if ($cliente_estados->isEmpty()) {
            return redirect()->with('info', 'Primero debes crear un estado');
        }
        return view('clientes.create', ['empresas' => $empresas], ['servicios' => $servicios], ['cliente_estados' => $cliente_estados]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }

}
