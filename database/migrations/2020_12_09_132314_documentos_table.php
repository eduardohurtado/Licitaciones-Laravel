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
            $table->integer('id_licitaciones')->unsigned();
            $table->integer('id_areas')->unsigned();

            $table->timestamps();
        });

        Schema::table('documentos', function ($table) {
            $table->foreign('id_licitaciones')->references('id')->on('licitaciones');
            $table->foreign('id_areas')->references('id')->on('areas');
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
