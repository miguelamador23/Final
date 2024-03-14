<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:usuarios',
        'password' => 'required|min:6',
    ]);

    Usuario::create($request->only(['email', 'password']));

    return redirect()->route('usuarios.index')
        ->with('success', 'Usuario creado exitosamente.');
}

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuarios)
    {
        return response()->json($usuarios);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuarios)
    {
        return view('usuarios.edit', compact('usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuarios)
    {
        $request->validate([
            'email' => 'required|email|unique:usuarios,email,' . $usuarios->id,
            'password' => 'required|min:6',
            // Agrega más reglas de validación según sea necesario
        ]);

        $usuarios->update($request->all());

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuarios)
    {
        $usuarios->delete();

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario eliminado exitosamente.');
    }
}
