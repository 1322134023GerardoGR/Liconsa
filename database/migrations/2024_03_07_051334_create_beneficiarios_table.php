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
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('apellido_p', 50);
            $table->string('apellido_m', 50);
            $table->string('curp', 18)->unique();
            $table->date('fecha_nac');
            $table->integer('n_dependientes');
            $table->string('direccion', 150);
            $table->string('folio_cb', 10);
            $table->string('num_lecheria', 10);
            $table->string('correo',70);
            $table->integer('d_asist1');
            $table->integer('d_asist2');
            $table->integer('d_asist3');
            $table->boolean('Sancionado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiarios');
    }
};
