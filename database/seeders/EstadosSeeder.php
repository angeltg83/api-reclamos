<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
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
                'descripcion' => 'ABIERTO',
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
                'created_at' => Carbon::now()
            ],
            [
                'descripcion' => 'SEGUIMIENTO',
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
                'created_at' => Carbon::now()
            ],
            [
                'descripcion' => 'FINALIZADO',
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
                'created_at' => Carbon::now()
            ],
        ];
        DB::table('estados')->insert($data);
    }
}
