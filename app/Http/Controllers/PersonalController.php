<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\personales;
use Illuminate\Support\Facades\DB;

class PersonalController extends Controller
{
    public function index(){
        //localhost:8000/personales => get => retorna toda la tabla
        $usuarios = personales::orderBy('created_at','DESC')->get();
        return $usuarios;
    }

    public function store(Request $request){
            //Guardar datos
            //localhost:8000/personales => post => solo almacena nuevo registro
            $encs = new personales;
            $encs->create($request->all());

            return $encs;
    }
    public function show($personales){
        // mostrar con id recibida
        $enc = personales::where('id_user',$personales)->get();
        return $enc;
    }
    public function update(Request $request,$program){
        //actualizar info
        $perso = personales::find($program);
        $perso->nombre = $request->nombre;
        $perso->a_paterno = $request->a_paterno;
        $perso->a_materno = $request->a_materno;
        $perso->curp=$request->curp;
        $perso->fecha_nac = $request->fecha_nac;
        $perso->sexo = $request->sexo;
        $perso->estado = $request->estado;
        $perso->municipio = $request->municipio;
        $perso->estado_civil = $request->estado_civil;
        $perso->nacionalidad = $request->nacionalidad;
        $perso->tipo_sangre = $request->tipo_sangre;
        $perso->se_entero_por=$request->se_entero_por;
        $perso->id_user = $request->id_user;
        $perso->update();
        return $perso;
    }
}
