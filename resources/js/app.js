require('./bootstrap');
require('alpinejs');

import { createApp } from 'vue';
import App from "./App.vue";
import router from './router';
import VueAxios from 'vue-axios';

createApp(App).use(router, VueAxios).mount('#app');