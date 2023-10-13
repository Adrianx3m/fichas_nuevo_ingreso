<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class solicitudes extends Model
{
    use HasFactory;
    protected $fillable = [
        'primera_opcion',
        'segunda_opcion',
        'fecha_examen',
        'sede',
        'id_user'
    ];

}
