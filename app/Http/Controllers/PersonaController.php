<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Tipo_identificacion;
use App\Models\Tipo_persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    //
    public function getPais()
    {
        $paises = Pais::select('id', 'descripcion')->where('estado_registro', '=', true)->get()->toJson(JSON_PRETTY_PRINT);
        return response($paises, 200);
    }

    public function getTipoPersona()
    {
        $personas = Tipo_persona::select('id', 'descripcion')->where('estado_registro', '=', true)->get()->toJson(JSON_PRETTY_PRINT);
        return response($personas, 200);
    }

    public function getTipoPersonaID($id)
    {
        if (Tipo_persona::where('id', $id)->exists()) {
            $persona = Tipo_persona::find($id)->toJson(JSON_PRETTY_PRINT);
            return response($persona, 200);
        } else {
            return response()->json([
                "message" => "Tipo persona no encontrada"
            ], 404);
        }
    }


    public function getTipoIdentificacion()
    {
        $tipo_identificacion = Tipo_identificacion::select('id', 'descripcion')->where('estado_registro', '=', true)->get()->toJson(JSON_PRETTY_PRINT);
        return response($tipo_identificacion, 200);
    }

    public function getTipoIdentificacionID($id)
    {
        if (Tipo_identificacion::where('id', $id)->exists()) {
            $tipo_identificacion = Tipo_identificacion::find($id)->toJson(JSON_PRETTY_PRINT);
            return response($tipo_identificacion, 200);
        } else {
            return response()->json([
                "message" => "Tipo identificación no encontrada"
            ], 404);
        }
    }
}
