<template>
  <section>
    <div>
      <form class="container" @submit.prevent="guardarPadres">
        <div class="row d-flex justify-content-center mt-200">
          <h3 style="cursor: pointer" class="mt-3 fw-bold">Datos de los Padres</h3>
          <div class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
            <h5 class="fw-bold mt-3" style="font-size:20px;">Datos del padre</h5>
            <div class="col-sm"><span>Apellido paterno</span><input type="text" name="paterno_padre" class="form-control mt-3" placeholder="Apellido paterno" v-model="datosPadres.apellido_paterno_padre" required></div>
            <div class="col-sm"><span>Apellido materno</span><input type="text" name="materno_padre" class="form-control mt-3" placeholder="Apellido materno" v-model="datosPadres.apellido_materno_padre" required></div>
            <div class="col-sm"><span>Nombre(s)</span><input type="text" name="nombre_padre" class="form-control mt-3" placeholder="Nombre del padre" v-model="datosPadres.nombre_padre" required></div>
            <div class="col-sm">
              <span>¿Vive?</span>
              <br >
              <label for="vive_padre">Sí: <input type="radio" class="mt-3" name="vive_padre" value="Sí" v-model="datosPadres.vivo_padre" required></label>
              <label for="vive_padre">No: <input type="radio"  name="vive_padre" value="No" v-model="datosPadres.vivo_padre" required></label>
            </div>
          </div>
          <div class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
              <h4 class="fw-bold mt-3" style="font-size: 20px;">Datos de la madre</h4>
              <div class="col-sm"><span>Apellido paterno</span><input type="text" name="paterno_madre" class="form-control mt-3" placeholder="Apellido paterno" v-model="datosPadres.apellido_paterno_madre" required></div>
              <div class="col-sm"><span>Apellido materno</span><input type="text" name="materno_madre" class="form-control mt-3" placeholder="Apellido materno" v-model="datosPadres.apellido_materno_madre" required></div>
              <div class="col-sm"><span>Nombre(s)</span><input type="text" name="nombre_madre" class="form-control mt-3" placeholder="Nombre de la madre" v-model="datosPadres.nombre_madre" required></div>
              <div class="col-sm">
                <span>¿Vive?</span>
                <br >
                <label class="col-sm" for="vive_madre">Sí: <input type="radio" class="mt-3" name="vive_madre" value="Sí" v-model="datosPadres.vivo_madre" required></label>
                <label for="vive_madre">No: <input type="radio"  name="vive_madre" value="No" v-model="datosPadres.vivo_madre" required></label>
          </div>
        </div>
          <br>
          <div class="d-grid gap-2 col-3 mx-auto mt-5">
            <button class="btn btn-primary" v-if="!recordExists">Guardar</button>
            <button class="btn btn-success" v-if="recordExists">Actualizar</button>
          </div>
        </div>
      </form>
    </div>
  </section>
</template>

<script>
import axios from 'axios';
export default {
  props:['recived'],
  data(){
    return{
      datosPadres:[
        {apellido_paterno_padre:"", apellido_materno_padre:"", nombre_padre:"", vivo_padre:"", apellido_paterno_madre:"", apellido_materno_madre:"", nombre_madre:"", vivo_madre:""}
      ], 
      aux:[],
      recordExists:false
    }
  },
  methods:{
    guardarPadres(){
      const datos = {
        apellido_paterno_padre:this.datosPadres.apellido_paterno_padre,
        apellido_materno_padre:this.datosPadres.apellido_materno_padre,
        nombre_padre:this.datosPadres.nombre_padre,
        vivo_padre:this.datosPadres.vivo_padre,
        apellido_paterno_madre:this.datosPadres.apellido_paterno_madre,
        apellido_materno_madre:this.datosPadres.apellido_materno_madre,
        nombre_madre:this.datosPadres.nombre_madre,
        vivo_madre:this.datosPadres.vivo_madre,
        id_user:this.recived
        };
      if(!this.recordExists){
       axios.post("/padres",datos).then(()=>{
         this.$swal("¡Felicidades! Has completado Datos de los padres, continua con Datos de solicitud.");
         this.$emit("dame-padres","padres-lleno");
       });
       this.recordExists=true;
      }else{
        axios.put("/padres/"+this.escuelaProcedencia.id,datos).then(res=>{
          this.$swal("¡Felicidades! Tus datos se actualizaron correctamente");
          this.$emit("dame-padres","padres-lleno");
        })
      }
      
    },
    async verSiExiste(){
     let peti = axios.get("/padres/"+this.recived)
    .then(res=>{
      this.aux=res.data;
      
    if(JSON.stringify(this.aux)!='[]'){
      this.recordExists=true;
      this.$emit("dame-padres","padres-lleno");
            this.datosPadres=this.aux[0];

      }else{}
      });
    
      }
    },
    async mounted(){
        var $vm = this;
        await this.verSiExiste();
        
    },

}
</script>

<style>

</style>