<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entierros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_difunto');
            $table->string('fecha_fallecimiento')->nullable();
            $table->string('fecha_entierro')->nullable();
            $table->string('hora_entierro')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entierros');
    }
};
