<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Usuario::all();
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
        $usuario = new Usuario();
        $usuario -> fecha_creacion = $request -> fecha_creacion;
        $usuario -> fecha_modificacion = $request -> fecha_modificacion;
        $usuario -> usuario_creacion = $request -> usuario_creacion;
        $usuario -> usuario_modificacion = $request -> usuario_modificacion;
        $usuario -> id_persona = $request -> id_persona;
        $usuario -> usuario_email = $request -> usuario_email;
        $usuario -> clave = Hash::make($request->clave);
        $usuario -> estado = $request -> estado;
        $usuario -> fecha_nacimiento = $request -> fecha_nacimiento;
        $usuario -> id_rol = $request -> id_rol;
        $usuario -> save();

        // Proceso para anotar el registro de creacion de usuario en la bitacora
        define('USER_ID_STORE', 1);
        define('USER_EMAIL_STORE', 'admin@admin');
        $descripcion = 'El usuario '. $request->usuario_email .' ha sido creado por el usuario: '.$request -> usuario_creacion;
        Bitacora::crearBitacora(USER_ID_STORE, USER_EMAIL_STORE, $descripcion);

        return "El usuario se guardó correctamente.";
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $id = Usuario::find($id);
        //$id = Usuario::where('id_usuario', $id)->first();
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        //$usuario = Usuario::where('id_usuario', $id)->first();
        $usuario -> fecha_creacion = $request -> fecha_creacion;
        $usuario -> fecha_modificacion = $request -> fecha_modificacion;
        $usuario -> usuario_creacion = $request -> usuario_creacion;
        $usuario -> usuario_modificacion = $request -> usuario_modificacion;
        $usuario -> id_persona = $request -> id_persona;
        $usuario -> usuario_email = $request -> usuario_email;
        $usuario -> clave = Hash::make($request->clave);
        $usuario -> estado = $request -> estado;
        $usuario -> fecha_nacimiento = $request -> fecha_nacimiento;
        $usuario -> id_rol = $request -> id_rol;
        $usuario -> save();

        // Proceso para anotar el registro de actualizacion de usuario en la bitacora
        define('USER_ID_UPDATE', 1);
        define('USER_EMAIL_UPDATE', 'admin@admin');
        $descripcion = 'El usuario '. $request->usuario_email .' con ID# ' . $id .' ha sido modificado por el usuario: '.$request -> usuario_modificacion;
        Bitacora::crearBitacora(USER_ID_UPDATE, USER_EMAIL_UPDATE, $descripcion);

        return "El usuario se actualizó correctamente.";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        //$usuario = Usuario::where('id_usuario', $id)->first();
        $usuario -> delete();

        // Proceso para anotar el registro de eliminacion de usuario en la bitacora
        define('USER_ID_DELETE', 1);
        define('USER_EMAIL_DELETE', 'admin@admin');
        $descripcion = 'usuario eliminado con ID# '. $id;
        Bitacora::crearBitacora(USER_ID_DELETE, USER_EMAIL_DELETE, $descripcion);


        return "El usuario se eliminó correctamente.";
    }
}
