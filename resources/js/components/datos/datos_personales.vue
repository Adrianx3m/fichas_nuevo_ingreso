<template>
    <section>
      <div>
        <form class="container" @submit.prevent="guardarPersonales()">
          <div class="row d-flex justify-content-center mt-200">
          <h3 class="mt-3 fw-bold" style="cursor: pointer">Datos personales</h3>
          <div class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
            <div class="col-sm"><span>Apellido paterno:</span><input type="text" class="form-control mt-3" placeholder="Apellido Paterno" name="paterno" v-model="datosPersonales.a_paterno" required></div>
            <div class="col-sm"><span>Apellido materno:</span><input type="text" class="form-control mt-3" placeholder="Apellido Materno" v-model="datosPersonales.a_materno" required></div>
            <div class="col-sm"><span>Nombre(s):</span><input type="text" class="form-control mt-3" placeholder="Nombre(s)" v-model="datosPersonales.nombre" name="nombre" required></div>
          </div>
          <div class="row mt-3" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
            <div class="col-sm fw-bold"><span>CURP:</span><input type="text" @input="altercurp()" @change="verificar()" class="form-control mt-3" v-model="datosPersonales.curp" placeholder="CURP" required></div>
            <div class="col-sm fw-bold"><span>Nacionalidad:</span><input type="text" class="form-control mt-3" placeholder="Nacionalidad" name="nacionalidad" v-model="datosPersonales.nacionalidad" required></div>
            <div class="col-sm">
              <span class="fw-bold">Sexo:</span>
              <br>
              <label for="sexo" >Hombre: <input type="radio" class="mt-3" name="sexo" value="Hombre" v-model="datosPersonales.sexo" required></label>
              <label for="sexo" >Mujer: <input type="radio" class="" name="sexo" value="Mujer" v-model="datosPersonales.sexo" required></label>
          </div>
            </div>
            <div class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
          <div class="col-sm"><span>Fecha de nacimiento:</span><input type="date" class="form-control mt-3" placeholder="Fecha de nacimiento" v-model="datosPersonales.fecha_nac" required></div>
          <div class="col-sm"><span>Estado de nacimiento:</span><input type="text" class="form-control mt-3" placeholder="Estado" v-model="datosPersonales.estado" required></div>
          <div class="col-sm"><span>Municipio de nacimiento:</span><input type="text" class="form-control mt-3" placeholder="Municipio" v-model="datosPersonales.municipio" required></div>
          </div>
          <br>
          
          <div class="row fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
            <div class="col-sm mt-3">
              <span>Tipo de sangre</span>
              <select class="form-select mt-3"  name="estado_civil" v-model="datosPersonales.tipo_sangre" placeholder="Estado civil" required>
                <option v-for="x in tipo_sangre" :key="x" class="form-control">{{x}}</option>
              </select>
            </div>
            <div class="col-sm mt-3">
              <span>Estado Civil</span>
              <select class="form-select selectpicker mt-3"  name="estado_civil" v-model="datosPersonales.estado_civil" placeholder="Estado civil" required>
                <option value="Soltero">Soltero(a)</option>
                <option value="Casado">Casado(a)</option>
                <option value="Viudo">Viudo(a)</option>
                <option value="Divorciado">Divorciado(a)</option>
                <option value="Union Libre">Unión libre</option>
              </select>
            </div>
            <div class="col-sm mt-3">
              <label for="se_entero_por">¿Por quién se enteró de la institución?</label>
              <div><input type="text" class="form-control mt-3" v-model="datosPersonales.se_entero_por" placeholder="¿Por quién se enteró de la institución?" required></div>
              </div>
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
import axios from "axios";
export default {
    props:['recived'],
data(){
    return{
        datosPersonales:[
          {curp:"",nombre:"",a_paterno:"",a_materno:"",fecha_nac:"",sexo:"",estado:"",municipio:"",estado_civil:"",nacionalidad:"",tipo_sangre:"",se_entero_por:""}
          ],
          tipo_sangre:['A positivo (A+)', 'A negativo (A-)', 'B positivo (B+)', 'B negativo (B-)', 'AB positivo (AB+)', 'AB negativo (AB-)', 'O positivo (O+)', 'O negativo (O-)', 'RHO positivo (RHO+)'],
          aux:[],
          dPersonales:true,
          recordExists:false
    }
},
methods:{
    altercurp(){
      this.datosPersonales.curp=this.datosPersonales.curp.toUpperCase();
    },
    verificar(){
      let isACurp = /^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$/.test(this.datosPersonales.curp);
      if(!isACurp){
        alert("Ingresa una CURP valida");
        this.datosPersonales.curp="";
      }
    },
    async guardarPersonales(){
      const datos = {
        curp:this.datosPersonales.curp,
        nombre:this.datosPersonales.nombre,
        a_paterno:this.datosPersonales.a_paterno,
        a_materno:this.datosPersonales.a_materno,
        fecha_nac:this.datosPersonales.fecha_nac,
        sexo:this.datosPersonales.sexo,
        estado:this.datosPersonales.estado,
        municipio:this.datosPersonales.municipio,
        estado_civil:this.datosPersonales.estado_civil,
        nacionalidad:this.datosPersonales.nacionalidad,
        tipo_sangre:this.datosPersonales.tipo_sangre,
        se_entero_por:this.datosPersonales.se_entero_por,
        id_user:this.recived
        };
      if(!this.recordExists){
      await axios.post("/personales",datos).then(res=>{
         this.$swal("¡Felicidades! Has completado Datos personales, continua con Datos Escolares.");
         this.$emit("dame-personales","personales-lleno");
         
       });
       this.recordExists=true;
      }else{
      await  axios.put("/personales/"+this.datosPersonales.id,datos).then(res=>{
          this.$swal("¡Felicidades! Tus datos se actualizaron correctamente");
          this.$emit("dame-personales","personales-lleno");
        })
      }
      
    },
    async verSiExiste(){
     let peti = axios.get("/personales/"+this.recived)
  .then(res=>{
    this.aux=res.data;
    
  if(JSON.stringify(this.aux)!='[]'){
    this.recordExists=true;
    this.$emit("dame-personales","personales-lleno");
      this.datosPersonales=this.aux[0];

    }else{
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
  
  
},
destroy(){
  console.log("Bye");
}
}
</script>

<style>

</style>