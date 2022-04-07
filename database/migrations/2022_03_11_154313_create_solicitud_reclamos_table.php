<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudReclamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_reclamos', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_reclamo');
            $table->string('observacion');
            $table->string('peticion_concreta')->nullable();

            $table->unsignedBigInteger('deudor_id');
            $table->foreign('deudor_id')->references('id')->on('personas');

            $table->unsignedBigInteger('tipo_solicitud_id');
            $table->foreign('tipo_solicitud_id')->references('id')->on('tipo_solicituds');

            $table->unsignedBigInteger('tipo_motivo_id');
            $table->foreign('tipo_motivo_id')->references('id')->on('tipo_motivos');

            $table->unsignedBigInteger('origen_id');
            $table->foreign('origen_id')->references('id')->on('origens');

            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('estados');

            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');

            $table->unsignedBigInteger('tipo_productos_id');
            $table->foreign('tipo_productos_id')->references('id')->on('tipo_productos');

            $table->unsignedBigInteger('entidad_bancaria_id');
            $table->foreign('entidad_bancaria_id')->references('id')->on('entidad_bancarias');

            $table->unsignedBigInteger('pais_id');
            $table->foreign('pais_id')->references('id')->on('pais');

            // campos auditoria
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
        Schema::dropIfExists('solicitud_reclamos');
    }
}
