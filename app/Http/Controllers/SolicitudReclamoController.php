<?php

namespace App\Http\Controllers;

use App\Models\Entidad_bancaria;
use Illuminate\Http\Request;
use App\Models\Solicitud_reclamo;
use App\Models\Tipo_motivo;
use App\Models\Origen;
use App\Models\Estado;
use App\Models\Pais;
use App\Models\Persona;
use App\Models\Tipo_persona;
use App\Models\Tipo_producto;
use App\Models\Tipo_solicitud;
use Exception;
use Illuminate\Support\Carbon;
use stdClass;

class SolicitudReclamoController extends Controller
{
    //
    public function index()
    {
        $solicitudes = Solicitud_reclamo::get()->toJson(JSON_PRETTY_PRINT);
        return response($solicitudes, 200);
    }

    //Tipo motivo
    public function getMotivo()
    {
        $motivos = Tipo_motivo::select('id', 'descripcion')->where('estado_registro', '=', true)->get()->toJson(JSON_PRETTY_PRINT);
        return response($motivos, 200);
    }

    public function getOrigenes()
    {
        $origenes = Origen::select('id', 'descripcion')->where('estado_registro', '=', true)->get()->toJson(JSON_PRETTY_PRINT);
        return response($origenes, 200);
    }

    public function getMotivoID($id)
    {
        if (Tipo_motivo::where('id', $id)->exists()) {
            $motivo = Tipo_motivo::find($id)->toJson();
            return response($motivo, 200);
        } else {
            return response()->json([
                "message" => "Motivo no encontrada"
            ], 404);
        }
    }

    public function getOrigenID($id)
    {
        if (Origen::where('id', $id)->exists()) {
            $origen = Origen::find($id)->toJson(JSON_PRETTY_PRINT);
            return response($origen, 200);
        } else {
            return response()->json([
                "message" => "Origen no encontrada"
            ], 404);
        }
    }

    public function getTiposSolicitudes()
    {
        $tipos_solicitud = Tipo_solicitud::select('id', 'descripcion')->where('estado_registro', '=', true)->get()->toJson(JSON_PRETTY_PRINT);
        return response($tipos_solicitud, 200);
    }
    public function getEstados()
    {
        $estados = Estado::select('id', 'descripcion')->where('estado_registro', '=', true)->get()->toJson(JSON_PRETTY_PRINT);
        return response($estados, 200);
    }

    /**
     * @author Angel Tigua 
     * Funcionalidad que inserta un nuevo registro en la tabla solicitudes_reclamo
     * @since 2022.03.18
     */
    public function store(Request $request)
    {
        // first one - insert a person

        try {
            print_r($request->all());
            $email = $request->email;
            $telefono = $request->telefono;
            $celular = $request->celular;
            $direccion = $request->direccion;

            $tipo_identificacion_id = $request->tipo_identificacion_id;
            $tipo_persona_id = $request->tipo_persona_id;
            $identificacion = $request->identificacion;
            $usuario_creacion_id = $request->usuario_creacion_id;
            $fecha_actual = Carbon::now();

            $deudor_id = Persona::select('id')->where('identificacion', '=', $identificacion)->get();

            if ($deudor_id->count() === 1) {
                $deudor_id = $deudor_id[0]['id'];
            } else {
                $data_insert = [
                    "email" => $email,
                    "telefono" => $telefono,
                    "celular" => $celular,
                    "direccion" => $direccion,
                    "tipo_identificacion_id" => $tipo_identificacion_id,
                    "tipo_persona_id" => $tipo_persona_id,
                    "identificacion" => $identificacion,
                    "usuario_creacion_id" => $usuario_creacion_id,
                    "estado_registro" => true,
                    "created_at" => $fecha_actual
                ];

                if ($request->tipo_persona_id === 1) {
                    //Natural
                    $nombres = $request->nombres;
                    $apellido_paterno = $request->apellido_paterno;
                    $apellido_materno = $request->apellido_materno;

                    $data_insert = array_merge($data_insert, [
                        "nombres" => $nombres,
                        "apellido_paterno" => $apellido_paterno,
                        "apellido_materno" => $apellido_materno,
                    ]);
                } else {
                    //Juridica
                    $razon_social = $request->razon_social;
                    $representante_legal = $request->representante_legal;

                    $data_insert = array_merge($data_insert, [
                        "razon_social" => $razon_social,
                        "representante_legal" => $representante_legal,
                    ]);
                }

                $deudor_id = Persona::insertGetId($data_insert);
            }

            $numer_reclamo = Solicitud_reclamo::count() + 1;

            $insert_reclamo = [
                'numero_reclamo' => $numer_reclamo,
                'observacion' => $request->observacion,
                'peticion_concreta' => $request->peticion_concreta,
                'deudor_id' => $deudor_id,
                'tipo_solicitud_id' => $request->tipo_solicitud_id,
                'tipo_motivo_id' => $request->tipo_motivo_id,
                'origen_id' => $request->origen_id,
                'estado_id' => 1, //primer estado
                'producto_id' => $request->producto_id,
                'tipo_productos_id' => $request->tipo_productos_id,
                'entidad_bancaria_id' => $request->entidad_bancaria_id,
                'pais_id' => $request->pais_id,
                'usuario_creacion_id' => $request->usuario_creacion_id,
                'estado_registro' => true,
                "created_at" => $fecha_actual,

                'usuario_ingreso_id' => $request->usuario_ingreso_id,
                'fecha_ingreso' => $fecha_actual,
            ];
            $nueva_solicitud = Solicitud_reclamo::insertGetId($insert_reclamo);

            //send correo....


            return response()->json([
                "message" => "Se ha creado el registro exitosamente ${numer_reclamo}", "id" => $numer_reclamo
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Algo no funciona bien!"
            ], 500);
        }
    }

