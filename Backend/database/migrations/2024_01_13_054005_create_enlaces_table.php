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
        Schema::create('enlaces', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_pagina');
            $table->foreign('id_pagina')->references('id')->on('paginas');
            $table->unsignedBigInteger('id_rol');
            $table->foreign('id_rol')->references('id')->on('roles');
            $table->string('descripcion');
            $table->date('fecha_creacion');
            $table->date('fecha_modificacion');
            $table->string('usuario_creacion');
            $table->string('usuario_modificacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enlaces');
    }
};
