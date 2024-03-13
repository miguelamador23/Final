<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Roles::all();
        return response()->json($roles);
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // Define las reglas de validación aquí
        ]);

        Roles::create($request->all());

        return redirect()->route('roles.index')
            ->with('success', 'Rol creado exitosamente.');
    }

    public function show(Roles $roles)
    {
        return response()->json($roles);
    }

    public function edit(Roles $roles)
    {
        return view('roles.edit', compact('roles'));
    }

    public function update(Request $request, Roles $roles)
    {
        $request->validate([
            // Define las reglas de validación aquí
        ]);

        $roles->update($request->all());

        return redirect()->route('roles.index')
            ->with('success', 'Rol actualizado exitosamente.');
    }

    public function destroy(Roles $roles)
    {
        $roles->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Rol eliminado exitosamente.');
    }
}
