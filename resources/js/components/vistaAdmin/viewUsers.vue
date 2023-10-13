<template>
  <div>
    <div class="container">
        <h1 class="container fw-bold mt-5">Lista de usuarios registrados en el sistema</h1>
        <table class="table mt-3">
            <thead style="background-color:darkslateblue">
                <tr class="text-white">
                    <th scope="col">Num</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Modificar contraseña</th>
                </tr>
            </thead>
            <tbody v-for="use in aux" :key="use.id">
                <tr>
                    <th scope="row">{{use.id}}</th>
                    <td>{{use.usuario}}</td>
                    <td>{{use.correo}}</td>
                    <td class="text-center">
                        <button class="btn btn-primary bi bi-pencil-square" v-on:click="showSwal(use.id,use.usuario)"> </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
export default {
    data(){
        return{
            aux:[],
            statusUsers:[]
        }
    },
    methods:{ 

        showSwal(id,user){
            this.$swal({
                title:"Cambio de contraseña usuario: "+user,
                input:"text",
                inputAttributes: {
                     autocapitalize: 'off'
                    },
                confirmButtonText: 'Actualizar',
                cancelButtonText: 'Cancelar',
                showCancelButton: true,
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    return axios.put(`/updateUsers/${id}`,{password:login})
                    .then(res=>{this.$swal("Aviso","Contraseña Actualizada","success")})
                }
            });
        }

    },
    beforeMount(){
    axios.get('/usuarios').then(res=>{
        this.aux=res.data;
      /**   for(var i=0; i<=this.aux.length-1; i++){
          this.statusExist(this.aux[i].user_num);
        }*/
    });
    
},

}
</script>

<style>

</style>