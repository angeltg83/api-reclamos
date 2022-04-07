<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotivosSeeder extends Seeder
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
                'descripcion' => 'Incomformidad por saldo',
                'usuario_creacion_id' => 1,
                'estado_registro' => true
            ],
            [
                'descripcion' => 'Trato otorgado',
                'usuario_creacion_id' => 1,
                'estado_registro' => true
            ],

            [
                'descripcion' => 'Notificación recibida',
                'usuario_creacion_id' => 1,
                'estado_registro' => true
            ]



        ];
        DB::table('tipo_motivos')->insert($data);
    }
}
