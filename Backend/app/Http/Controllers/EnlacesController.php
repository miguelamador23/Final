<?php

namespace App\Http\Controllers;

use App\Models\Enlaces;
use Illuminate\Http\Request;

class EnlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enlaces = Enlaces::all();
        return response()->json($enlaces);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Implementa tu propia lógica aquí si necesitas una vista para crear un nuevo enlace
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // Define las reglas de validación aquí si es necesario
        ]);

        Enlaces::create($request->all());

        return response()->json(['message' => 'Enlace creado exitosamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Enlaces $enlaces)
    {
        return response()->json($enlaces);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enlaces $enlaces)
    {
        // Implementa tu propia lógica aquí si necesitas una vista para editar un enlace
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enlaces $enlaces)
    {
        $request->validate([
            // Define las reglas de validación aquí si es necesario
        ]);

        $enlaces->update($request->all());

        return response()->json(['message' => 'Enlace actualizado exitosamente']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enlaces $enlaces)
    {
        $enlaces->delete();

        return response()->json(['message' => 'Enlace eliminado exitosamente']);
    }
}
