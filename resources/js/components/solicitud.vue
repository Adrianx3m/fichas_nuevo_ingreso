<template>
  <div style="position:relative; top:-4vh;"> 
    <div id="registros">
      <div class="btn-group container nav mt-5">
        <button :class="btnPersonales" @click="cambio(1)">Datos Personales</button>
        <button :class="btnEscolares" @click="cambio(2)">Preparatoria de procedencia</button>
        <button :class="btnDomicilio" @click="cambio(3)">Datos de Domicilio</button>
        <button :class="btnPadres" @click="cambio(4)">Datos de los Padres</button>
        <button :class="btnSocioEconomicos" @click="cambio(5)">Datos socioeconómicos</button>
        <button :class="btnOpciones" @click="cambio(6)">Datos Solicitud</button>
        <button class="btn btn-primary" v-show="arrayProgreso.pago==true && auxcomprobante[0].verificado=='Pagado'" v-on:click="descargarFicha()">Descargar Ficha</button>
      </div>
       <div> 
        <datosPersonales :recived="usuario" v-show="mostrarPersonales" v-on:dame-personales="obtener"></datosPersonales>
        <datosEscolares :recived="usuario" v-show="mostrarEscolares" v-on:dame-escolares="obtener"></datosEscolares>
        <datoDomicilio :recived="usuario" v-show="mostrarDomicilio" v-on:dame-domicilio="obtener"></datoDomicilio>
        <datosPadres :recived="usuario" v-show="mostrarPadres" v-on:dame-padres="obtener"></datosPadres>
        <socioeconomicos :recived="usuario" v-show="mostrarSocioeconomicos" v-on:dame-socioeconomicos="obtener"></socioeconomicos>
        <opciones :recived="usuario" v-show="mostrarOpciones" v-on:dame-opciones="obtener"></opciones>
      </div>
    </div>
  </div>
