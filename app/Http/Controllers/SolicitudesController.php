<?php

namespace App\Http\Controllers;

use App\Models\solicitudes;
use Illuminate\Http\Request;

class SolicitudesController extends Controller
{
    public function index(){
        //localhost:8000/personales => get => retorna toda la tabla
        return solicitudes::get();
    }

    public function store(Request $request){
            //Guardar datos
            //localhost:8000/personales => post => solo almacena nuevo registro
            $pat = new solicitudes;
            $pat->create($request->all());

            return $pat;
    }
    public function show($personales){
        // mostrar con id recibida
        $pat = solicitudes::where('id_user',$personales)->get();
        return $pat;
    }
    public function update(Request $request,$program){
        //actualizar info
        $pat = solicitudes::find($program);
        $pat->primera_opcion = $request->primera_opcion;
        $pat->segunda_opcion = $request->segunda_opcion;
        $pat->fecha_examen = $request->fecha_examen;
        $pat->sede = $request->sede;
        $pat->id_user = $request->id_user;
        $pat->update();
        return $pat;
    }
}
