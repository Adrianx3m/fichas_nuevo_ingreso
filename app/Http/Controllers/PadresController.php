<?php

namespace App\Http\Controllers;

use App\Models\padres;
use Illuminate\Http\Request;

class PadresController extends Controller
{
    public function index(){
        //localhost:8000/personales => get => retorna toda la tabla
        return padres::get();
    }

    public function store(Request $request){
            //Guardar datos
            //localhost:8000/personales => post => solo almacena nuevo registro
            $pat = new padres;
            $pat->create($request->all());

            return $pat;
    }
    public function show($personales){
        // mostrar con id recibida
        $pat = padres::where('id_user',$personales)->get();
        return $pat;
    }
    public function update(Request $request,$program){
        //actualizar info
        $pat = padres::find($program);
        $pat->apellido_paterno_padre = $request->apellido_paterno_padre;
        $pat->apellido_materno_padre = $request->apellido_materno_padre;
        $pat->nombre_padre = $request->nombre_padre;
        $pat->vivo_padre=$request->vivo_padre;
        $pat->apellido_paterno_madre = $request->apellido_paterno_madre;
        $pat->apellido_materno_madre = $request->apellido_materno_madre;
        $pat->nombre_madre = $request->nombre_madre;
        $pat->vivo_madre = $request->vivo_madre;
        $pat->id_user = $request->id_user;
        $pat->update();
        return $pat;
    }
}
