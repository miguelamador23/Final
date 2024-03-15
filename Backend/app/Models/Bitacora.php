<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;
    protected $table = 'bitacoras';

    public static function crearBitacora($userId, $userEmail, $descripcion) {

        $fecha = Carbon::now()->toDateString();
        $hora = Carbon::now()->toTimeString();

        $bitacora = new Bitacora();
        $bitacora -> bitacora = $descripcion;
        $bitacora -> id_usuario = $userId;
        $bitacora -> usuario_email = $userEmail;
        $bitacora -> fecha = $fecha;
        $bitacora -> hora = $hora;
        $bitacora -> save();
    }
}
