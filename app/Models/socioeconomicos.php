<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class socioeconomicos extends Model
{
    use HasFactory;
    protected $fillable = [
        'estudios_padre',
        'estudios_madre',
        'vive_con',
        'ocupacion_padre',
        'ocupacion_madre',
        'depende',
        'ingreso_mensual',
        'casa',
        'cuartos',
        'num_habitantes',
        'num_dependen',
        'tiene_beca',
        'beca_otorgo',
        'contacto_emergencia',
        'calle_contacto_emergencia',
        'colonia',
        'codigo_postal',
        'municipio',
        'estado',
        'telefono_emergencia',
        'lugar_trabajo',
        'telefono_trabajo',
        'capacidad_diferente',
        'cual_capacidad',
        'bienestar',
        'id_user'
    ];

}
