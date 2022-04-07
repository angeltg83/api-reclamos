<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoIdentificacionSeeder extends Seeder
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
                'descripcion' => 'Cédula',
                'usuario_creacion_id' => 1
            ],
            [
                'descripcion' => 'Ruc',
                'usuario_creacion_id' => 1
            ]
        ];
        DB::table('tipo_identificacions')->insert($data);
    }
}
