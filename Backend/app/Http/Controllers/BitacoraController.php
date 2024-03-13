<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bitacoras = Bitacora::all();
        return response()->json($bitacoras);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Implementa tu propia lógica aquí si necesitas una vista para crear una nueva bitácora
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // Define las reglas de validación aquí si es necesario
        ]);

        Bitacora::create($request->all());

        return response()->json(['message' => 'Bitácora creada exitosamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Bitacora $bitacora)
    {
        return response()->json($bitacora);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bitacora $bitacora)
    {
        // Implementa tu propia lógica aquí si necesitas una vista para editar una bitácora
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bitacora $bitacora)
    {
        $request->validate([
            // Define las reglas de validación aquí si es necesario
        ]);

        $bitacora->update($request->all());

        return response()->json(['message' => 'Bitácora actualizada exitosamente']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bitacora $bitacora)
    {
        $bitacora->delete();

        return response()->json(['message' => 'Bitácora eliminada exitosamente']);
    }
}
