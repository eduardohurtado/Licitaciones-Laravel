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
            $table->integer('id_licitacion')->unsigned();
            $table->integer('id_area')->unsigned();

            $table->timestamps();
        });

        Schema::table('documentos', function ($table) {
            $table->foreign('id_licitacion')->references('id')->on('licitaciones');
            $table->foreign('id_area')->references('id')->on('areas');
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
