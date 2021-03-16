require('./bootstrap');
require('alpinejs');

import { createApp } from 'vue';
import App from "./App.vue";
import router from './router';
import VueAxios from 'vue-axios';
import store from "./store/store";

createApp(App).use(router, VueAxios, store).mount('#app');