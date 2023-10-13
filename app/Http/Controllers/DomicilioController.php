<?php

namespace App\Http\Controllers;

use App\Models\domicilio;
use Illuminate\Http\Request;

class DomicilioController extends Controller
{
    public function index(){
        //localhost:8000/domicilio => get => retorna toda la tabla
        return domicilio::get();
    }

    public function store(Request $request){
            //Guardar datos
            //localhost:8000/domicilio => post => solo almacena nuevo registro
            $encs = new domicilio;
            $encs->create($request->all());

            return $encs;
    }
    public function show($domicilio){
        // mostrar con id recibida
        $enc = domicilio::where('id_user',$domicilio)->get();
        return $enc;
    }
    public function update(Request $request,$program){
        //actualizar info
        $dom = domicilio::find($program);
        $dom->calle_nombre = $request->calle_nombre;
        $dom->num_exterior = $request->num_interior;
        $dom->num_interior = $request->num_interior;
        $dom->codigo_postal = $request->codigo_postal;
        $dom->estado = $request->estado;
        $dom->municipio = $request->municipio;
        $dom->localidad = $request->localidad;
        $dom->telefono = $request->telefono;
        $dom->correo = $request->correo;
        $dom->id_user = $request->id_user;
        $dom->update();
        return $dom;
    }
}
