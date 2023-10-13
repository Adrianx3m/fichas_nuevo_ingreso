<?php

namespace App\Http\Controllers;

use App\Models\fechas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FechasController extends Controller
{
    public function index(){
        //localhost:8000/domicilio => get => retorna toda la tabla
        return fechas::get();
    }

    public function store(Request $request){
            //Guardar datos
            //localhost:8000/domicilio => post => solo almacena nuevo registro
            $encs = new fechas;
            $encs->create($request->all());

            return $encs;
    }
    public function show($fechas){
        // mostrar con id recibida
        $enc = fecha_examen::where($fechas)->get();
        return $enc;
    }
    public function update(Request $request,$program){
        //actualizar info
        $dom = fechas::find($program);
        $dom->fecha = $request->fecha;
        $dom->hora = $request->hora;
        $dom->sede = $request->sede;
        $dom->update();
        return $dom;
    }
    public function eliminar($id){
        $post = fechas::find($id);
        $post->delete();   
    }
    public function getFechas(){
        $query = "SELECT *FROM fechas";
        $fechas = DB::select($query);
        return json_encode($fechas);
    }
}
