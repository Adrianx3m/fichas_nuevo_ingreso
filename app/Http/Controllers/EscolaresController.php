<?php

namespace App\Http\Controllers;

use App\Models\datos_escolares;
use Illuminate\Http\Request;

class EscolaresController extends Controller
{
    public function index(){
        //localhost:8000/personales => get => retorna toda la tabla
        return datos_escolares::get();
    }

    public function store(Request $request){
            //Guardar datos
            //localhost:8000/personales => post => solo almacena nuevo registro
            $encs = new datos_escolares;
            $encs->create($request->all());

            return $encs;
    }
    public function show($personales){
        // mostrar con id recibida
        $enc = datos_escolares::where('id_user',$personales)->get();
        return $enc;
    }
    public function update(Request $request,$program){
        //actualizar info
        $perso = datos_escolares::find($program);
        $perso->nombre_escuela = $request->nombre_escuela;
        $perso->clave_escuela = $request->clave_escuela;
        $perso->estado_procedencia = $request->estado_procedencia;
        $perso->municipio_procedencia=$request->municipio_procedencia;
        $perso->fecha_ingreso = $request->fecha_ingreso;
        $perso->fecha_egreso = $request->fecha_egreso;
        $perso->promedio = $request->promedio;
        $perso->id_user = $request->id_user;
        $perso->update();
        return $perso;
    }
}
