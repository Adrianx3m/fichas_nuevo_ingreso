<?php

namespace App\Http\Controllers;

use App\Models\comprobantes;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ComprobantesController extends Controller
{
    public function index(){
        //localhost:8000/aspirantes => get => retorna toda la tabla
        return comprobantes::get();
    }

    public function store(Request $request){
            //Guardar datos
            //localhost:8000/domicilio => post => solo almacena nuevo registro
            $encs = new comprobantes;
            //$encs->create($request->all());
            if($request->hasFile("urlpdf")){
                $file=$request->file("urlpdf");
                $nombre = "comprobante-pago_".\Illuminate\Support\Facades\Auth::user()->id.".".$file->guessExtension();
                $ruta = public_path("pdf/".$nombre);
                if($file->guessExtension()=="pdf"){
                    copy($file, $ruta);
                    $encs->comprobante_pago=$nombre;
                    $encs->verificado="Por Verificar";
                    $encs->id_user=\Illuminate\Support\Facades\Auth::user()->id;
                    $fecha_hoy = date('Y-m-d H:i:s');
                    $encs->created_at=$fecha_hoy;
                    $encs->updated_at=$fecha_hoy;
                    $encs->save();
                }else{
                    dd("Formato incorrecto");
                }
            }
            return redirect('/solicitud')->with('status',"Ficha Cargada en Verificación");
    }
    
    public function show($comprobante){
        // mostrar con id recibida
        $enc = comprobantes::where('id_user',$comprobante)->get();
        return $enc;
    }
    public function update(Request $request,$program){
        //actualizar info
       
        $ticket = comprobantes::find($program);
        if($request->hasFile("urlpdf")){
            $file=$request->file("urlpdf");
            $nombre = "comprobante-pago_".\Illuminate\Support\Facades\Auth::user()->id.".".$file->guessExtension();
            $ruta = public_path("pdf/".$nombre);
            if($file->guessExtension()=="pdf"){
                copy($file, $ruta);
            $ticket->verificado = "Por Verificar";
            $ticket->update();
                
            }else{
                dd("Formato incorrecto");
            }



        }
        
        return redirect("/solicitud");
    }

    public function updateStatusTicket(Request $request,$program){
        $recibos = comprobantes::find($program);
        $recibos->verificado = $request->verificado;
        $recibos->id_user = $request->id_user;
        $recibos->update();
        return $recibos;
    }

    public function correccion(){
       $query = "SELECT id FROM comprobantes WHERE id_user = ".\Illuminate\Support\Facades\Auth::user()->id; 
        $consulta = DB::select($query);

        $comprobante = "";
       
        $existComprovant = "";
        
        if(json_encode($consulta)=="[]"){
            $existComprovant = "no";
            $comprobante = '[{"id":0}]';
        }else{
            $existComprovant = "si";
          $comprobante = $consulta;
        }
        return view('comprobante',['comprovante'=>$existComprovant,'idEnc'=>json_encode($comprobante)]);
    }
}
