<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Rol::all();
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
        $rol = new Rol();
        $rol -> fecha_creacion = $request -> fecha_creacion;
        $rol -> fecha_modificacion = $request -> fecha_modificacion;
        $rol -> usuario_creacion = $request -> usuario_creacion;
        $rol -> usuario_modificacion = $request -> usuario_modificacion;
        $rol -> rol = $request -> rol;
        $rol -> save();

        // Proceso para anotar el registro de creacion de roles en la bitacora
        define('USER_ID_STORE', 1);
        define('USER_EMAIL_STORE', 'admin@admin');
        $descripcion = 'Se ha creado un nuevo rol: '. $request -> rol .', por el usuario'.": ". $request -> usuario_creacion;
        Bitacora::crearBitacora(USER_ID_STORE, USER_EMAIL_STORE, $descripcion);

        return "El rol se guardó correctamente.";
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $id = Rol::find($id);
        //$id = Rol::where('id_rol', $id)->first();
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rol $rol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rol = Rol::find($id);
        //$rol = Rol::where('id_rol', $id)->first();
        $rol -> fecha_creacion = $request -> fecha_creacion;
        $rol -> fecha_modificacion = $request -> fecha_modificacion;
        $rol -> usuario_creacion = $request -> usuario_creacion;
        $rol -> usuario_modificacion = $request -> usuario_modificacion;
        $rol -> rol = $request -> rol;
        $rol -> save();

        // Proceso para anotar el registro de actualizacion de roles en la bitacora
        define('USER_ID_UPDATE', 1);
        define('USER_EMAIL_UPDATE', 'admin@admin');
        $descripcion = 'Se ha actualizado el rol: '. $request -> rol .', por el usuario' .": ". $request -> usuario_modificacion;;
        Bitacora::crearBitacora(USER_ID_UPDATE, USER_EMAIL_UPDATE, $descripcion);

        return "El rol se actualizó correctamente.";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rol = Rol::find($id);
        //$rol = Rol::where('id_rol', $id)->first();
        $rol -> delete();

        // Proceso para anotar el registro de eliminacion de roles en la bitacora
        define('USER_ID_DELETE', 1);
        define('USER_EMAIL_DELETE', 'admin@admin');
        $descripcion = 'Se ha eliminado el rol';
        Bitacora::crearBitacora(USER_ID_DELETE, USER_EMAIL_DELETE, $descripcion);

        return "El rol se eliminó correctamente.";
    }
}
