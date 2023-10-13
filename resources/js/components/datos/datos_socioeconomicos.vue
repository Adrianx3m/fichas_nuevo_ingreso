<template>
<section>
    <div>
        <form class="container" @submit.prevent="guardarSocioeconomicos">
            <div class="row d-flex justify-content-center mt-200">
                <h3 class="mt-3 fw-bold" style="cursor: pointer">Datos socioeconómicos</h3>
                <div class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
                    <h5 class="fw-bold" style="font-size: 20px;">Nivel máximo de estudios alcanzados por tus padres aunque hayan fallecido. Selecciona una opción</h5>
                    <div class="col-sm">   
                        <span class="mt-3">Grado de estudios alcanzados por el padre</span>
                        <br >
                        <select v-model="datosSocioeconomicos.estudios_padre" class="form-select mt-3" aria-label="Default select example" required>
                        
                        <option v-for="x in nivel" :key="x" class="form-control">{{x}}</option>
                        </select>
                    </div>
                    <div class="col-sm">
                        <span class="mt-3">Grado de estudios alcanzados por la madre</span>
                        <select v-model="datosSocioeconomicos.estudios_madre" class="form-select mt-3" required>
                        <option v-for="x in nivel" :key="x">{{x}}</option>
                        </select>
                    </div> 
                <!--{{datosSocioeconomicos.estudios_padre}}{{datosSocioeconomicos.estudios_madre}}-->
                </div>
                <div class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
                     <h5 class="mt-3 fw-bold" style="font-size:20px;">Ocupación o trabajo de tus padres</h5>
                    <div class="col-sm">
                        <span>Ocupación del padre</span>
                        <select v-model="datosSocioeconomicos.ocupacion_padre" name="ocupacion_padre" class="form-select mt-3" required>
                            <option v-for="x in ocupacion_padre" :key="x">{{x}}</option>
                        </select>
                    </div>
                    <div class="col-sm">
                        <span>Ocupación de la madre</span>
                        <select v-model="datosSocioeconomicos.ocupacion_madre" name="ocupacion_madre" class="form-select mt-3" required>
                            <option v-for="x in ocupacion_madre" :key="x">{{x}}</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
                    <div class="col-sm mt-3">
                        <span class="mt-3">¿Con quién vives actualmente?</span>
                        <select v-model="datosSocioeconomicos.vive_con" class="form-select mt-3" required>
                            <option hidden>Selecciona una opción</option>
                            <option v-for="x in vives" :key="x">{{x}}</option>
                        </select>
                    </div>
                    <div class="col-sm mt-3">
                        <span class="mt-3">¿De quién dependes economicámente?</span>
                        <select name="dependencia_economica" v-model="datosSocioeconomicos.depende" class="form-select mt-3" required>
                            <option v-for="x in dependes" :key="x">{{x}}</option>
                        </select>
                    </div>
                    <div class="col-sm mt-3">
                        <span class="mt-3">Ingreso mensual</span>
                        <input type="number" class="form-control mt-3" name="ingreso" placeholder="¿Cuál es el ingreso mensual promedio?" v-model="datosSocioeconomicos.ingreso_mensual" required>
                    </div>
                </div>
                <div class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
                    <div class="col-sm mt-3">
                        <span class="mt-3">
                            ¿Cuántas personas dependen economicámente de tu {{datosSocioeconomicos.depende}}?
                        </span>
                        <input type="number" name="personas_dependen" placeholder="¿Cuántas personas dependen del jefe del hogar?" v-model="datosSocioeconomicos.num_dependen" class="form-control mt-3" required>
                    </div>
                    <div class="col-sm mt-3">
                        <span class="mt-3">La casa donde vives es:</span>
                        <select v-model="datosSocioeconomicos.casa" class="form-select mt-3" required>
                            <option v-for="home in perteneceCasa" :key="home">{{home}}</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
                    <div class="col-sm mt-3">
                        <span class="mt-3">
                            ¿Cuántos cuartos tiene la casa donde vives?
                        </span>
                        <input type="number" v-model="datosSocioeconomicos.cuartos" class="form-control mt-3" required>
                    </div>
                    <div class="col-sm mt-3">
                        <span class="mt-3">
                            ¿Cuántas personas viven en la casa donde habitas?
                        </span>
                        <input type="number" v-model="datosSocioeconomicos.num_habitantes" class="form-control mt-3" required>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
                        ¿Tu familia pertenece al programa del Bienestar?
                    </span>
                    <div class="mt-3">
                    <label>Sí: <input type="radio" v-model="datosSocioeconomicos.bienestar" value="Si" name="bienestar" class="" required></label>
                    <label>No: <input type="radio" v-model="datosSocioeconomicos.bienestar" value="No" name="bienestar" class="" required></label>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
                        ¿Cuentas con algun tipo de beca?
                    </span>
                    <div class="mt-3">
                    <label>Sí: <input type="radio" v-model="datosSocioeconomicos.tiene_beca" value="Si" name="beca" class="" required></label>
                    <label>No: <input type="radio" v-model="datosSocioeconomicos.tiene_beca" value="No" name="beca" class="" required></label>
                    </div>
                </div>
                <div class="mt-3" v-if="datosSocioeconomicos.tiene_beca=='Si'">
                    <span class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">¿Quién te otorgo la beca?</span>
                    <input type="text" class="form-control mt-3" v-model="datosSocioeconomicos.beca_otorgo">
                </div>
                <div class="mt-3">
                    <span class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
                        ¿Tienes alguna capacidad diferente?
                    </span>
                    <div class="mt-3">
                    <label>Sí: <input type="radio" v-model="datosSocioeconomicos.capacidad_diferente" value="Si" name="capacidad" class="" required></label>
                    <label>No: <input type="radio" v-model="datosSocioeconomicos.capacidad_diferente" value="No" name="capacidad" class="" required></label>
                    </div>
                </div>
                <div class="mt-3" v-if="datosSocioeconomicos.capacidad_diferente=='Si'">
                    <span class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">¿Cuál?</span>
                    <input type="text" class="form-control mt-3" v-model="datosSocioeconomicos.cual_capacidad">
                </div>
                
                <div class="mt-3">
                    <h5 class="fw-bold">En caso de emergencia ¿con quién nos comunicamos?</h5>
                    <div class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
                        <label for="contacto_emergencia" class="mt-3">Nombre del contacto</label>
                        <div class="col-sm"><input type="text" class="form-control mt-3" placeholder="Nombre completo de tu contacto de emergencia" name="contacto_emergencia" v-model="datosSocioeconomicos.contacto_emergencia" required></div>
                        <div class="col-sm"><input type="number" class="form-control mt-3" placeholder="Número de teléfono" name="telefono_emergencia" v-model="datosSocioeconomicos.telefono_emergencia" required maxlength="10"></div>
                    </div>
                    <div class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
                        <label for="calle_contacto_emergencia" class="mt-3">Dirección de tu contacto de emergencia</label>
                        <div class="col-sm"><input type="text" class="form-control mt-3" placeholder="Calle" name="calle_contacto_emergencia" v-model="datosSocioeconomicos.calle_contacto_emergencia" required></div>
                        <div class="col-sm"><input type="number" class="form-control mt-3" placeholder="Código postal" name="codigo_postal" v-model="datosSocioeconomicos.codigo_postal" required maxlength="5"></div>
                    </div>
                    <div class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
                        <div class="col-sm"><input type="text" class="form-control mt-3" placeholder="Colonia" name="colonia" v-model="datosSocioeconomicos.colonia" required></div>
                        <div class="col-sm"><input type="text" class="form-control mt-3" placeholder="Municipio" name="municipio" v-model="datosSocioeconomicos.municipio" required></div>
                        <div class="col-sm"><input type="text" class="form-control mt-3" placeholder="Estado" name="estado" v-model="datosSocioeconomicos.estado" required></div>
                    </div>
                    <div class="row mt-3 fw-bold" style="font-size:18px; font-family:Arial, Helvetica, sans-serif;">
                        <label for="lugar_trabajo">Lugar de trabajo de tu contacto de emergencia</label>
                        <div class="col-sm"><input type="text" class="form-control mt-3" placeholder="Lugar de trabajo" name="lugar_trabajo" v-model="datosSocioeconomicos.lugar_trabajo" required></div>
                        <div class="col-sm"><input type="number" class="form-control mt-3" placeholder="Teléfono de trabajo" name="telefono_trabajo" v-model="datosSocioeconomicos.telefono_trabajo" required maxlength="10"></div>
                    </div>
                </div>
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
export default {
    props:['recived'],
    data(){
        return{
            datosSocioeconomicos:[
                {estudios_padre:"", estudios_madre:"", vive_con:"", ocupacion_padre:"", ocupacion_madre:"", depende:"", 
                ingreso_mensual:"", casa:"", cuartos:"", num_habitantes:"", num_dependen:"", tiene_beca:"", beca_otorgo:"",
                contacto_emergencia:"", calle_contacto_emergencia:"", colonia:"", codigo_postal:"", municipio:"", estado:"",
                telefono_emergencia:"", lugar_trabajo:"", telefono_trabajo:"", capacidad_diferente:"", cual_capacidad:"", bienestar:""}
            ],
            nivel:['No asistio a la escuela','Preescolar','Primaria','Secundaria','Bachillerato','Licenciatura','Maestria','Doctorado'],
            vives:['Ambos padres', 'Padre', 'Madre', 'Abuelos', 'Esposo(a)', 'Conyuge', 'Hermanos','Tíos', 'Otro familiar', 'Solo'],
            ocupacion_padre:['Técnico', 'Maestro', 'Profesionista', 'Doctor', 'Ingeniero', 'Abogado', 'Obrero', 'Comercio', 'Empresario', 'Campesino', 'Ganadero', 'Agricultor', 'No trabaja'],
            ocupacion_madre:['Maestra', 'Profesionista', 'Doctora', 'Enfermera', 'Ingeniera', 'Comercio', 'Ama de casa', 'No trabaja'],
            dependes:['Padre', 'Madre', 'Conyuge', 'Hermanos', 'Otro familiar', 'Trabajo'],
            perteneceCasa:['Propia','Prestada','Rentada'],
            aux:[],
            recordExists:false
        }
    },
    methods:{
    guardarSocioeconomicos(){
      const datos = {
        estudios_padre:this.datosSocioeconomicos.estudios_padre, 
        estudios_madre:this.datosSocioeconomicos.estudios_madre, 
        vive_con:this.datosSocioeconomicos.vive_con, 
        ocupacion_padre:this.datosSocioeconomicos.ocupacion_padre, 
        ocupacion_madre:this.datosSocioeconomicos.ocupacion_madre, 
        depende:this.datosSocioeconomicos.depende, 
                ingreso_mensual:this.datosSocioeconomicos.ingreso_mensual, 
                casa:this.datosSocioeconomicos.casa, 
                cuartos:this.datosSocioeconomicos.cuartos, 
                num_habitantes:this.datosSocioeconomicos.num_habitantes, 
                num_dependen:this.datosSocioeconomicos.num_dependen, 
                tiene_beca:this.datosSocioeconomicos.tiene_beca, 
                beca_otorgo:this.datosSocioeconomicos.beca_otorgo,
                contacto_emergencia:this.datosSocioeconomicos.contacto_emergencia, 
                calle_contacto_emergencia:this.datosSocioeconomicos.calle_contacto_emergencia, 
                colonia:this.datosSocioeconomicos.colonia, 
                codigo_postal:this.datosSocioeconomicos.codigo_postal, 
                municipio:this.datosSocioeconomicos.municipio, 
                estado:this.datosSocioeconomicos.estado,
                telefono_emergencia:this.datosSocioeconomicos.telefono_emergencia, 
                lugar_trabajo:this.datosSocioeconomicos.lugar_trabajo, 
                telefono_trabajo:this.datosSocioeconomicos.telefono_trabajo, 
                capacidad_diferente:this.datosSocioeconomicos.capacidad_diferente, 
                cual_capacidad:this.datosSocioeconomicos.cual_capacidad, 
                bienestar:this.datosSocioeconomicos.bienestar,
        id_user:this.recived
        };
      if(!this.recordExists){
       axios.post("/socioeconomicos",datos);
       this.$emit("dame-socioeconomicos","socioeconomicos-lleno");
       this.recordExists=true;
      }else{
        axios.put("/socioeconomicos/"+this.datosSocioeconomicos.id,datos).then(res=>{
            this.$emit("dame-socioeconomicos","socioeconomicos-lleno");
          console.log(res);
        })
      }
      this.$swal("Datos Guardados");
    },
    async verSiExiste(){
     let peti = axios.get("/socioeconomicos/"+this.recived)
    .then(res=>{
      this.aux=res.data;
      
    if(JSON.stringify(this.aux)!='[]'){
      this.recordExists=true;
      this.$emit("dame-socioeconomicos","socioeconomicos-lleno");
            this.datosSocioeconomicos=this.aux[0];

      }else{}
      });
    
      }
    },
    async mounted(){
        var $vm = this;
        await this.verSiExiste();
        
    },
    updated(){
        if(this.datosSocioeconomicos.capacidad_diferente=='No'){
            this.datosSocioeconomicos.cual_capacidad="Ninguna";
        }
        if(this.datosSocioeconomicos.tiene_beca=='No'){
            this.datosSocioeconomicos.beca_otorgo="Ninguno";
        }
    }

}
</script>

<style>

</style>