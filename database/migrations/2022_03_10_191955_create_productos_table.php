<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            
            $table->unsignedBigInteger("tipo_producto_id");
            $table->foreign('tipo_producto_id')->references('id')->on('tipo_productos');

            $table->unsignedBigInteger("entidad_bancaria_id");
            $table->foreign('entidad_bancaria_id')->references('id')->on('entidad_bancarias');

            $table->unsignedBigInteger("usuario_creacion_id");
            $table->foreign('usuario_creacion_id')->references('id')->on('usuarios');

            $table->unsignedBigInteger("usuario_modificacion_id")->nullable();
            $table->foreign('usuario_modificacion_id')->references('id')->on('usuarios');
            $table->boolean('estado_registro')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
