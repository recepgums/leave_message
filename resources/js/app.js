
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('moment');
window.moment = require('moment/moment');
window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))
import Content from "./components/Content";
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('privateroom', require('./components/PrivateRoom.vue'));
/*Vue.component('quiz', require('./components/quiz.vue'));*/
import privateroom from './components/PrivateRoom.vue' //Importing
import ExampleComponent from './components/ExampleComponent.vue' //Importing
import BootstrapVue from 'bootstrap-vue' //Importing
import moment from 'moment'


Vue.prototype.moment = moment;


Vue.use(BootstrapVue) // Telling Vue to use this in whole application
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components:{ExampleComponent,privateroom}
});

/*

const quiz = new Vue({
    el: '#quiz',
});
*/
