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
        Schema::create('detalle_tumbas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tumba_id');
            $table->unsignedBigInteger('obrasAdicionales_id');
            $table->unsignedBigInteger('estadoPago_id');
            $table->string('titular')->nullable();
            $table->string('contador_detalle')->nullable();
            $table->string('dni')->nullable();
            $table->string('celular')->nullable();
            $table->string('fecha')->nullable();
            $table->string('observacion')->nullable();
            $table->string('tipoTraslado')->nullable();
            $table->string('cementerioTraslado')->nullable();
            $table->string('token');
            $table->foreign('tumba_id')->references('id')->on('tumbas');
            $table->foreign('obrasAdicionales_id')->references('id')->on('obras_adicionales');
            $table->foreign('estadoPago_id')->references('id')->on('estado_pagos');
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
        //
    }
};
