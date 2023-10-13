<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datos_escolares extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_escuela',
        'clave_escuela',
        'estado_procedencia',
        'municipio_procedencia',
        'fecha_ingreso',
        'fecha_egreso',
        'promedio',
        'id_user'
    ];

}
