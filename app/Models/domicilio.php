<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class domicilio extends Model
{
    use HasFactory;
    protected $fillable = [
        'calle_nombre',
        'num_exterior',
        'num_interior',
        'codigo_postal',
        'estado',
        'municipio',
        'localidad',
        'telefono',
        'correo',
        'id_user'
    ];

}
