<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Enlace;
use Illuminate\Http\Request;

class EnlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Enlace::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $enlace = new Enlace();
        $enlace -> id_pagina = $request -> id_pagina;
        $enlace -> id_rol = $request -> id_rol;
        $enlace -> descripcion = $request -> descripcion;
        $enlace -> fecha_creacion = $request -> fecha_creacion;
        $enlace -> fecha_modificacion = $request -> fecha_modificacion;
        $enlace -> usuario_creacion = $request -> usuario_creacion;
        $enlace -> usuario_modificacion = $request -> usuario_modificacion;
        $enlace -> save();

        // Proceso para anotar el registro de creacion de enlaces en la bitacora
        define('USER_ID_STORE', 1);
        define('USER_EMAIL_STORE', 'admin@admin');
        $descripcion = 'Se ha creado un nuevo enlace por el usuario'.": ". $request->usuario_creacion;
        Bitacora::crearBitacora(USER_ID_STORE, USER_EMAIL_STORE, $descripcion);

        return "El enlace se guardó correctamente.";
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $id = Enlace::find($id);
        //$id = Enlace::where('id_enlace', $id)->first();
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enlace $enlace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $enlace = Enlace::find($id);
        //$enlace = Enlace::where('id_enlace', $id)->first();
        $enlace -> id_pagina = $request -> id_pagina;
        $enlace -> id_rol = $request -> id_rol;
        $enlace -> descripcion = $request -> descripcion;
        $enlace -> fecha_creacion = $request -> fecha_creacion;
        $enlace -> fecha_modificacion = $request -> fecha_modificacion;
        $enlace -> usuario_creacion = $request -> usuario_creacion;
        $enlace -> usuario_modificacion = $request -> usuario_modificacion;
        $enlace -> save();

        // Proceso para anotar el registro de actualizacion de enlaces en la bitacora
        define('USER_ID_UPDATE', 1);
        define('USER_EMAIL_UPDATE', 'admin@admin');
        $descripcion = 'Se ha actualizado el registro del enlace por el usuario'.": ". $request->usuario_modificacion;
        Bitacora::crearBitacora(USER_ID_UPDATE, USER_EMAIL_UPDATE, $descripcion);

        return "El enlace se actualizó correctamente.";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $enlace = Enlace::find($id);
        //$enlace = Enlace::where('id_enlace', $id)->first();
        $enlace -> delete();

        // Proceso para anotar el registro de eliminacion de enlaces en la bitacora
        define('USER_ID_DELETE', 1);
        define('USER_EMAIL_DELETE', 'admin@admin');
        $descripcion = 'Se ha eliminado el registro del enlace';
        Bitacora::crearBitacora(USER_ID_DELETE, USER_EMAIL_DELETE, $descripcion);

        return "El enlace se eliminó correctamente.";
    }
}
