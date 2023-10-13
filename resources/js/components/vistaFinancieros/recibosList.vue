<template>
<div class="container mt-3" style="max-width: 92%;">
  <h1 class="fw-bold mt-5">Lista de Aspirantes</h1>
  <table class="table mt-3">
    <thead class="table" style="background-color:#2C3E50">
      <tr class="text-white">
        <th scope="col">#</th>
        <th scope="col" class="text-center">Nombre</th>
        <th scope="col" class="text-center">Estatus</th>
        <th scope="col" class="text-center">Carrera</th>
        <th scope="col" class="text-center">Correo</th>
        <th scope="col" class="text-center">Teléfono</th>
        <th scope="col" class="text-center">Recibo</th>
        <th scope="col" class="text-center">Ver detalle</th>
        <th scope="col" class="text-center">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="asp in aux" :key="asp.id">
        <th scope="row">{{asp.id_aspirante}}</th>
        <td>{{asp.nombre}} {{asp.a_paterno}} {{asp.a_materno}}</td>
        <td> 
          <span class="bg-warning text-white p-2 bi bi-three-dots" v-if="asp.verificado=='Por Verificar'"> {{asp.verificado}}</span>
          <span class="bg-success text-white p-2 bi bi-check2-circle" v-else-if="asp.verificado=='Pagado'"> {{asp.verificado}}</span>
          <span class="bg-danger text-white p-2 bi bi-x-circle" v-else-if="asp.verificado=='Rechazado'"> {{asp.verificado}}</span>

        </td>
        <td >{{asp.primera_opcion}}</td>
        <td ><a :href="'mailto:'+asp.correo">{{asp.correo}}</a></td>
        <td >{{asp.telefono}}</td>
        <td>
          <button class="btn btn-primary gbi bi-file-earmark" v-on:click="abrirTicket(asp.id_user)" > Ticket</button> 
        </td>
        <td>
           <a class="btn bi bi-eye text-white" style="background-color:blueviolet;" :href="'/detalleAspirante/'+asp.id_user"> </a>
        </td>
        <td>
          <button class="btn btn-success bi bi-check2-circle" href="" v-if="asp.comprobante_pago!=null" v-on:click="verificar(asp.id_comprobante,'Pagado',asp.id_user); asp.verificado='Pagado';"> </button>
          <button class="btn btn-danger bi bi-x-circle" href="" v-if="asp.comprobante_pago!=null" v-on:click="verificar(asp.id_comprobante,'Rechazado',asp.id_user); asp.verificado='Rechazado';"> </button>
        </td>
      </tr>
    </tbody>
  </table>
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
    verificar(id,valor,id_user){
        axios.put('/updateListComprobantes/'+id,{verificado:valor, id_user:id_user});
      },
      abrirTicket(id){
        window.open(`/pdf/comprobante-pago_${id}.pdf`);
      }   

    },
  
beforeCreate(){
    axios.get('/listComprobantes').then(res=>{
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