
require('./bootstrap');

window.Vue = require('vue').default;
import App from './App.vue';
import Carousel from './components/Carousel.vue';
import Home from './pages/Home.vue';

import BootstrapVue from 'bootstrap-vue';

Vue.use(BootstrapVue);



const app = new Vue({
    el: '#app',
    render: h => h(Home),
});
