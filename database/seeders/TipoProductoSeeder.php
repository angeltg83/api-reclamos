<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoProductoSeeder extends Seeder
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
            [
                'descripcion' => 'Tarjeta de crédito',
                'usuario_creacion_id' => 1,
                'estado_registro' => true
            ],
            [
                'descripcion' => 'Crédito de consumo',
                'usuario_creacion_id' => 1,
                'estado_registro' => true
            ],
            [
                'descripcion' => 'Crédito educativo',
                'usuario_creacion_id' => 1,
                'estado_registro' => true
            ],

        ];
        DB::table('tipo_productos')->insert($data);
    }
}
