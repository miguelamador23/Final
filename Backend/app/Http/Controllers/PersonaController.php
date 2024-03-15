<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Persona::all();
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
        $persona = new Persona();
        $persona -> fecha_creacion = $request -> fecha_creacion;
        $persona -> fecha_modificacion = $request -> fecha_modificacion;
        $persona -> usuario_creacion = $request -> usuario_creacion;
        $persona -> usuario_modificacion = $request -> usuario_modificacion;
        $persona -> primer_nombre = $request -> primer_nombre;
        $persona -> segundo_nombre = $request -> segundo_nombre;
        $persona -> primer_apellido = $request -> primer_apellido;
        $persona -> segundo_apellido = $request -> segundo_apellido;
        $persona -> save();

        // Proceso para anotar el registro de creacion de la persona en la bitacora
        define('USER_ID_STORE', 1);
        define('USER_EMAIL_STORE', 'admin@admin');
        $descripcion = 'El registro de la persona: '. $request -> primer_nombre .' '. $request -> primer_apellido .', ha sido creado por el usuario'.": ". $request -> usuario_creacion;
        Bitacora::crearBitacora(USER_ID_STORE, USER_EMAIL_STORE, $descripcion);

        return "La persona se guardó correctamente.";
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $id = Persona::find($id);
        //$id = Persona::where('id_persona', $id)->first();
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $persona = Persona::find($id);
        //$persona = Persona::where('id_persona', $id)->first();
        $persona -> fecha_creacion = $request -> fecha_creacion;
        $persona -> fecha_modificacion = $request -> fecha_modificacion;
        $persona -> usuario_creacion = $request -> usuario_creacion;
        $persona -> usuario_modificacion = $request -> usuario_modificacion;
        $persona -> primer_nombre = $request -> primer_nombre;
        $persona -> segundo_nombre = $request -> segundo_nombre;
        $persona -> primer_apellido = $request -> primer_apellido;
        $persona -> segundo_apellido = $request -> segundo_apellido;
        $persona -> save();

        // Proceso para anotar el registro de actualizacion de la persona en la bitacora
        define('USER_ID_UPDATE', 1);
        define('USER_EMAIL_UPDATE', 'admin@admin');
        $descripcion = 'El registro de la persona: '. $request -> primer_nombre .' '. $request -> primer_apellido .', ha sido modificado por el usuario'.": ". $request -> usuario_modificacion;
        Bitacora::crearBitacora(USER_ID_UPDATE, USER_EMAIL_UPDATE, $descripcion);

        return "La persona se actualizó correctamente.";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $persona = Persona::find($id);
        //$persona = Persona::where('id_persona', $id)->first();
        $persona -> delete();

        // Proceso para anotar el registro de eliminacion de la persona en la bitacora
        define('USER_ID_DELETE', 1);
        define('USER_EMAIL_DELETE', 'admin@admin');
        $descripcion = 'El registro de la persona ha sido eliminado.';
        Bitacora::crearBitacora(USER_ID_DELETE, USER_EMAIL_DELETE, $descripcion);

        return "La persona se eliminó correctamente.";
    }
}
