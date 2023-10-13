<template>
    <div style="position:relative; top:-4vh;">
                    <header class="container mt-5">
                      <div class="card">
                        <div class="card-header text-center">
                          <h1>Bienvenid@ {{usuario}}</h1>
                        </div>
                        <div class="card-body">
                          <center>
                            <a :href="info"><img :src="imagen" :height="tamanio"></a>
                          </center>
                        </div>
                      </div>
                        
                         
                    </header>  
    </div>
</template>
<script>
import axios from 'axios';
    export default {
        props:['usuario','id'],
        data(){
            return{
                carrera:null,
                imagen:"images/ITT.jpg",
                tamanio:window.innerHeight*0.6,
                info:"https://www.tecomatlan.tecnm.mx/mision-y-vision/"
            }
        },
        methods:{
             llamarALaAPI(){
                 axios.get('/opciones/'+this.id)
                .then(res=>{
                  this.carrera=res.data[0].primera_opcion;
                  switch(this.carrera){
                  case "Ingeniería en Agronomía": 
                  this.imagen='images/agronomia.png'; 
                  this.info="https://www.tecomatlan.tecnm.mx/ingenieria-en-agronomia/";
                  break;
                  case "Ingeniería en Gestión Empresarial": 
                  this.imagen='images/gestion.png';
                  this.info="https://www.tecomatlan.tecnm.mx/ingenieria-en-gestion-empresarial/"; 
                  break;
                  case "Ingeniería en Sistemas Computacionales": 
                  this.imagen='images/sistemas.png'; 
                  this.info="https://www.tecomatlan.tecnm.mx/ingenieria-en-sistemas-computacionales/";
                  break;
                }
                });
                
            }
        },
        mounted() {
            this.llamarALaAPI();
        }
    }
</script>