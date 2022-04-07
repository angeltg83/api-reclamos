<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoSolicitudesSeeders extends Seeder
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
                'descripcion' => 'Petición',
                'usuario_creacion_id' => 1
            ],
            [
                'descripcion' => 'Queja',
                'usuario_creacion_id' => 1
            ],
            [
                'descripcion' => 'Reclamo',
                'usuario_creacion_id' => 1
            ],
            [
                'descripcion' => 'Sugerencia',
                'usuario_creacion_id' => 1
            ],
        ];
        DB::table('tipo_solicituds')->insert($data);
    }
}
