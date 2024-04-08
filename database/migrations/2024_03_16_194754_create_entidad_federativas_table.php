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
        Schema::create('entidad_federativas', function (Blueprint $table) {
            $table->id()->comment('ID único de Entidad Federativa');
            $table->string('nombreEstado')->comment('Nombre de la Entidad Federativa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entidad_federativas');
    }
};
