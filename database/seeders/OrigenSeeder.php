<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrigenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [['descripcion' => 'WEB', 'usuario_creacion_id' => 1, 'estado_registro' => true], ['descripcion' => 'APP', 'usuario_creacion_id' => 1, 'estado_registro' => true]];
        DB::table('origens')->insert($data);
    }
}
