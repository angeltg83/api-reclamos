<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposNullableTipoPersonaNaturalToPersonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /***
         * rason_social,
         * representante_legal
         */
        Schema::table('personas', function (Blueprint $table) {
            $table->string('razon_social')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personas', function (Blueprint $table) {
           // $table->dropColumn(['razon_social']);
        });
    }
}
