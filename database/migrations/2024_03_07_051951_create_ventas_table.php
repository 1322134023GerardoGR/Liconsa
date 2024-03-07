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
            $table->id();
            $table->string('folio',50);
            $table->date('fecha');
            $table->time('hora');
            $table->integer('litros_v');
            $table->float('total');
            $table->string('num_lecheria',10);
            $table->unsignedBigInteger('beneficiario_id');
            $table->unsignedBigInteger('trabajador_id');
            $table->timestamps();

            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios');
            $table->foreign('trabajador_id')->references('id')->on('trabajadors');
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
