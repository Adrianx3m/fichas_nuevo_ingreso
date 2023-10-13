<template>
  <section>
    <div>
      <form class="container" @submit.prevent="guardarDomicilio">
        <div class="row d-flex justify-content-center mt-200">
        <h3 style="cursor: pointer" class="mt-3 fw-bold">Datos de contacto</h3>
        <div class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
          <div class="col-sm"><span>Calle</span><input type="text" class="form-control mt-3" placeholder="Calle" name="domicilio_actual_calle" v-model="datosContacto.calle_nombre" required></div>
          <div class="col-sm"><span>Número exterior</span><input type="number" class="form-control mt-3" placeholder="Número Exterior" name="domicilio_actual_exterior" v-model="datosContacto.num_exterior" required></div>
        </div>
        <div class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
          <div class="col-sm"><span>Número interior</span><input type="number" class="form-control mt-3" placeholder="Número Interior" name="domicilio_actual_interior" v-model="datosContacto.num_interior" required></div>
          <div class="col-sm"><span>Código postal</span><input type="number" class="form-control mt-3" placeholder="Código Postal" name="domicilio_actual_cp" v-model="datosContacto.codigo_postal" required maxlength="5"></div>
        </div>
        <div class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
          <div class="col-sm"><span>Estado</span><input type="text" class="form-control mt-3" placeholder="Estado" name="domicilio_actual_estado" v-model="datosContacto.estado" required></div>
          <div class="col-sm"><span>Municipio</span><input type="text" class="form-control mt-3" placeholder="Municipio" name="domicilio_actual_municipio" v-model="datosContacto.municipio" required></div>
          <div class="col-sm"><span>Localidad/Colonia</span><input type="text" class="form-control mt-3" placeholder="Localidad/Colonia" name="domicilio_actual_localidad" v-model="datosContacto.localidad" required></div>
        </div>
        <div class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
          <div class="col-sm"><span>Número de teléfono</span><input type="number" class="form-control mt-3" placeholder="Número de Teléfono" name="domicilio_actual_teléfono" v-model="datosContacto.telefono" required maxlength="10"></div>
          <div class="col-sm"><span>Correo electrónico</span><input type="mail" class="form-control mt-3" placeholder="Correo electrónico" name="domicilio_actual_correo" v-model="datosContacto.correo" required></div>
        </div>
        <div class="d-grid gap-2 col-3 mx-auto mt-5">
          <button class="btn btn-primary" v-if="!recordExists">Guardar</button>
          <button class="btn btn-success" v-if="recordExists">Actualizar</button>
        </div>
        </div>
      </form>
    </div>
    <br >
  </section>
</template>

<script>
import axios from 'axios';
export default {
     props:['recived'],
    data(){
        return{
            datosContacto:[
            {calle_nombre:"",num_exterior:"",num_interior:"",codigo_postal:null,estado:"",municipio:"",localidad:"",telefono:null, correo:""}
            ],
            aux:[],
          recordExists:false
        }
    },
    methods:{
    guardarDomicilio(){
      const datos = {
        calle_nombre:this.datosContacto.calle_nombre,
        num_exterior:this.datosContacto.num_exterior,
        num_interior:this.datosContacto.num_interior,
        estado:this.datosContacto.estado,
        codigo_postal:this.datosContacto.codigo_postal,
        municipio:this.datosContacto.municipio,
        localidad:this.datosContacto.localidad,
        telefono:this.datosContacto.telefono,
        correo:this.datosContacto.correo,
        id_user:this.recived
        };
      if(!this.recordExists){
       axios.post("/domicilio",datos).then(res=>{
         this.$swal("¡Felicidades! Has completado Datos de domicilio, continua con Datos de los Padres.");
         this.$emit("dame-domicilio","domicilio-lleno");
         
});
       this.recordExists=true;
      }else{
        axios.put("/domicilio/"+this.datosContacto.id,datos).then(res=>{
          this.$swal("¡Felicidades! Tus datos se actualizaron correctamente");
      this.$emit("dame-domicilio","domicilio-lleno");
        })
      }
      
    },
    async verSiExiste(){
     let peti = axios.get("/domicilio/"+this.recived)
    .then(res=>{
      this.aux=res.data;
      
    if(JSON.stringify(this.aux)!='[]'){
      this.recordExists=true;
      this.$emit("dame-domicilio","domicilio-lleno");
            this.datosContacto=this.aux[0];

      }
      });
    
      }
    },
    async mounted(){
        var $vm = this;
        await this.verSiExiste();
        
    },
    async updated(){
      var $vm = this;
      
    }
}

</script>

<style>

</style>