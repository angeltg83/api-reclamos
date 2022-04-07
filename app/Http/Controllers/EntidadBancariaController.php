<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entidad_bancaria;

class EntidadBancariaController extends Controller
{
    public function index()
    {
        $bancos = Entidad_bancaria::select('id', 'descripcion')->where('estado_registro', '=', true)->get()->toJson(JSON_PRETTY_PRINT);
        return response($bancos, 200);
    }

    public function show($id)
    {
        if (Entidad_bancaria::where('id', $id)->exists()) {
            $banco = Entidad_bancaria::find($id)->toJson(JSON_PRETTY_PRINT);
            return response($banco, 200);
        } else {
            return response()->json([
                "message" => "Entidad bancaria no encontrada"
            ], 404);
        }
    }
}
