import './bootstrap';
import { createApp } from 'vue';
import router from "./router";

import Index from './components/Index.vue';

const app = createApp({});
app.use(router)
app.component('index-component', Index);

app.mount('#app');
