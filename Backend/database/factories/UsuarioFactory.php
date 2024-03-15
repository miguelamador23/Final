<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $clave;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_persona' => fake() -> numberBetween($int = 1, $int2 = 10),
            'usuario_email' => fake() -> email(),
            'clave' => static::$clave ??= Hash::make('clave'),
            'estado' => fake() -> numberBetween($int = 1, $int2 = 2),
            'fecha_nacimiento' => fake() -> date(),
            'id_rol' => fake() -> numberBetween($int = 1, $int2 = 2),
            'fecha_creacion' => fake() -> date(),
            'fecha_modificacion' => fake() -> date(),
            'usuario_creacion' => fake() -> email(),
            'usuario_modificacion' => fake() -> email(),
        ];
    }
}
