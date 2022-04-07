<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsuarioIngresoSolicitudReclamo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('solicitud_reclamos', function($table) {
            
            $table->unsignedBigInteger("usuario_ingreso_id");
            $table->foreign('usuario_ingreso_id')->references('id')->on('usuarios');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solicitud_reclamos', function($table) {
            $table->dropForeign('solicitud_reclamos_usuario_ingreso_id_foreign');
            $table->dropColumn('usuario_ingreso_id');
        });
        //
    }
}
