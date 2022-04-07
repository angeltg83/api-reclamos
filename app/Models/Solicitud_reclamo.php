<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud_reclamo extends Model
{
    use HasFactory;

    public function deudor()
    {
        return $this->belongsTo(Persona::class);
    }

    public function tipo_solicitud()
    {
        return $this->belongsTo(Tipo_solicitud::class);
    }

    public function origen()
    {
        return $this->belongsTo(Origen::class);
    }

    public function tipo_motivo()
    {
        return $this->belongsTo(Tipo_motivo::class);
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function entidad_bancaria()
    {
        return $this->belongsTo(Entidad_bancaria::class);
    }
}
