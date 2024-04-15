<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('tumbas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pabellon_id');
            $table->unsignedBigInteger('contador');
            $table->string('montoTumba');
            $table->string('estado');
            $table->string('letra');
            $table->string('numero');
            $table->string('oldCodigo')->nullable();
            $table->foreign('pabellon_id')->references('id')->on('pabellons');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tumbas');
    }
};
