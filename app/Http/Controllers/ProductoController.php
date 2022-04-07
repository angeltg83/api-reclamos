<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Tipo_producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //Producto
    public function index()
    {
        $productos = Producto::select('id', 'descripcion')->where('estado_registro', '=', true)->get()->toJson(JSON_PRETTY_PRINT);
        return response($productos, 200);
    }

    //Tipo producto
    public function getTipoProducto()
    {
        $bancos = Tipo_producto::select('id', 'descripcion')->where('estado_registro', '=', true)->get()->toJson(JSON_PRETTY_PRINT);
        return response($bancos, 200);
    }

    public function getProductoID($tipo_producto, $entidad_bancaria)
    {
        if (Producto::where('tipo_producto_id', $tipo_producto)->exists()) {
            $tipo_prod = Producto::select('id', 'descripcion')->where(['estado_registro' => true, 'tipo_producto_id' => $tipo_producto, 'entidad_bancaria_id' => $entidad_bancaria])->get();
            return response($tipo_prod, 200);
        } else {
            return response()->json([
                "message" => "Tipo producto no encontrada"
            ], 404);
        }
    }
}
