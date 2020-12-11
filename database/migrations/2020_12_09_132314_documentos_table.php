<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_documentos');
            $table->string('URL_documentos');
            $table->string('fecha_entrega');
            $table->string('usuario_entrega');

            // Relations
            $table->integer('licitacion_id')->unsigned();
            $table->integer('area_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('documentos', function ($table) {
            $table->foreign('licitacion_id')->references('id')->on('licitaciones');
            $table->foreign('area_id')->references('id')->on('areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}
