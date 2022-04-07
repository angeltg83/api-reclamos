<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'descripcion' => 'Ecuador',
                'usuario_creacion_id' => 1,
                'estado_registro' => true
            ],
            [
                'descripcion' => 'Perú',
                'usuario_creacion_id' => 1,
                'estado_registro' => true
            ],

        ];
        DB::table('pais')->insert($data);
    }
}
