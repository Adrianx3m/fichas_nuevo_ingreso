<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;


class AspirantesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return [
            'Num',
            'Nombre completo',
            'Sexo',
            'Fecha de nacimiento',
            'Nacionalidad',
            'Estado de nacimiento',
            'Municipio de nacimiento',
            'CURP',
            'Estado civil',
            'Tipo de sangre',
            'Se entero por',
            'Preparatoria de procedencia',
            'Clave Prepa',
            'Estado de procedencia',
            'Municipio de procedencia',
            'Fecha Ingreso',
            'Fecha Egreso',
            'Promedio',
            'Domicilio/Calle',
            'Número exterior',
            'Número interior',
            'Código postal',
            'Estado',
            'Municipio',
            'Localidad/Colonia',
            'Número de teléfono',
            'Correo electrónico',
            'Nombre del padre',
            '¿Vive?',
            'Nombre de la madre',
            '¿Vive?',
            'Estudios padre',
            'Estudios madre',
            'Vive con',
            'Ocupación del padre',
            'Ocupación de la madre',
            'Dependencia económica',
            'Ingreso mensual',
            '¿La casa donde vives es?',
            'Cantidad de cuartos',
            'Número de habitantes',
            'Número dependen',
            '¿Cuentas con beca?',
            '¿Quién te la otorgo?',
            'Capacidad diferente',
            '¿Cuál?',
            '¿Tu familia pertenece al programa de l Bienestar?',
            'Contacto de emergencia',
            'Número de emergencia',
            'Lugar de trabajo',
            'Número del lugar de trabajo',
            'Carrera 1',
            'Carrera 2',
            'Fecha examen',
            'Sede',

        ];
    }

    public function collection()
    { //'select * from personales, datos_escolares, domicilios, padres, socioeconomicos, solicitudes WHERE personales.id_user=datos_escolares.id_user AND personales.id_user=domicilios.id_user AND personales.id_user=padres.id_user AND personales.id_user=socioeconomicos.id_user AND personales.id_user=solicitudes.id_user'
            $personales = DB::table('personales')
            ->select('personales.id as idUsuario', DB::raw("CONCAT(`personales`.`nombre`, ' ', `personales`.`a_paterno`, ' ', `personales`.`a_materno`) as `Nombre_completo`"), 'personales.sexo', 'personales.fecha_nac', 'personales.nacionalidad', 'personales.estado as estado_nacimiento', 'personales.municipio as municipio_nacimiento', 'personales.curp', 'personales.estado_civil', 'personales.tipo_sangre', 'personales.se_entero_por', 'datos_escolares.nombre_escuela', 'datos_escolares.clave_escuela', 'datos_escolares.estado_procedencia', 'datos_escolares.municipio_procedencia', 'datos_escolares.fecha_ingreso', 'datos_escolares.fecha_egreso','datos_escolares.promedio', 'domicilios.calle_nombre', 'domicilios.num_exterior', 'domicilios.num_interior', 'domicilios.codigo_postal', 'domicilios.estado', 'domicilios.municipio', 'domicilios.localidad', 'domicilios.telefono', 'domicilios.correo', DB::raw("CONCAT(`padres`.`nombre_padre`, ' ', `padres`.`apellido_paterno_padre`, ' ', `padres`.`apellido_materno_padre`) as `Nombre_progenitor`"), 'padres.vivo_padre', DB::raw("CONCAT(`padres`.`nombre_madre`, ' ', `padres`.`apellido_paterno_madre`, ' ', `padres`.`apellido_materno_madre`) as `Nombre_progenitora`"), 'padres.vivo_madre', 'socioeconomicos.estudios_padre', 'socioeconomicos.estudios_madre', 'socioeconomicos.vive_con', 'socioeconomicos.ocupacion_padre', 'socioeconomicos.ocupacion_madre', 'socioeconomicos.depende', 'socioeconomicos.ingreso_mensual', 'socioeconomicos.casa', 'socioeconomicos.cuartos', 'socioeconomicos.num_habitantes', 'socioeconomicos.num_dependen', 'socioeconomicos.tiene_beca', 'socioeconomicos.beca_otorgo', 'socioeconomicos.capacidad_diferente', 'socioeconomicos.cual_capacidad', 'socioeconomicos.bienestar', 'socioeconomicos.contacto_emergencia', 'socioeconomicos.telefono_emergencia', 'socioeconomicos.lugar_trabajo', 'socioeconomicos.telefono_trabajo', 'solicitudes.primera_opcion', 'solicitudes.segunda_opcion', 'solicitudes.fecha_examen', 'solicitudes.sede')
            ->join('datos_escolares','datos_escolares.id_user','=','personales.id_user')
            ->join('domicilios','domicilios.id_user','=','personales.id_user')
            ->join('padres','padres.id_user','=','personales.id_user')
            ->join('socioeconomicos','socioeconomicos.id_user','=','personales.id_user')
            ->join('solicitudes','solicitudes.id_user','=','personales.id_user')
            ->get();
           
                    return $personales;

    }
}
