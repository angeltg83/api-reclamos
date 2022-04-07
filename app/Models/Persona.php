<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    public function solicitudes()
    {
        return $this->hasMany(Solicitud_reclamo::class,'deudor_id');
    }

    public function tipo_identificacion()
    {
        return $this->belongsTo(Tipo_identificacion::class);
    }
}
