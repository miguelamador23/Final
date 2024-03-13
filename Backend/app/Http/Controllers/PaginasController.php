<?php

namespace App\Http\Controllers;

use App\Models\Paginas;
use Illuminate\Http\Request;

class PaginasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginas = Paginas::all();
        return response()->json($paginas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Implementa tu propia lógica aquí si necesitas una vista para crear una nueva página
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // Define las reglas de validación aquí si es necesario
        ]);

        Paginas::create($request->all());

        return response()->json(['message' => 'Página creada exitosamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Paginas $paginas)
    {
        return response()->json($paginas);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paginas $paginas)
    {
        // Implementa tu propia lógica aquí si necesitas una vista para editar una página
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paginas $paginas)
    {
        $request->validate([
            // Define las reglas de validación aquí si es necesario
        ]);

        $paginas->update($request->all());

        return response()->json(['message' => 'Página actualizada exitosamente']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paginas $paginas)
    {
        $paginas->delete();

        return response()->json(['message' => 'Página eliminada exitosamente']);
    }
}
