<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pagina>
 */
class PaginaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => fake() -> email(),
            'nombre' => fake() -> name(),
            'descripcion' => fake() -> word(),
            'fecha_creacion' => fake() -> date(),
            'fecha_modificacion' => fake() -> date(),
            'usuario_creacion' => fake() -> email(),
            'usuario_modificacion' => fake() -> email(),
        ];
    }
}
