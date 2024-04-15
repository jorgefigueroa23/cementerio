<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('detalle_entierro', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_entierro');
            $table->unsignedBigInteger('id_tumba');
            $table->string('acta_defuncion');
            $table->string('observacion');
            $table->foreign('id_entierro')->references('id')->on('entierros');
            $table->foreign('id_tumba')->references('id')->on('tumbas');
            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
};
