<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_solicituds', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            
            $table->unsignedBigInteger("usuario_creacion_id");
            $table->foreign('usuario_creacion_id')->references('id')->on('usuarios');
            $table->unsignedBigInteger("usuario_modificacion_id")->nullable();
            $table->foreign('usuario_modificacion_id')->references('id')->on('usuarios');
            $table->boolean('estado_registro')->default(true);
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_solicituds');
    }
}
