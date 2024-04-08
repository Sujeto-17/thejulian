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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id()->comment('ID único de la venta');
            $table->unsignedBigInteger('empleado_id')->comment('Empleado que registra la venta');
            $table->unsignedBigInteger('producto_id')->comment('Producto que estan solicitando');
            $table->integer('cantidad')->comment('Cantidad o piezas');
            $table->integer('precio')->comment('Precio Unitario');
            $table->integer('total')->comment('Total de cantidad * precio');
            $table->unsignedBigInteger('metodoPago_id')->comment('Cual es la forma de pago');
            $table->timestamps();
            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('metodoPago_id')->references('id')->on('metodo_pagos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
