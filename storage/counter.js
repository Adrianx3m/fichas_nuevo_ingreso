import { defineStore } from 'pinia';

export const useCounterStore = defineStore('counter', {
    state: () => {
      return { 
        btnPersonales:"btn btn-blank",
        btnEscolares:"btn btn-blank",
        btnDomicilio:"btn btn-blank",
        btnPadres:"btn btn-blank",
        aux:[]
       }
    },
    // could also be defined as
    // state: () => ({ count: 0 })
    actions: {
        recolectar(nombre){
            if(nombre==="afirmativo"){
              this.btnPersonales="btn btn-secondary";
            }
          },
          llamarDatosPersonales(cliente){
            let peti = axios.get("/personales/"+cliente)
            .then(res=>{
              this.aux=res.data;
              
            if(JSON.stringify(this.aux)!='[]'){
              this.btnPersonales="btn btn-secondary";
              }
            });
            
          }
    },
  })