import { createApp } from 'vue';
import App from './App.vue';

import './css/global.css';

import 'vuetify/styles'
import { createVuetify } from 'vuetify';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';

import { mdi } from 'vuetify/iconsets/mdi'
import '@mdi/font/css/materialdesignicons.css' // Ensure you are 

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

const vuetify = createVuetify({
    components,
    directives,
    icons: {
        sets: {
            mdi,
        },
    },
});

import router from './router/router';

createApp(App).use(vuetify).use(router).use(VueSweetalert2).mount('#app');