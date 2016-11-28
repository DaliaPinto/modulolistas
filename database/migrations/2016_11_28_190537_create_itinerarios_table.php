<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItinerariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itinerarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hora_id');
            $table->integer('docente_id');
            $table->smallInteger('materia_id');
            $table->smallInteger('grupo_id');
            $table->integer('periodo_id');
            $table->date('fecha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itinerarios');
    }
}
