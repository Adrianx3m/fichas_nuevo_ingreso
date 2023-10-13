<template>
  <div class="container">
    <div>
        <h5 class="mt-3">Comprobante de pago</h5>
        <p>Para continuar con el proceso de admisión deberás cubrir la cuota por derecho a Examen de Admisión.
            El monto es un total de $250.00 MXN. El cual debes depositar a la siguiente cuenta bancaria:
            Banco: Santander 
            CLABE: 7465757435573687 
            A nombre de Instituto Tecnológico de Tecomatlán.
        </p>
    </div>
    <div v-if="!aux">
      <form enctype="multipart/form-data" class="form-control" method="POST" action="/comprobantescool">
        <input type="file" class="mt-3" accept="application/pdf" name="urlpdf">
        <div class="d-grid gap-2 col-2 mx-auto mt-3">
              <input type="submit" class="btn btn-primary">
        </div>
      </form>
    </div>

    <div v-if="aux">
      <form enctype="multipart/form-data" class="form-control" method="POST" :action="ruta">
        <input type="file" class="mt-3" accept="application/pdf" name="urlpdf">
        <div class="d-grid gap-2 col-2 mx-auto mt-3">
              <input type="submit" class="btn btn-success" value="Actualizar">
        </div>
      </form>
    </div>

  </div>
  
</template>

<script>
import axios from 'axios';
export default {
  props:['recived'],
  data(){
      return{
          comprobantePago:[
          {comprobante_pago:"",verificado:""}
          ],
          aux:false,
          ruta:"/comprobantes/"+this.recived,
          recordExists:false
        }
    },
  methods:{
   async comprobarExistencia(){
      await axios.get(`/comprobantes/${this.recived}`).then(res=>{
        if(JSON.stringify(res.data)!='[]'){
        this.aux=true;
        }
      });
    }
  },
  created(){
    this.comprobarExistencia();
  }

}
</script>

<style>

</style>