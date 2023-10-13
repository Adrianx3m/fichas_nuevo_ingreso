<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personales extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'a_paterno',
        'a_materno',
        'sexo',
        'fecha_nac',
        'nacionalidad',
        'estado',
        'municipio',
        'curp',
        'estado_civil',
        'tipo_sangre',
        'se_entero_por',
        'id_user'
    ];

}
