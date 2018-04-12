
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import axios from 'axios';
require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
 
window.Vue.use(VueRouter);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 import Advertisement from './components/Advertisement.vue';


Vue.component('Login', require('./components/Login.vue'));
Vue.component('Register', require('./components/Register.vue'));
Vue.component('userdashboard', require('./components/UserDashboard.vue'));

const routes = [
   
    {path: '/Advertisement', component: Advertisement, name: 'Advertisement'},
   
    

   
]
const router = new VueRouter({ routes })
 
const app = new Vue({ router }).$mount('#app')
