<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposNullableObservacionPeticionContretaToSolicitudReclamos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitud_reclamos', function (Blueprint $table) {
            $table->string('observacion')->nullable()->change();
            $table->string('peticion_concreta')->nullable()->change();
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
        });
    }
}
