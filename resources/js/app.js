import './bootstrap';
import { createApp } from 'vue';



/** vue router */
import router from "./routers/index";

import website from '../js/components/App.vue'

/** app initial */
const app = createApp({
    data() {
        return {
            baseurl: laravel.baseurl,
        }
    },
});

// 
app.component('website', website)
app.use(router)
app.mount('#app');

