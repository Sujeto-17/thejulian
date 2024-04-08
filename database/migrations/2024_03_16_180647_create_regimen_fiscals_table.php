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
        Schema::create('regimen_fiscals', function (Blueprint $table) {
            $table->id()->comment('ID único del Régimen Fiscal');
            $table->string('nombreFiscal')->comment('Nombre del Régimen Fiscal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regimen_fiscals');
    }
};
