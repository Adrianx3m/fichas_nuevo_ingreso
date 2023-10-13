<template>
  <div>
    <div class="container mt-5">
        <h1 class="fw-bold">Fechas y horarios para examen de admisión</h1>
        <table class="table mt-3">
            <thead style="background-color:#2C3E50">
                <tr class="text-white">
                    <th scope="col">Num</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Sede</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="fecha in aux" :key="fecha.id">
                    <th scope="row">{{fecha.id}}</th>
                    <td>{{fecha.fecha}}</td>
                    <td>{{fecha.hora}}</td>
                    <td>{{fecha.sede}}</td>
                    <td>
                        <button class="btn btn-primary bi bi-pencil-square" v-on:click="showDetails(fecha.id,fecha.fecha,fecha.hora)"> </button>
                        <button class="btn btn-danger bi bi-trash3" v-on:click="deleteDate(fecha.id)"> </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <button v-bind:class="myclass" v-on:click="eventDate()">{{text}}</button>
        <button v-bind:class="class2" v-on:click="eventDatePassword()">{{text2}}</button>
    </div>
    <fechaExamen v-if="isActiveButton" />
    <ViewUsers v-if="isActiveButton2"/>
  </div>
</template>

<script>
import axios from 'axios';
import fechaExamen from './agregarFechas.vue'
import viewUsers from './viewUsers.vue'
import ViewUsers from './viewUsers.vue';
export default {
components:{ fechaExamen, ViewUsers },
comments:{viewUsers},
data(){
    return{
        text:"Agregar nueva fecha",
        myclass:"btn btn-success",
        text2:"Recuperar contraseñas",
        class2:"btn btn-success",
        isActiveButton:false,
        isActiveButton2:false,
        aux:[]
    }
},
methods:{
    eventDate(){
        this.isActiveButton=!this.isActiveButton;
        if(!this.isActiveButton){
            this.text="Agregar nueva fecha";
            this.myclass="btn btn-success";
        }else{
            this.text="Cancelar registro";
            this.myclass="btn btn-danger";
        }
    },
    eventDatePassword(){
        this.isActiveButton2=!this.isActiveButton2;
        if(!this.isActiveButton2){
            this.text2="Recuperar contraseñas";
            this.class2="btn btn-primary";
        }else{
            this.text2="Cancelar actualización";
            this.class2="btn btn-danger";
        }
    },
    showDetails(id,fecha,hora){
        this.$swal({
            title:"Editar fecha de Examen",
            html:`
            <div>
                <input type="date" class="form-control mt-3" id="myfecha" value="${fecha}" required>
                <input type="time" class="form-control mt-3" id="myhora" value="${hora}" required>
                <select class="form-select mt-3" id="mysede" required>
                    <option selected disabled></option>
                    <option value="Tecomatlán, Puebla" selected>Tecomatlán, Puebla</option>
                </select>
            </div>
            `,
            confirmButtonText: 'Actualizar',
            cancelButtonText: 'Cancelar',
            showCancelButton: true,
            focusConfirm: false,
        preConfirm: () => {
            const mydate = this.$swal.getPopup().querySelector('#myfecha').value;
            const mytime = this.$swal.getPopup().querySelector('#myhora').value;
            const tmysede = this.$swal.getPopup().querySelector('#mysede').value;
            if (!mydate || !mytime ||!tmysede) {
            Swal.showValidationMessage(`Por favor registra los datos`)
            }
            return { fechita: mydate, horita: mytime, sedecita:tmysede }
        }
                }).then((result) => {
                    axios.put(`/fechasExamen/update/${id}`,{fecha:result.value.fechita,hora:result.value.horita,sede:result.value.sedecita})
                    .then(res=>{
                        this.$swal("Aviso","Datos Actualizados exitosamente","success");
                        location.reload();
                    })
        
    });

    },
    deleteDate(id){
        this.$swal({
            title:"¿Estás seguro de eliminar esta fecha de examen?",
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
            showCancelButton: true,
        }).then((result) => {
            if(result.isConfirmed){
                    axios.delete(`/fechasExamen/delete/${id}`)
                    .then(res=>{
                        this.$swal("Aviso","Datos eliminados","success");
                        location.reload();
                    })
            }
        
    });
    }
},
    beforeCreate(){
    axios.get('/fechasExamen/show').then(res=>{
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