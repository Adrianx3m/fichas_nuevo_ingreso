<?php

namespace App\Http\Controllers;

use App\Models\socioeconomicos;
use Illuminate\Http\Request;

class SocioeconomicosController extends Controller
{
    public function index(){
        //localhost:8000/personales => get => retorna toda la tabla
        return socioeconomicos::get();
    }

    public function store(Request $request){
            //Guardar datos
            //localhost:8000/personales => post => solo almacena nuevo registro
            $pat = new socioeconomicos;
            $pat->create($request->all());

            return $pat;
    }
    public function show($personales){
        // mostrar con id recibida
        $pat = socioeconomicos::where('id_user',$personales)->get();
        return $pat;
    }
    public function update(Request $request,$program){
        //actualizar info
        $pat = socioeconomicos::find($program);
        $pat->estudios_padre = $request->estudios_padre; 
        $pat->estudios_madre = $request->estudios_madre;
        $pat-> vive_con = $request-> vive_con;
        $pat->ocupacion_padre = $request->ocupacion_padre; 
        $pat->ocupacion_madre = $request->ocupacion_madre;
        $pat->depende = $request->depende; 
        $pat->ingreso_mensual = $request->ingreso_mensual;
        $pat->casa = $request->casa;
        $pat->cuartos = $request->cuartos;
        $pat->num_habitantes = $request->num_habitantes;
        $pat->num_dependen = $request->num_dependen;
        $pat->tiene_beca = $request->tiene_beca;
        $pat->beca_otorgo = $request->beca_otorgo;
        $pat->contacto_emergencia = $request->contacto_emergencia;
        $pat->calle_contacto_emergencia = $request->calle_contacto_emergencia;
        $pat->colonia = $request->colonia;
        $pat->codigo_postal = $request->codigo_postal;
        $pat->municipio = $request->municipio;
        $pat->estado = $request->estado;
        $pat->telefono_emergencia = $request->telefono_emergencia;
        $pat->lugar_trabajo = $request->lugar_trabajo;
        $pat->telefono_trabajo = $request->telefono_trabajo;
        $pat->capacidad_diferente = $request->capacidad_diferente;
        $pat->cual_capacidad = $request->cual_capacidad;
        $pat->bienestar = $request->bienestar;
        $pat->update();
        return $pat;
    }
}
