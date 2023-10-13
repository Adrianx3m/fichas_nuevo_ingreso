/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import 'bootstrap-icons/font/bootstrap-icons.css'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import Vue from 'vue';
import Paginate from 'vuejs-paginate';
window.Vue = require('vue').default;
Vue.use(VueSweetalert2);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('guardar', require('./components/guardar.vue').default);
Vue.component('welcome',require('./components/welcome.vue').default);
Vue.component('solicitud',require('./components/solicitud.vue').default);
Vue.component('myfooter',require('./components/footerComponent.vue').default);
Vue.component('bienvenida',require('./components/vistaAdmin/bienvenida.vue').default);
Vue.component('aspirantes',require('./components/vistaAdmin/aspirantList.vue').default);
Vue.component('financieros',require('./components/vistaFinancieros/inicio.vue').default);
Vue.component('comprobantes',require('./components/vistaFinancieros/recibosList.vue').default);
Vue.component('comprobante',require('./components/datos/comprobantesPago.vue').default);
Vue.component('detalle',require('./components/vistaAdmin/aspirantDetail.vue').default);
Vue.component('detallitos',require('./components/vistaFinancieros/aspirantDetailFinancieros.vue').default);
Vue.component('configuracion',require('./components/vistaAdmin/configuraciones.vue').default);
Vue.component('Paginate',Paginate);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
const app2 = new Vue({
    el: '#foot',
});
