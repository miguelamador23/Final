<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['email', 'password', /* Otros campos */];

    public static function rules()
    {
        return [
            'email' => 'required|email|unique:usuarios',
            'password' => 'required|min:6',
            // Agrega más reglas de validación según sea necesario
        ];
    }
}
