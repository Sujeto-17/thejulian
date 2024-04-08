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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id()->comment('ID unico del Empleado');
            $table->string('nombres')->comment('Nombres');
            $table->string('apellidos')->comment('Apellidos');
            $table->string('telefono')->comment('Teléfono');
            $table->string('correo')->comment('Correo electrónico');
            $table->unsignedBigInteger('categoria_id')->comment('Categoria al que pertenece');
            $table->string('status')->comment('Activo o Inactivo');
            $table->timestamps();
            $table->foreign('categoria_id')->references('id')->on('categorias');
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
