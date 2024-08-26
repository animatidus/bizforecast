import './bootstrap';
import { createApp } from 'vue';

import GeoapifyMap from './App.vue';

//const app = createApp({});
//app.component('forecast-component', ForecastComponent);
//app.component('geoapify-map', GeoapifyMap);
//app.mount('#app');

createApp(GeoapifyMap).mount('#app');
