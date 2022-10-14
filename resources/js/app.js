require ('./bootstrap')

import Vue from 'vue'

import { createApp} from 'vue';

import App from './App.vue';

const app = createApp (App);

//app.component('Datepicker', Datepicker);

app.mount('#app');


