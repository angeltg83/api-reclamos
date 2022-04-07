<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCiudadToSolicitudReclamos extends Migration
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
            $table->string("ciudad", 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solicitud_reclamos', function (Blueprint $table) {
            //
            $table->dropColumn("ciudad");
        });
    }
}
