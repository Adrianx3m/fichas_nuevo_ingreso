<template>
  <section>
      <div>
        <form class="container" @submit.prevent="guardarEscolares">
          <div class="row d-flex justify-content-center mt-200">
            <h3 style="cursor: pointer" class="mt-3 fw-bold">Escuela de procedencia</h3>
            <div class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
              <div class="col-sm"><span>Nombre de la escuela</span><input type="text" class="form-control mt-3" placeholder="Nombre de la escuela" name="escuela" v-model="escuelaProcedencia.nombre_escuela" required></div>
              <div class="col-sm"><span>Clave de la escuela:</span><input type="text" class="form-control mt-3" placeholder="Clave de Centro de Trabajo" name="cct" v-model="escuelaProcedencia.clave_escuela" required maxlength="10"></div>
            </div>
            <div class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
              <div class="col-sm"><span>Estado de procedencia</span><input type="text" class="form-control mt-3" placeholder="Estado de procedencia" name="estado_escuela" v-model="escuelaProcedencia.estado_procedencia" required></div>
              <div class="col-sm"><span>Municipio de procedencia</span><input type="text" class="form-control mt-3" placeholder="Municipio de procedencia" name="municipio-escuela" v-model="escuelaProcedencia.municipio_procedencia" required></div>
            </div>
            <div class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
              <div class="col-sm"><label for="fecha_ingreso">Año de ingreso</label><input type="date" class="form-control mt-3" placeholder="Año de ingreso" name="fecha_ingreso" v-model="escuelaProcedencia.fecha_ingreso" required></div>
              <div class="col-sm"><label for="fecha_egreso">Año de egreso</label><input type="date" class="form-control mt-3" placeholder="Año de egreso" name="fecha_egreso" v-model="escuelaProcedencia.fecha_egreso" required></div>
              <div class="col-sm"><label for="promedio">Promedio</label><input type="text" class="form-control mt-3" placeholder="Promedio general" name="promedio" v-model.number="escuelaProcedencia.promedio" required max="100" maxlength="3" v-on:change="limitarPromedio()"></div>
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
            escuelaProcedencia:[
          {nombre_escuela:"",clave_escuela:"",estado_procedencia:"",municipio_procedencia:"",fecha_ingreso:"",fecha_egreso:"",promedio:null}
          ],
          aux:[],
          recordExists:false
        }
    },
  methods:{
    guardarEscolares(){
      const datos = {
        nombre_escuela:this.escuelaProcedencia.nombre_escuela,
        clave_escuela:this.escuelaProcedencia.clave_escuela,
        estado_procedencia:this.escuelaProcedencia.estado_procedencia,
        municipio_procedencia:this.escuelaProcedencia.municipio_procedencia,
        fecha_ingreso:this.escuelaProcedencia.fecha_ingreso,
        fecha_egreso:this.escuelaProcedencia.fecha_egreso,
        promedio:this.escuelaProcedencia.promedio,
        id_user:this.recived
        };
      if(!this.recordExists){
       axios.post("/escolares",datos).then(()=>{
         this.$swal("¡Felicidades! Has completado Datos escolares, continua con Datos de Domicilio.");
         this.$emit("dame-escolares","escolares-lleno");
       });
       this.recordExists=true;
      }else{
        axios.put("/escolares/"+this.escuelaProcedencia.id,datos).then(res=>{
          this.$swal("¡Felicidades! Tus datos se actualizaron correctamente");
          this.$emit("dame-escolares","escolares-lleno");
        })
      }
      
    },
    limitarPromedio(){
      
      let isNumber = /^[0-9]{3}$/.test(this.escuelaProcedencia.promedio);
      if(!isNumber){
        alert("Ingresa una Promedio valido");
        this.escuelaProcedencia.promedio=null;
      }
      else{
        if(this.escuelaProcedencia.promedio>=100){
          
        }else{
          alert("Ingresa una Promedio valido");
        this.escuelaProcedencia.promedio=null;
        }
      }
        
      },
    async verSiExiste(){
     let peti = axios.get("/escolares/"+this.recived)
    .then(res=>{
      this.aux=res.data;
      
    if(JSON.stringify(this.aux)!='[]'){
      this.recordExists=true;
      this.$emit("dame-escolares","escolares-lleno");
            this.escuelaProcedencia=this.aux[0];

      }else{}
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