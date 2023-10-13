<template>
  <div>
    <div>
        <form class="container" @submit.prevent="guardarFechas">
            <div class="row d-flex justify-content-center mt-200">
                <div class="row mt-3">
                    <div class="col-sm mt-3">
                        <span>Fecha</span>
                        <input type="date" class="form-control mt-3" v-model="fechaExamen.fecha">
                    </div>
                    <div class="col-sm mt-3">
                        <span>Hora</span>
                        <input type="time" class="form-control mt-3" v-model="fechaExamen.hora">
                    </div>
                    <div class="col-sm mt-3">
                        <span>Sede</span>
                        <!--<input type="text" class="form-control mt-3" v-model="fechaExamen.sede">-->
                        <select class="form-select mt-3" v-model="fechaExamen.sede">
                            <option value="Tecomatlán, Puebla">Tecomatlán, Puebla</option>
                        </select>
                    </div>
                </div>
                 <div class="d-grid gap-2 col-2 mx-auto mt-3">
                    <button class="btn btn-primary" v-if="!recordExists">Guardar</button>
                </div>
            </div>
        </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
    data(){
    return{
        fechaExamen:[
          {fecha:'', hora:'', sede:''}
          ],
          aux:[],
          recordExists:false
        }
    },
    methods:{
    guardarFechas(){
      const datos = {
        fecha:this.fechaExamen.fecha,
        hora:this.fechaExamen.hora,
        sede:this.fechaExamen.sede,
            };
        if(!this.recordExists){
            axios.post("/fechasExamen/save",datos).then(()=>{
            this.$swal("Fecha registrada");
            location.reload();
            });
        }
    },

},

}
</script>

<style>

</style>