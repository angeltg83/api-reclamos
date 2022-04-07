<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoPersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [['descripcion' => 'Natural', 'usuario_creacion_id' => 1], ['descripcion' => 'Jurídica', 'usuario_creacion_id' => 1]];
        DB::table('tipo_personas')->insert($data);
    }
}
