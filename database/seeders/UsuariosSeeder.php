<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['username' => 'angel.tigua', 'email' => 'admin@hotmail.com', 'password' => 'asd', 'password_temp' => 'asd', 'estado_registro' => true],
        ];

        DB::table('usuarios')->insert($data);
    }
}
