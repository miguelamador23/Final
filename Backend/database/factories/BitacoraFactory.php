<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bitacora>
 */
class BitacoraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bitacora' => fake() -> text(),
            'id_usuario' => fake() -> numberBetween($int = 1, $int2 = 10),
            'usuario_email' => fake() -> email(),
            'fecha' => fake() -> date(),
            'hora' => fake() -> time(),
        ];
    }
}
