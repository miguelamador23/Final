<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $bitacoraSeeder = new BitacoraSeeder();
        $bitacoraSeeder -> run();

        $enlaceSeeder = new EnlaceSeeder();
        $enlaceSeeder -> run();

        $paginaSeeder = new PaginaSeeder();
        $paginaSeeder -> run();

        $personaSeeder = new PersonaSeeder();
        $personaSeeder -> run();

        $rolSeeder = new RolSeeder();
        $rolSeeder -> run();

        $usuarioSeeder = new UsuarioSeeder();
        $usuarioSeeder -> run();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
