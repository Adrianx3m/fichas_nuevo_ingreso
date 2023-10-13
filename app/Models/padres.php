<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class padres extends Model
{
    use HasFactory;
    protected $fillable = [
        'apellido_paterno_padre',
        'apellido_materno_padre',
        'nombre_padre',
        'vivo_padre',
        'apellido_paterno_madre',
        'apellido_materno_madre',
        'nombre_madre',
        'vivo_madre',
        'id_user'
    ];

}
