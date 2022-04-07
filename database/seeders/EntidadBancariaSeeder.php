<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntidadBancariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        //
        $data = [
            ['descripcion' => "BANCO DEL PACIFICO", 'usuario_creacion_id' => 1, 'estado_registro' => true],
            ['descripcion' => "BANCO BOLIVARIANO", 'usuario_creacion_id' => 1, 'estado_registro' => true],
            ['descripcion' => "DINERS", 'usuario_creacion_id' => 1, 'estado_registro' => true],
            ['descripcion' => "BANCO GUAYAQUIL", 'usuario_creacion_id' => 1, 'estado_registro' => true],
            ['descripcion' => "CRÉDITOS ECONÓMICOS", 'usuario_creacion_id' => 1, 'estado_registro' => true],
        ];
        DB::table('entidad_bancarias')->insert($data);
    }
}
