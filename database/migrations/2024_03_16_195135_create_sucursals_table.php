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
        Schema::create('sucursals', function (Blueprint $table) {
            $table->id()->comment('ID único de la sucursal');
            $table->string('nombreSucursal')->comment('Nombre de la sucursal');
            $table->string('calle')->comment('Nombre calle');
            $table->string('codigoPostal')->comment('Codigo Postal');
            $table->string('colonia')->comment('Colonia');
            $table->string('municipio')->comment('Municipio');
            $table->string('localidad')->comment('Localidad');
            $table->unsignedBigInteger('entidadFederativa_id')->comment('Entidad Federativa');
            $table->text('referencias')->comment('Referencias para ubicar la sucursal');
            $table->timestamps();
            $table->foreign('entidadFederativa_id')->references('id')->on('entidad_federativas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sucursals');
    }
};
