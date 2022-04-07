<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
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
                'descripcion' => "BCO. BOLIVARIANO",
                'tipo_producto_id' => 1,
                'entidad_bancaria_id' => 2,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ],     [
                'descripcion' => 'BCO. GUAYAQUIL ADMINISTRATIVA',
                'tipo_producto_id' => 1,
                'entidad_bancaria_id' => 4,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ],
            [
                'descripcion' => 'BCO. GYE. CAST. ASIGNADA',
                'tipo_producto_id' => 1,
                'entidad_bancaria_id' => 4,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ],
            [
                'descripcion' => 'BCO. GUAYAQUIL POR CASTIGAR',
                'tipo_producto_id' => 1,
                'entidad_bancaria_id' => 4,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ],
            [
                'descripcion' => 'BCO. GYE. VT. ASIGNADA',
                'tipo_producto_id' => 1,
                'entidad_bancaria_id' => 4,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ],
            [
                'descripcion' => 'BCO. GYE. CAST. COMPRADA',
                'tipo_producto_id' => 1,
                'entidad_bancaria_id' => 4,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ],
            [
                'descripcion' => 'BCO. GYE. VT. COMPRADA',
                'tipo_producto_id' => 1,
                'entidad_bancaria_id' => 4,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ],
            [
                'descripcion' => 'BCO. GYE. TC-UDR',
                'tipo_producto_id' => 1,
                'entidad_bancaria_id' => 4,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ],
            [
                'descripcion' => 'BCO. GYE. TC-VENCIDA',
                'tipo_producto_id' => 1,
                'entidad_bancaria_id' => 4,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ],
            [
                'descripcion' => 'VISA BCO. DEL PACIFICO',
                'tipo_producto_id' => 1,
                'entidad_bancaria_id' => 8,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ],
            [
                'descripcion' => 'CUENTAS VARIAS',
                'tipo_producto_id' => 3,
                'entidad_bancaria_id' => 9,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ],
            [
                'descripcion' => 'TOPODEPOT S.A',
                'tipo_producto_id' => 1,
                'entidad_bancaria_id' => 9,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ],
            [
                'descripcion' => 'MASTERCARD',
                'tipo_producto_id' => 1,
                'entidad_bancaria_id' => 16,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ], [
                'descripcion' => 'CASA GRANDE',
                'tipo_producto_id' => 8,
                'entidad_bancaria_id' => 19,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ], [
                'descripcion' => 'VISA BCO. DE MACHALA',
                'tipo_producto_id' => 1,
                'entidad_bancaria_id' => 27,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ], [
                'descripcion' => 'DINERS CLUB S.A',
                'tipo_producto_id' => 1,
                'entidad_bancaria_id' => 29,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ], [
                'descripcion' => 'COMPAÑIA ELECTROFACIL SA.',
                'tipo_producto_id' => 3,
                'entidad_bancaria_id' => 30,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ], [
                'descripcion' => 'PRODUCTO - LICITACION',
                'tipo_producto_id' => 3,
                'entidad_bancaria_id' => 31,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ], [
                'descripcion' => 'ROMERO DISTRIBUIDORA',
                'tipo_producto_id' => 3,
                'entidad_bancaria_id' => 32,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ], [
                'descripcion' => 'FIRESA',
                'tipo_producto_id' => 3,
                'entidad_bancaria_id' => 33,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ], [
                'descripcion' => 'CONSTRUMERCADO - HOLCIM',
                'tipo_producto_id' => 3,
                'entidad_bancaria_id' => 34,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ], [
                'descripcion' => 'HOLCIM',
                'tipo_producto_id' => 3,
                'entidad_bancaria_id' => 35,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ], [
                'descripcion' => 'BANCO AMAZONAS',
                'tipo_producto_id' => 3,
                'entidad_bancaria_id' => 36,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ], [
                'descripcion' => 'CREDITOS ECONOMICOS',
                'tipo_producto_id' => 3,
                'entidad_bancaria_id' => 37,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ], [
                'descripcion' => 'FILTROCORP',
                'tipo_producto_id' => 1,
                'entidad_bancaria_id' => 38,
                'usuario_creacion_id' => 1,
                'estado_registro' => true,
            ]

        ];
        DB::table('productos')->insert($data);
    }
}
