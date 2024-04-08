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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id()->comment('ID único del Pedido');
            $table->unsignedBigInteger('cliente_id')->comment('Cliente que solicita el pedido');
            $table->unsignedBigInteger('empleado_id')->comment('Empleado que registra el pedido');
            $table->unsignedBigInteger('producto_id')->comment('Producto que estan solicitando');
            $table->text('descripcion')->comment('Descripcion detallada del pedido');
            $table->integer('cantidad')->comment('Cantidad o piezas');
            $table->integer('precio')->comment('Precio Unitario');
            $table->integer('total')->comment('Total de cantidad * precio');
            $table->unsignedBigInteger('metodoPago_id')->comment('Cual es la forma de pago');
            $table->boolean('factura')->comment('Booleano si requiere factura o no')->nullable();
            $table->unsignedBigInteger('status_id')->comment('Estado que se encuentra el pedido');
            $table->timestamps();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('metodoPago_id')->references('id')->on('metodo_pagos');
            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