</template>
<script>
import axios from 'axios';
import datoDomicilio from './datos/datos_domicilio.vue';
import datosEscolares from './datos/datos_escolares.vue';
import datosPersonales from './datos/datos_personales.vue';
import datosPadres from './datos/datos_padres.vue';
import socioeconomicos from './datos/datos_socioeconomicos.vue';
import opciones from './datos/datos_solicitud.vue';
export default {
  components: { datosPersonales, datosEscolares, datoDomicilio, datosPadres,socioeconomicos,opciones},
  props:['usuario'],
  data(){
    return{
      btnPersonales:"btn btn-blank",
      btnEscolares:"btn btn-blank",
      btnDomicilio:"btn btn-blank",
      btnPadres:"btn btn-blank",
      btnSocioEconomicos:"btn btn-blank",
      btnOpciones:"btn btn-blank",
      mostrarPersonales:true,
      mostrarEscolares:false,
      mostrarDomicilio:false,
      mostrarPadres:false,
      mostrarSocioeconomicos:false,
      mostrarOpciones:false,
      auxModal:false,
      auxcomprobante:[],
      arrayProgreso:{personales:false,escolares:false,domicilio:false,padres:false,socioeconomicos:false,opciones:false,pago:false}
    }
  },
  methods:{
    descargarFicha(){
      location="/fichaExamen";
    },
    cambio(id){
      switch(id){
        case 1: 
        this.mostrarPersonales=true;
        this.mostrarEscolares=false;
        this.mostrarDomicilio=false;
        this.mostrarPadres=false;
        this.mostrarSocioeconomicos=false;
        this.mostrarOpciones=false;
        break;
        case 2: 
        this.mostrarPersonales=false;
        this.mostrarEscolares=true;
        this.mostrarDomicilio=false;
        this.mostrarPadres=false;
        this.mostrarSocioeconomicos=false;
        this.mostrarOpciones=false;
        break;
        case 3: 
        this.mostrarPersonales=false;
        this.mostrarEscolares=false;
        this.mostrarDomicilio=true;
        this.mostrarPadres=false;
        this.mostrarSocioeconomicos=false;
        this.mostrarOpciones=false;
        break;
        case 4: 
        this.mostrarPersonales=false;
        this.mostrarEscolares=false;
        this.mostrarDomicilio=false;
        this.mostrarPadres=true;
        this.mostrarSocioeconomicos=false;
        this.mostrarOpciones=false;
        break;
        case 5: 
        this.mostrarPersonales=false;
        this.mostrarEscolares=false;
        this.mostrarDomicilio=false;
        this.mostrarPadres=false;
        this.mostrarSocioeconomicos=true;
        this.mostrarOpciones=false;
        break;
        case 6: 
        this.mostrarPersonales=false;
        this.mostrarEscolares=false;
        this.mostrarDomicilio=false;
        this.mostrarPadres=false;
        this.mostrarSocioeconomicos=false;
        this.mostrarOpciones=true;
        break;
      }
    },
    obtener(classname){
      if(classname==="personales-lleno"){
        this.btnPersonales="btn btn-success";
        this.arrayProgreso.personales=true;
      }
      if(classname==="escolares-lleno"){
        this.btnEscolares="btn btn-success";
        this.arrayProgreso.escolares=true;
      }
      if(classname==="domicilio-lleno"){
        this.btnDomicilio="btn btn-success";
        this.arrayProgreso.domicilio=true;
      }
      if(classname==="padres-lleno"){
        this.btnPadres="btn btn-success";
        this.arrayProgreso.padres=true;
      }
      if(classname==="socioeconomicos-lleno"){
        this.btnSocioEconomicos="btn btn-success";
        this.arrayProgreso.socioeconomicos=true;
      }
      if(classname==="opciones-lleno"){
        this.btnOpciones="btn btn-success";
        this.arrayProgreso.opciones=true;
      }
              this.verProgreso();

    },
    verProgreso(){
     if(!this.arrayProgreso.personales){
       this.cambio(1);
     }else if(!this.arrayProgreso.escolares){
       this.cambio(2);
     }else if(!this.arrayProgreso.domicilio){
       this.cambio(3);
     }else if(!this.arrayProgreso.padres){
       this.cambio(4);
     }else if(!this.arrayProgreso.socioeconomicos){
       this.cambio(5);
     }else if(!this.arrayProgreso.opciones){
       this.cambio(6);
     }
     else if(this.arrayProgreso.personales && this.arrayProgreso.escolares && this.arrayProgreso.domicilio && this.arrayProgreso.padres && this.arrayProgreso.socioeconomicos && this.arrayProgreso.opciones){
        this.auxModal=true;
        if(this.auxModal){
      

             if(this.auxcomprobante=="[]"){
      this.$swal({
          html:`<div>
          <h1>¡Felicidades! Has completado tu registro de solicitud para el examen de admisión al TecNM Campus Tecomatlán</h1>
          <h5>Por favor realiza el pago de derecho a examen para terminar con el proceso de solicitud</h5>
          </div>`,
          showCancelButton:true,
          confirmButtonText:"Pagar y subir comprobante",
          cancelButtonText:"No, Regresar al registro",
        }).then((result) => {
  if (result.isConfirmed) {
    window.location="/comprobantes";
  }else{
    this.auxModal=false;
  }
});
      }else{
        if(this.auxcomprobante[0].verificado=="Pagado"){

        this.$swal({
          html:`<div>
          <h1>¡Felicidades! Has completado tu registro de solicitud para el examen de admisión al TecNM Campus Tecomatlán</h1>
          <h5>¿Desea descargar la ficha de examen?</h5>
          </div>`,
          showCancelButton:true,
          confirmButtonText:"Si, Descargar",
          cancelButtonText:"No, Regresar al registro",
        }).then((result) => {
  if (result.isConfirmed) {
    window.location="/ficha-aspirante";
  }else{
    this.auxModal=false;
  }
});

        }else if(this.auxcomprobante[0].verificado=="Por Verificar"){
          this.$swal("Aviso","Tu comprobante se encuentra en proceso de verificación, te pedimos \"Ser paciente.\" Ingresa al sistema en 24 horas para descargar tu ficha","warning");
        }else if(this.auxcomprobante[0].verificado=="Rechazado"){
          this.$swal("Aviso","Tu comprobante ha sido rechazado, te pedimos que reenvies tu comprobante en formato PDF con calidad legible para que no haya problemas al verificar","info").then((res)=>{
              if(res.isConfirmed){
                location="/comprobantes";
              }
          });
        }

      }


     } // fin if auxModal
     }

     
    }
  },
  async created(){
   await axios.get(`/comprobantes/${this.usuario}`).then(res=>{
      this.auxcomprobante=res.data;
      if(JSON.stringify(this.auxcomprobante)!='[]'){
        this.arrayProgreso.pago=true;
      }
    });
  },
  updated(){
   
  }
}
</script>
<style scoped>

</style>