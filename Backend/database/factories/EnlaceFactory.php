<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enlace>
 */
class EnlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_pagina' => fake() -> numberBetween($int = 1, $int2 = 10),
            'id_rol' => fake() -> numberBetween($int = 1, $int2 = 10),
            'descripcion' => fake() -> text(),
            'fecha_creacion' => fake() -> date(),
            'fecha_modificacion' => fake() -> date(),
            'usuario_creacion' => fake() -> email(),
            'usuario_modificacion' => fake() -> email(),
        ];
    }
}
