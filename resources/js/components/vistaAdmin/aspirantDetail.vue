<template>
  <div>
    <header class="container mt-5">
        <div class="">
            <div class=" text-center">
                <div class="col"><img src="http://localhost:8000/images/user.png" style="width:120px; height:100px;"></div>
            </div>
        </div>                
    </header>
    <div class="container mt-5 text-center" v-for="asp in aux" :key="asp">
        <h3 class="fw-bolder">Información del aspirante: {{asp.nombre}} {{asp.a_paterno}} {{asp.a_materno}}</h3>
    </div>
    <div class="container" v-for="asp in aux" :key="asp">
        <div class="mt-5 text-center">
            <div class="card-header text-center text-white" style="background-color:darkblue">
                <h3 class="fw-bolder">Datos personales</h3>
            </div>
            <div class="row mt-3">
                <div class="col">
                   <b> Nombre:</b> {{asp.nombre}} {{asp.a_paterno}} {{asp.a_materno}}
                </div>
                <div class="col">
                   <b>Sexo:</b> {{asp.sexo}}
                </div>
                <div class="col">
                   <b>Nacionalidad:</b> {{asp.nacionalidad}}
                </div>
                <div class="col">
                   <b>Fecha de Nacimiento:</b> {{asp.fecha_nac}}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                   <b>Estado de origen:</b> {{asp.estado_nacimiento}}
                </div>
                <div class="col">
                   <b>Municipio de origen:</b> {{asp.municipio_nacimiento}}
                </div>
                <div class="col">
                   <b>CURP:</b> {{asp.curp}}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <b>Estado Civil:</b> {{asp.estado_civil}}
                </div>
                <div class="col">
                    <b>Tipo de sangre:</b> {{asp.tipo_sangre}}
                </div>
                <div class="col">
                    <b>Se entero por:</b> {{asp.se_entero_por}}
                </div>
            </div>
        </div>
        <div class="mt-5 text-center">
            <div class="card-header text-center text-white" style="background-color:darkblue">
                <h3 class="fw-bolder">Datos Escolares</h3>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <b>Escuela de procedencia:</b> {{asp.nombre_escuela}}
                </div>
                <div class="col">
                    <b>Clave de la escuela:</b> {{asp.clave_escuela}}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <b>Estado de procedencia:</b> {{asp.estado_procedencia}}
                </div>
                <div class="col">
                    <b>Municipio de procedencia:</b> {{asp.municipio_procedencia}}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <b>Fecha ingreso:</b> {{asp.fecha_ingreso}}
                </div>
                <div class="col">
                    <b>Fecha egreso:</b> {{asp.fecha_egreso}}
                </div>
                <div class="col">
                    <b>Promedio:</b> {{asp.promedio}}
                </div>
            </div>
        </div>
        <div class="mt-5 text-center">
            <div class="card-header text-center text-white" style="background-color:darkblue">
                <h3 class="fw-bolder">Datos de contacto</h3>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <b>Calle:</b> {{asp.calle_nombre}}
                </div>
                <div class="col">
                    <b>Número exterior:</b> {{asp.num_exterior}}
                </div>
                <div class="col">
                    <b>Número interior:</b> {{asp.num_interior}}
                </div>
                <div class="col">
                    <b>Código postal:</b> {{asp.codigo_postal}}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <b>Estado:</b> {{asp.estado}}
                </div>
                <div class="col">
                    <b>Municipio:</b> {{asp.municipio}}
                </div>
                <div class="col">
                    <b>Localidad/Colonia:</b> {{asp.localidad}}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <b>Número de teléfono:</b> {{asp.telefono}}
                </div>
                <div class="col">
                    <b>Correo electrónico:</b> {{asp.correo}}
                </div>
            </div>
        </div> 
        <div class="mt-5 text-center">
            <div class="card-header text-center text-white" style="background-color:darkblue">
                <h3 class="fw-bolder">Datos de los padres</h3>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <b>Nombre del padre:</b> {{asp.nombre_padre}} {{asp.apellido_paterno_padre}} {{asp.apellido_materno_padre}}
                </div>
                <div class="col">
                    <b>¿Vive?:</b> {{asp.vivo_padre}}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <b>Nombre de la madre:</b> {{asp.nombre_madre}} {{asp.apellido_paterno_madre}} {{asp.apellido_materno_madre}}
                </div>
                <div class="col">
                    <b>¿Vive?:</b> {{asp.vivo_madre}}
                </div>
            </div>
        </div>  
        <div class="mt-5 text-center">
            <div class="card-header text-center text-white" style="background-color:darkblue">
                <h3 class="fw-bolder">Datos socioeconómicos</h3>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <b>Grado de estudios del padre:</b> {{asp.estudios_padre}}
                </div>
                <div class="col">
                    <b>Grado de estudios de la madre:</b> {{asp.estudios_madre}}
                </div>
                <div class="col">
                    <b>Vive con:</b> {{asp.vive_con}}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <b> Ocupación del padre: </b> {{asp.ocupacion_padre}}
                </div>
                <div class="col">
                    <b>Ocupación de la madre:</b> {{asp.ocupacion_madre}}
                </div>
                <div class="col">
                    <b>Dependencia económica:</b> {{asp.depende}}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <b>Ingreso mensual:</b> {{asp.ingreso_mensual}}
                </div>
                <div class="col">
                    <b>La casa donde vives es:</b> {{asp.casa}}
                </div>
                <div class="col">
                    <b>Cantidad de habitantes:</b> {{asp.num_habitantes}}
                </div>
                <div class="col">
                    <b>¿Cuántas personas dependen?:</b> {{asp.num_dependen}}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <b>Pertenece al programa del Bienestar:</b> {{asp.bienestar}}
                </div>
                <div class="col">
                    <b>¿Tiene beca?:</b> {{asp.tiene_beca}}
                </div>
                <div class="col">
                    <b>¿Quién le otorgó la beca?:</b> {{asp.beca_otorgo}}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <b>¿Tiene alguna capacidad diferente?:</b> {{asp.capacidad_diferente}}
                </div>
                <div class="col">
                    <b>Capacidad diferente:</b> {{asp.cual_capacidad}}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <b>Contacto de emergencia:</b> {{asp.contacto_emergencia}}
                </div>
                <div class="col">
                    <b>Teléfono de emergencia:</b> {{asp.telefono_emergencia}}
                </div>
                <div class="col">
                    <b>Dirección:</b> {{asp.calle_contacto_emergencia}}
                </div>
            </div>
        </div>
        <div class="mt-5 text-center">
            <div class="card-header text-center text-white" style="background-color:darkblue">
                <h3 class="fw-bolder">Solicitud</h3>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <b>Primera opción:</b> {{asp.primera_opcion}}
                </div>
                <div class="col">
                    <b>Segunda opción:</b> {{asp.segunda_opcion}}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <b>Fecha de examen:</b> {{asp.fecha_examen}}
                </div>
                <div class="col">
                    <b>Sede de examen:</b> {{asp.sede}}
                </div>
            </div>
        </div>            
    </div>
  </div>
</template>

<script>
import axios from 'axios'
export default {
    props:['aspiranteid'],
    data(){
        return{
            aux:[],
            statusUsers:[]
        }
    },
    methods:{
      statusExist(id_use){
       axios.get('/consultasql/'+id_use).then(res=>{
          if(JSON.stringify(res.data)!="[]"){
            const arr={status:1};
        this.statusUsers.push(arr);
          }else{
            const arr={status:0};
            this.statusUsers.push(arr);
          } 
          
    });
      },


    },
    beforeMount(){
    axios.get('/detalle/'+this.aspiranteid).then(res=>{
        this.aux=res.data;
      /**   for(var i=0; i<=this.aux.length-1; i++){
          this.statusExist(this.aux[i].user_num);
        }*/
    });
    
},
}
</script>

<style>

</style>