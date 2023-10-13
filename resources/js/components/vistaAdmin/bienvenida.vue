<template>
    <div style="position:relative; top:-4vh;">
                    <header class="container mt-5">
                      <div class="card">
                        <div class="card-header text-center">
                          <h1>Bienvenid@ {{usuario}}</h1>
                        </div>
                        <div class="card-body">
                          <center>
                            <img :src="imagen" :height="tamanio">
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
                tamanio:window.innerHeight*0.6
            }
        },
        methods:{
                
        },
        mounted() {
            
        }
    }
</script>