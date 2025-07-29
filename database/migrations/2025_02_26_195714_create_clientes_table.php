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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->integer('identificacion');
            $table->string('nombres',50);
            $table->string('apellidos',50);
            $table->string('telefono');
            $table->string('barrio');
            $table->integer('calle');
            $table->integer('poste');
            $table->string('correo');
            $table->foreignId('empresa_id')->constrained();
            $table->foreignId('servicio_id')->constrained();
            $table->foreignId('cliente_estado_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
