<template>
<div>
  <div class="container" style="max-width: 90%">
  <h1 class="fw-bold mt-5">Lista de Aspirantes</h1>
  <div style="position: relative; margin-left: 87%;">
    <a href="/excel" class="btn btn-success bi bi-cloud-arrow-down" > Descargar Excel</a>
  </div>
  <table class="table mt-3">
    <thead style="background-color:#2C3E50">
      <tr class="text-white">
        <th scope="col">#</th>
        <th scope="col" >Nombre</th>
        <th scope="col" >Estatus</th>
        <th scope="col" >Carrera</th>
        <th scope="col" >Correo</th>
        <th scope="col" >Teléfono</th>
        <th scope="col" >Ficha</th>
        <th scope="col" >Detalle</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="asp in aux" :key="asp.id">
        <th scope="row">{{asp.id_aspirante}}</th>
        <td>{{asp.nombre}} {{asp.a_paterno}} {{asp.a_materno}}</td>
        <td> 
          <span class="bg-warning text-white p-2 bi bi-three-dots" v-if="asp.primera_opcion==null && asp.correo==null &&asp.telefono==null"> En Proceso</span>
          <span class="bg-success text-white p-2 bi bi-check-circle" v-else> Completado</span>
        </td>
        <td >{{asp.primera_opcion}}</td>
        <td ><a :href="'mailto:'+asp.email">{{asp.email}}</a></td>
        <td >{{asp.telefono}}</td>
        <td>
          <a v-if="asp.primera_opcion==null &&asp.telefono==null"></a>
          <button class="btn btn-primary gbi bi-file-earmark" v-on:click="abrirFicha(asp.user_num)" v-else> </button>
          <a href=""></a>          
        </td>
        <td>
          <a class="btn bi bi-eye text-white" style="background-color:blueviolet;" :href="'/detalle-aspirante/'+asp.user_num"> </a>
        </td>
      </tr>
    </tbody>
  </table>
  <paginate
  :page-count="20"
  :prev-text="'Prev'"
  :next-text="'Next'"
  :container-class="'pagination'"
  :page-class="'page-item'"
  :page-link-class="'page-link'"
  :prev-class="'page-item'"
  :prev-link-class="'page-link'"
  :next-class="'page-item'"
  :next-link-class="'page-link'"
  >
</paginate>
  </div>
</div>


</template>

<script>
import axios from 'axios';
export default {
    data(){
        return{
            aux:[],
            statusUsers:[]
        }
    },
    methods:{
      statusExist(id_use){
       axios.get('/consultasql/'+id_use).then(res=>{
          if(JSON.stringify(res.data)!="[]"){
            const arr={status:1};
        this.statusUsers.push(arr);
          }else{
            const arr={status:0};
            this.statusUsers.push(arr);
          }        
    });
      },
      abrirFicha(id){
        window.open('/ficha-aspirante/'+id);
      }
    },
beforeCreate(){
    axios.get('/consultasql').then(res=>{
        this.aux=res.data;
      /**   for(var i=0; i<=this.aux.length-1; i++){
          this.statusExist(this.aux[i].user_num);
        }*/
    }); 
},
obtenerCorreos(){
    axios.get('/correo').then(response=>{
      this.auxCorreo=response.data;
    });
}

}
</script>

<style>

</style>