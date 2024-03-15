<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Pagina;
use Exception;
use Illuminate\Http\Request;

class PaginaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Pagina::all();
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
        try {
            $pagina = new Pagina();
            $pagina -> fecha_creacion = $request -> fecha_creacion;
            $pagina -> fecha_modificacion = $request -> fecha_modificacion;
            $pagina -> usuario_creacion = $request -> usuario_creacion;
            $pagina -> usuario_modificacion = $request -> usuario_modificacion;
            $pagina -> url = $request -> url;
            $pagina -> nombre = $request -> nombre;
            $pagina -> descripcion = $request -> descripcion;
            $pagina -> save();

            // Proceso para anotar el registro de creacion de paginas en la bitacora
            define('USER_ID_STORE', 1);
            define('USER_EMAIL_STORE', 'admin@admin');
            $descripcion = 'Se ha creado una nueva pagina: '. $request -> url .' por el usuario'.": ". $request->usuario_creacion;
            Bitacora::crearBitacora(USER_ID_STORE, USER_EMAIL_STORE, $descripcion);

            return "La pagina se guardó correctamente.";

        } catch (Exception $e) {
            return response()->json(["mensaje" => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $id = Pagina::find($id);
        //$id = Pagina::where('id_pagina', $id)->first();
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pagina $pagina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pagina = Pagina::find($id);
        //$pagina = Pagina::where('id_pagina', $id)->first();
        $pagina -> fecha_creacion = $request -> fecha_creacion;
        $pagina -> fecha_modificacion = $request -> fecha_modificacion;
        $pagina -> usuario_creacion = $request -> usuario_creacion;
        $pagina -> usuario_modificacion = $request -> usuario_modificacion;
        $pagina -> url = $request -> url;
        $pagina -> nombre = $request -> nombre;
        $pagina -> descripcion = $request -> descripcion;
        $pagina -> save();

        // Proceso para anotar el registro de actualizacion de paginas en la bitacora
        define('USER_ID_UPDATE', 1);
        define('USER_EMAIL_UPDATE', 'admin@admin');
        $descripcion = 'Se ha actualizado la pagina: '. $request -> url .', por el usuario'.": ". $request->usuario_modificacion;
        Bitacora::crearBitacora(USER_ID_UPDATE, USER_EMAIL_UPDATE, $descripcion);

        return "La pagina se actualizó correctamente.";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pagina = Pagina::find($id);
        //$pagina = Pagina::where('id_pagina', $id)->first();
        $pagina -> delete();

        // Proceso para anotar el registro de eliminacion de paginas en la bitacora
        define('USER_ID_DELETE', 1);
        define('USER_EMAIL_DELETE', 'admin@admin');
        $descripcion = 'Se ha eliminado el registro de la pagina';
        Bitacora::crearBitacora(USER_ID_DELETE, USER_EMAIL_DELETE, $descripcion);

        return "La pagina se eliminó correctamente.";
    }
}
