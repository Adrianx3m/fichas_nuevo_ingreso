<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><h1>Datos Personales del Aspirante</h1></div>
                    <form v-on:submit.prevent="">
                        <div class="container">
                            <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre" v-model="nombre">
                            <input type="text" name="a_paterno" class="form-control" placeholder="Apellido paterno" v-model="a_paterno">
                            <input type="text" name="a_materno" class="form-control" placeholder="Apellido materno" v-model="a_materno">
                            <label v-for="op in datosGenero" :key="op.valor">{{op.texto}}<input type="radio" name="genero" :value="op.valor" v-model="genero" @change="abs()"></label>
                            
                            <select name="nacionalidad" class="form-control" v-model="nacionalidad">
                                <option v-for="pais in datosNacionalidad" :key="pais">{{pais}}</option>    
                            </select>
                            <input type="date" name="fecha_nac" class="form-control" v-model="fecha_nac">
                            <input type="text" name="curp" class="form-control" placeholder="Ingresa tu CURP" v-model="curp">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                nombre:"",
                a_paterno:"",
                a_materno:"",
                genero:"",
                nacionalidad:"",
                fecha_nac:"",
                curp:"",
                datosNacionalidad:[
                    'Selecciona tu nacionalidad',
                                "Alemania",
                                "Argentina",
                                "Brasil",
                                "Canada",
                                "Costa Rica",
                                "España",
                                "Estados Unidos",
                               "México"
                ],
                datosGenero:[{texto:"Masculino",valor:"M"},{texto:"Femenino",valor:"F"}]

            }
        },
        methods:{
            async llamarALaAPI(){
                await fetch('http://localhost:8000/saludo')
                .then(response => response.json())
                .then(data=>this.registros=data);
            },
            abs(){
                console.log(this.genero);
            }
        },
        mounted() {
            this.llamarALaAPI();
        }
    }
</script>
