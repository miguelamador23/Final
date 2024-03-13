<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personas = Personas::all();
        return response()->json($personas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Debes implementar tu propia lógica para crear una nueva persona
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // Define las reglas de validación aquí
        ]);

        Personas::create($request->all());

        return response()->json(['message' => 'Persona creada exitosamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Personas $personas)
    {
        return response()->json($personas);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personas $personas)
    {
        // Debes implementar tu propia lógica para editar una persona
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personas $personas)
    {
        $request->validate([
            // Define las reglas de validación aquí
        ]);

        $personas->update($request->all());

        return response()->json(['message' => 'Persona actualizada exitosamente']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personas $personas)
    {
        $personas->delete();

        return response()->json(['message' => 'Persona eliminada exitosamente']);
    }
}
