<template>
  <div>
      <form @submit.prevent="guardarSolicitud" class="container">
        <div class="row d-flex justify-content-center mt-200">
        <h3 class="mt-3 fw-bold">Solicitud</h3>
        <div>
            <h4 class="mt-3 fw-bold">Carreras en orden de preferencia</h4>
            <div class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
              <div class="col-sm mt-3">
                  <span class="mt-3">Primera opción</span>
                  <select v-model="datosSolicitud.primera_opcion" class="form-select mt-3" required>
                      <option v-for="x in carreras" :key="x">{{x}}</option>
                  </select>
              </div>
              <div class="col-sm mt-3">
                  <span class="mt-3">Segunda opción</span>
                  <select v-model="datosSolicitud.segunda_opcion" class="form-select mt-3" required>
                      <option v-for="x in carreras" :key="x">{{x}}</option>
                  </select>
              </div>
            </div>
            <div class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
              <div class="col-sm mt-3">
                  <span class="mt-3">Fecha y horario</span>
                  <select v-model="datosSolicitud.fecha_examen" class="form-select mt-3" required>
                      <option v-for="x in aux1" :key="x.fecha">{{x.fecha}} - {{x.hora}}</option>
                  </select>
              </div>
              <div class="col-sm mt-3">
                  <span class="mt-3">Sede</span>
                  <select v-model="datosSolicitud.sede" class="form-select mt-3" required>
                      <option v-for="x in sedes" :key="x">{{x}}</option>
                  </select>
              </div>
            </div>
        </div>
        </div>
        <div class="d-grid gap-2 col-3 mx-auto mt-5">
        <button class="btn btn-primary" v-if="!recordExists">Guardar</button>
        <button class="btn btn-success" v-if="recordExists">Actualizar</button>
        </div>
      </form>
  </div>
</template>

<script>
import axios from 'axios';
export default {
props:['recived'],
data(){
    return{
        datosSolicitud:[{primera_opcion:"",segunda_opcion:"",fecha_examen:"",sede:""}],
        carreras:['Ingeniería en Agronomía', 'Ingeniería en Gestión Empresarial', 'Ingeniería en Sistemas Computacionales'],
        fechas:[],
        sedes:['Tecomatlán, Puebla.'],
        recordExists:false,
        aux:[],
        aux1:[]
    }
},
methods:{
    guardarSolicitud(){
      const datos = {
        primera_opcion:this.datosSolicitud.primera_opcion,
        segunda_opcion:this.datosSolicitud.segunda_opcion,
        fecha_examen:this.datosSolicitud.fecha_examen,
        sede:this.datosSolicitud.sede,
        id_user:this.recived
        };
      if(!this.recordExists){
       axios.post("/opciones",datos);
       this.$emit("dame-opciones","opciones-lleno");
       this.recordExists=true;
      }else{
        axios.put("/opciones/"+this.datosSolicitud.id,datos).then(res=>{
          this.$emit("dame-opciones","opciones-lleno");
          console.log(res);
        })
      }
      this.$swal({
          html:`<div>
          <h1>¡Felicidades! Has completado tu registro de solicitud para el examen de admisión al TecNM Campus Tecomatlán</h1>
          <h5>Por favor realiza el pago de derecho a examen para terminar con el proceso de solicitud</h5>
          </div>`,
          showCancelButton:true,
          confirmButtonText:"Pagar y subir comprobante",
          cancelButtonText:"Regresar al registro",
          }).then((result) => {
          if (result.isConfirmed) {
            window.location="/comprobantes";
          }else{
            this.auxModal=false;
          }
        });
      },
    async verSiExiste(){
     let peti = axios.get("/opciones/"+this.recived)
  .then(res=>{
    this.aux=res.data;
    
  if(JSON.stringify(this.aux)!='[]'){
    this.recordExists=true;
    this.$emit("dame-opciones","opciones-lleno");
      this.datosSolicitud=this.aux[0];

    }else{
    }
    });
  
    }
},
    beforeCreate(){
    axios.get('/getFechas').then(res=>{
        this.aux1=res.data;
    });
    },
    async mounted(){
    var $vm = this;
    await this.verSiExiste();
    },
    async updated(){
    var $vm = this;
    
    
    },
    destroy(){
    console.log("Bye");
    }

}

</script>

<style>

</style>