<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\datos_escolares;
use App\Models\domicilio;
use App\Models\padres;
use App\Models\personales;
use App\Models\socioeconomicos;
use App\Models\solicitudes;
use App\Models\comprobantes;

use Illuminate\Http\Request;

use PDF;

use App\Exports\AspirantesExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportesController extends Controller
{
    public function fichaExamen(){
        
        $dpersonales = personales::where('id_user',[\Illuminate\Support\Facades\Auth::user()->id])->get();
        $dsolicitudes = solicitudes::where('id_user',[\Illuminate\Support\Facades\Auth::user()->id])->get();
        $descolares = datos_escolares::where('id_user',[\Illuminate\Support\Facades\Auth::user()->id])->get();
        $ddomicilio = domicilio::where('id_user',[\Illuminate\Support\Facades\Auth::user()->id])->get();
        $dpago = comprobantes::where('id_user',[\Illuminate\Support\Facades\Auth::user()->id])->get();
        if(json_encode($dsolicitudes) == '[]' || json_encode($dpersonales) == '[]' || json_encode($descolares) == '[]' || json_encode($ddomicilio) == '[]' || json_encode($dpago) == '[]'){
           return redirect('/solicitud')->with('status', 'Actualiza tus datos para poder generar tu ficha');
        }elseif ($dpago[0]->verificado=="Pagado") {
        $productos=[
            'solicitud'=>$dsolicitudes,
            'personales'=>$dpersonales,
            'escolares'=>$descolares,
            'domicilio'=>$ddomicilio
        ];
        view('ficha');
       
        
        $pdf = PDF::loadView('ficha',$productos);
        return $pdf->stream("solicitud_examen.pdf");
    }else{
        return redirect('/solicitud')->with('status', 'Comprobante en verificación');
    }
    }

    public function descargarFicha(){
        
        $dpersonales = personales::where('id_user',[\Illuminate\Support\Facades\Auth::user()->id])->get();
        $dsolicitudes = solicitudes::where('id_user',[\Illuminate\Support\Facades\Auth::user()->id])->get();
        $descolares = datos_escolares::where('id_user',[\Illuminate\Support\Facades\Auth::user()->id])->get();
        $ddomicilio = domicilio::where('id_user',[\Illuminate\Support\Facades\Auth::user()->id])->get();
        $dpago = comprobantes::where('id_user',[\Illuminate\Support\Facades\Auth::user()->id])->get();
        if(json_encode($dsolicitudes) == '[]' || json_encode($dpersonales) == '[]' || json_encode($descolares) == '[]' || json_encode($ddomicilio) == '[]' || json_encode($dpago) == '[]'){
           return redirect('/solicitud')->with('status', 'Actualiza tus datos para poder generar tu ficha');
        }elseif ($dpago[0]->verificado=="Pagado") {
        $productos=[
            'solicitud'=>$dsolicitudes,
            'personales'=>$dpersonales,
            'escolares'=>$descolares,
            'domicilio'=>$ddomicilio
        ];
        view('ficha');
       
        
        $pdf = PDF::loadView('ficha',$productos);
        return $pdf->download("solicitud_examen.pdf");
    }else{
        return redirect('/solicitud')->with('status', 'Comprobante en verificación');
    }
    }

    public function fichaAspirante($aspirante){

        $dpersonales = personales::where('id_user',$aspirante)->get();
        $dsolicitudes = solicitudes::where('id_user',$aspirante)->get();
        $descolares = datos_escolares::where('id_user',$aspirante)->get();
        $ddomicilio = domicilio::where('id_user',$aspirante)->get();

        $productos=[
            'solicitud'=>$dsolicitudes,
            'personales'=>$dpersonales,
            'escolares'=>$descolares,
            'domicilio'=>$ddomicilio
        ];
        view('ficha');
       
        
        $pdf = PDF::loadView('ficha',$productos);
        return $pdf->stream("solicitud_examen.pdf");
}
public function datosAspirante(){

$descolares = datos_escolares::get();
$ddomicilio = domicilio::get();
$dpadres = padres::get();
$dpersonales = personales::get();
$dsocioeconomicos = socioeconomicos::get();
$dsolicitudes = solicitudes::get();
    
        $aspirantes=[
            'solicitud'=>$dsolicitudes,
            'personales'=>$dpersonales,
            'escolares'=>$descolares,
            'domicilio'=>$ddomicilio
        ];

        return $aspirantes;
}

public function getDatosAspirantes(){
    $sql='select * from personales, datos_escolares, domicilios, padres, socioeconomicos, solicitudes WHERE personales.id_user=datos_escolares.id_user AND personales.id_user=domicilios.id_user AND personales.id_user=padres.id_user AND personales.id_user=socioeconomicos.id_user AND personales.id_user=solicitudes.id_user';
    $sql2="SELECT users.id as id_usuario, users.email, personales.id AS id_aspirante, personales.a_paterno, personales.a_materno, personales.nombre, personales.sexo, personales.fecha_nac, personales.nacionalidad, personales.estado as estado_nacimiento, personales.municipio as municipio_nacimiento, personales.curp, personales.estado_civil, personales.tipo_sangre, personales.se_entero_por, personales.id_user as user_num, personales.created_at AS inicio_registro, datos_escolares.id, datos_escolares.nombre_escuela, datos_escolares.clave_escuela, datos_escolares.estado_procedencia, datos_escolares.municipio_procedencia, datos_escolares.fecha_ingreso, datos_escolares.fecha_egreso, datos_escolares.promedio, datos_escolares.id_user, domicilios.id, domicilios.calle_nombre, domicilios.num_exterior, domicilios.num_interior, domicilios.codigo_postal, domicilios.estado, domicilios.municipio, domicilios.localidad, domicilios.telefono, domicilios.correo, domicilios.id_user, padres.id, padres.apellido_paterno_padre, padres.apellido_materno_padre, padres.nombre_padre, padres.vivo_padre, padres.apellido_paterno_madre, padres.apellido_materno_madre, padres.nombre_madre, padres.vivo_madre, padres.id_user, socioeconomicos.id, socioeconomicos.estudios_padre, socioeconomicos.estudios_madre, socioeconomicos.vive_con, socioeconomicos.ocupacion_padre, socioeconomicos.ocupacion_madre, socioeconomicos.depende, socioeconomicos.ingreso_mensual, socioeconomicos.casa, socioeconomicos.cuartos, socioeconomicos.num_habitantes, socioeconomicos.num_dependen, socioeconomicos.tiene_beca, socioeconomicos.beca_otorgo, socioeconomicos.contacto_emergencia, socioeconomicos.calle_contacto_emergencia, socioeconomicos.colonia, socioeconomicos.codigo_postal, socioeconomicos.municipio, socioeconomicos.estado, socioeconomicos.telefono_emergencia, socioeconomicos.lugar_trabajo, socioeconomicos.telefono_trabajo, socioeconomicos.capacidad_diferente, socioeconomicos.cual_capacidad, socioeconomicos.bienestar, socioeconomicos.id_user, solicitudes.id, solicitudes.primera_opcion, solicitudes.segunda_opcion, solicitudes.fecha_examen, solicitudes.sede, solicitudes.id_user, solicitudes.created_at AS fin_registro FROM users LEFT JOIN personales ON users.id=personales.id_user LEFT JOIN datos_escolares ON personales.id_user=datos_escolares.id_user LEFT JOIN domicilios ON personales.id_user=domicilios.id_user LEFT JOIN padres ON personales.id_user=padres.id_user LEFT JOIN socioeconomicos ON personales.id_user=socioeconomicos.id_user LEFT JOIN solicitudes ON personales.id_user=solicitudes.id_user WHERE users.id >= 4";
    $aspirantes = DB::select($sql2);
    return json_encode($aspirantes);
}

public function getDatosAspirante($id_aspirante){
  
    $aspirantes = DB::select('select * from personales, datos_escolares, domicilios, padres, socioeconomicos, solicitudes WHERE personales.id_user=datos_escolares.id_user AND personales.id_user=domicilios.id_user AND personales.id_user=padres.id_user AND personales.id_user=socioeconomicos.id_user AND personales.id_user=solicitudes.id_user AND personales.id_user='.$id_aspirante);
    return json_encode($aspirantes);
}
public function getComprobantes(){
    $query1 = "SELECT personales.id AS id_aspirante, personales.a_paterno, personales.a_materno, personales.nombre, personales.id_user, domicilios.id, domicilios.telefono, domicilios.correo, domicilios.id_user, solicitudes.id, solicitudes.primera_opcion, solicitudes.id_user, comprobantes.id as id_comprobante, comprobantes.comprobante_pago, comprobantes.verificado, comprobantes.id_user as comprobante_id_user FROM personales LEFT JOIN domicilios ON personales.id_user=domicilios.id_user LEFT JOIN solicitudes ON domicilios.id_user=solicitudes.id_user LEFT JOIN comprobantes ON solicitudes.id_user=comprobantes.id_user";
    $query2="SELECT personales.id AS id_aspirante, personales.a_paterno, personales.a_materno, personales.nombre, personales.id_user, domicilios.id, domicilios.telefono, domicilios.correo, domicilios.id_user, solicitudes.id, solicitudes.primera_opcion, solicitudes.id_user, comprobantes.id as id_comprobante, comprobantes.comprobante_pago, comprobantes.verificado, comprobantes.id_user as comprobante_id_user FROM personales, domicilios, solicitudes, comprobantes WHERE personales.id_user=domicilios.id_user AND domicilios.id_user=solicitudes.id_user AND solicitudes.id_user=comprobantes.id_user";
    $lista_comprobantes = DB::select($query2);
    return json_encode($lista_comprobantes);
}
public function generateExcel(){
    
    return Excel::download(new AspirantesExport, 'Registro_fichas.xlsx');
}
public function detailAspirante($id_asp){
    $consulta="SELECT users.id as id_usuario, users.email, personales.id AS id_aspirante, personales.a_paterno, personales.a_materno, personales.nombre, personales.sexo, personales.fecha_nac, personales.nacionalidad, personales.estado as estado_nacimiento, personales.municipio as municipio_nacimiento, personales.curp, personales.estado_civil, personales.tipo_sangre, personales.se_entero_por, personales.id_user as user_num, personales.created_at AS inicio_registro, datos_escolares.id, datos_escolares.nombre_escuela, datos_escolares.clave_escuela, datos_escolares.estado_procedencia, datos_escolares.municipio_procedencia, datos_escolares.fecha_ingreso, datos_escolares.fecha_egreso, datos_escolares.promedio, datos_escolares.id_user, domicilios.id, domicilios.calle_nombre, domicilios.num_exterior, domicilios.num_interior, domicilios.codigo_postal, domicilios.estado, domicilios.municipio, domicilios.localidad, domicilios.telefono, domicilios.correo, domicilios.id_user, padres.id, padres.apellido_paterno_padre, padres.apellido_materno_padre, padres.nombre_padre, padres.vivo_padre, padres.apellido_paterno_madre, padres.apellido_materno_madre, padres.nombre_madre, padres.vivo_madre, padres.id_user, socioeconomicos.id, socioeconomicos.estudios_padre, socioeconomicos.estudios_madre, socioeconomicos.vive_con, socioeconomicos.ocupacion_padre, socioeconomicos.ocupacion_madre, socioeconomicos.depende, socioeconomicos.ingreso_mensual, socioeconomicos.casa, socioeconomicos.cuartos, socioeconomicos.num_habitantes, socioeconomicos.num_dependen, socioeconomicos.tiene_beca, socioeconomicos.beca_otorgo, socioeconomicos.contacto_emergencia, socioeconomicos.calle_contacto_emergencia, socioeconomicos.colonia, socioeconomicos.codigo_postal, socioeconomicos.municipio, socioeconomicos.estado, socioeconomicos.telefono_emergencia, socioeconomicos.lugar_trabajo, socioeconomicos.telefono_trabajo, socioeconomicos.capacidad_diferente, socioeconomicos.cual_capacidad, socioeconomicos.bienestar, socioeconomicos.id_user, solicitudes.id, solicitudes.primera_opcion, solicitudes.segunda_opcion, solicitudes.fecha_examen, solicitudes.sede, solicitudes.id_user, solicitudes.created_at AS fin_registro FROM users LEFT JOIN personales ON users.id=personales.id_user LEFT JOIN datos_escolares ON personales.id_user=datos_escolares.id_user LEFT JOIN domicilios ON personales.id_user=domicilios.id_user LEFT JOIN padres ON personales.id_user=padres.id_user LEFT JOIN socioeconomicos ON personales.id_user=socioeconomicos.id_user LEFT JOIN solicitudes ON personales.id_user=solicitudes.id_user WHERE users.id = $id_asp";
    $detalle = DB::select($consulta);
    return json_encode($detalle);
}
}