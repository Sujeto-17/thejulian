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
            $table->id()->comment('ID único de los Clientes');
            $table->string('rfc')->comment('RFC del Cliente')->nullable();
            $table->string('razonSocial')->comment('Razón Social del Cliente')->nullable();
            $table->string('nombre')->comment('Nombre del Cliente')->nullable();
            $table->string('apellido')->comment('Apellidos del Cliente')->nullable();
            $table->string('correo')->comment('Correo electrónico')->nullable();
            $table->string('telefono')->comment('Teléfono')->nullable();
            $table->unsignedBigInteger('regimenFiscal_id')->comment('Regimen Fiscal')->nullable();
            $table->string('calle')->comment('Calle')->nullable();
            $table->string('codigoPostal')->comment('Código Postal')->nullable();
            $table->string('colonia')->comment('Colonia')->nullable();
            $table->string('nExterior')->comment('Número Exterior')->nullable();
            $table->string('nInterior')->comment('Número Interior')->nullable();
            $table->string('localidad')->comment('Localidad')->nullable();
            $table->string('municipio')->comment('municipio')->nullable();
            $table->unsignedBigInteger('entidadFederativa_id')->comment('Entidad Federativa')->nullable();
            $table->timestamps();
            $table->foreign('entidadFederativa_id')->references('id')->on('entidad_federativas')->nullable();
            $table->foreign('regimenFiscal_id')->references('id')->on('regimen_fiscals')->nullable();
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
