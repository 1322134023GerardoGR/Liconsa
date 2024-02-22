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
        Schema::create('venta', function (Blueprint $table) {
            $table->id();
            $table->string('folio',50);
            $table->date('fecha');
            $table->time('hora');
            $table->integer('litros');
            $table->float('Total');
            $table->unsignedBigInteger('tutor_id'); // Cambiado a unsignedBigInteger
            $table->unsignedBigInteger('trabajador_id');
            $table->string('num_lecheria',10);
            $table->timestamps();

            $table->foreign('tutor_id')->references('id')->on('tutor_legal');
            $table->foreign('trabajador_id')->references('id')->on('trabajador');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta');
    }
};
