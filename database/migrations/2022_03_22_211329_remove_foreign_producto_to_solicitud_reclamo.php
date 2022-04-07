<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveForeignProductoToSolicitudReclamo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitud_reclamos', function (Blueprint $table) {
            //
            $table->dropForeign('solicitud_reclamos_producto_id_foreign');
            $table->dropColumn('producto_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solicitud_reclamo', function (Blueprint $table) {
            //
        });
    }
}