    /**
     * @author Angel Tigua
     * Funcionalidad que se conecta con el front(landing page Estudio). luego valida y envia correo.
     */
    public function sendmailSolicitud(Request $request)
    {
        try {
            $email = $request->email;
            $telefono = $request->telefono;
            $celular = $request->celular;
            $direccion = $request->direccion;
            $identificacion = $request->identificacion;
            $tipo_persona_descrip = Tipo_persona::select('descripcion')->where('id', '=', $request->tipo_persona_id)->get();
            $tipo_persona_descrip = $tipo_persona_descrip[0]['descripcion'];

            $data_insert = [
                "email" => $email,
                "telefono" => $telefono,
                "celular" => $celular,
                "direccion" => $direccion,
                "tipo_persona" => $tipo_persona_descrip,
                "identificacion" => $identificacion,
            ];

            if ($request->tipo_persona_id === 1) {
                //Natural
                $nombres = $request->nombres;
                $apellido_paterno = $request->apellido_paterno;
                $apellido_materno = $request->apellido_materno;

                $data_insert = array_merge($data_insert, [
                    "nombres" => $nombres,
                    "apellido_paterno" => $apellido_paterno,
                    "apellido_materno" => $apellido_materno,
                ]);
            } else {
                //Juridica
                $razon_social = $request->razon_social;
                $representante_legal = $request->representante_legal;

                $data_insert = array_merge($data_insert, [
                    "razon_social" => $razon_social,
                    "representante_legal" => $representante_legal,
                ]);
            }

            $motivo_descripcion = Tipo_motivo::select('descripcion')->where('id', '=', $request->tipo_motivo_id)->get();
            $motivo_descripcion = $motivo_descripcion[0]['descripcion'];

            $tipo_prod_descripcion = Tipo_producto::select('descripcion')->where('id', '=', $request->tipo_productos_id)->get();
            $tipo_prod_descripcion = $tipo_prod_descripcion[0]['descripcion'];

            $entidad_bancaria_descrip = Entidad_bancaria::select('descripcion')->where('id', '=', $request->entidad_bancaria_id)->get();
            $entidad_bancaria_descrip = $entidad_bancaria_descrip[0]['descripcion'];

            $pais_descripcion = Pais::select('descripcion')->where('id', '=', $request->pais_id)->get();
            $pais_descripcion = $pais_descripcion[0]['descripcion'];

            $tipo_solicitud_desc = Tipo_solicitud::select('descripcion')->where('id', '=', $request->tipo_solicitud_id)->get();
            $tipo_solicitud_desc = $tipo_solicitud_desc[0]['descripcion'];


            $insert_reclamo = [
                'observacion' => $request->observacion,
                'peticion_concreta' => $request->peticion_concreta,
                'tipo_solicitud' => $tipo_solicitud_desc,
                'motivo' => $motivo_descripcion,
                'tipo_producto' => $tipo_prod_descripcion,
                'entidad_bancaria' => $entidad_bancaria_descrip,
                'pais' => $pais_descripcion,
                'ciudad' => $request->ciudad,
            ];

            $insert_reclamo = array_merge($data_insert, $insert_reclamo);
            // send mail
            $info = new stdClass();
            $info->email = 'atigua@romerodyasociados.com';
            $info->nombre = 'Angel Tigua Z.';
            $info->filename = "Solicitud_reclamo_${identificacion}";
            $info->data = $insert_reclamo;
            App('App\Http\Controllers\SendMailController')->send("Solicitud de reclamo ${identificacion}", $info);
            return response()->json([
                "message" => "Solicitud de reclamo ${identificacion}",
                "error" => false,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Algo no funciona bien!",
                "error" => true,
            ], 500);
        }
    }
}
