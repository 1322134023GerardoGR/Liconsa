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
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50);
            $table->string('apellido_p',50);
            $table->string('apellido_m',50);
            $table->string('curp',18);
            $table->string('rol',30);
            $table->string('rfc',13);
            $table->string('codigo',10);
            $table->unsignedBigInteger('cuenta_id');
            $table->timestamps();

            $table->foreign('cuenta_id')->references('id')->on('cuentas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajadors');
    }
};
