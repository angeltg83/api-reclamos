<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('nombres');
            
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('telefono');
            $table->string('celular');
            $table->string('direccion');
            
            
            $table->unsignedBigInteger("tipo_identificacion_id");
            $table->foreign("tipo_identificacion_id")->references('id')->on('tipo_identificacions');

            $table->unsignedBigInteger("tipo_persona_id");
            $table->foreign("tipo_persona_id")->references('id')->on('tipo_personas');
            

            $table->string('identificacion')->unique();
            $table->string('razon_social');
            $table->string('representante_legal');

            //Campos auditoria
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
        Schema::dropIfExists('personas');
    }
}
