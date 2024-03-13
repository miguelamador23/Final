<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id('rol_id'); // Cambiado a 'rol_id' con id()
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('usuarios'); // Cambiado a 'id'
            $table->enum('role', ['usuario', 'administrador']); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
