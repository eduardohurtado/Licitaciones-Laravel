<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LicitacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licitaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('id_cliente')->unsigned();
            $table->string('fecha_inicio');
            $table->string('fecha_cierre');
            $table->string('fecha_presentacion_documentos');
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
        Schema::dropIfExists('licitaciones');
    }
}
