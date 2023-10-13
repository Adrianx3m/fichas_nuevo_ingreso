<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h1>Bienvenido {{nombre}}</h1></div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Nombre</td>
                                <td>Apellido Paterno</td>
                                <td>Apellido MAterno</td>
                                <td>Género</td>
                                <td>Nacionalidad</td>
                                <td>Fecha de Nacimiento</td>
                                <td>CURP</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="alumno in registros" :key="alumno.id">
                                <td>{{alumno.id}}</td>
                                <td>{{alumno.nombre}}</td>
                                <td>{{alumno.a_paterno}}</td>
                                <td>{{alumno.a_materno}}</td>
                                <td>{{alumno.genero}}</td>
                                <td>{{alumno.nacionalidad}}</td>
                                <td>{{alumno.fecha_nac}}</td>
                                <td>{{alumno.curp}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['nombre'],
        data(){
            return{
                registros:[]
            }
        },
        methods:{
            async llamarALaAPI(){
                await fetch('http://localhost:8000/saludo')
                .then(response => response.json())
                .then(data=>this.registros=data);
            }
        },
        mounted() {
            this.llamarALaAPI();
        }
    }
</script>
