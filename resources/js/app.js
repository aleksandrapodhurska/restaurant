import './bootstrap';
import { createApp } from 'vue';
import VCalendar from 'v-calendar';
import 'v-calendar/dist/style.css';
import Welcome from '../js/components/welcome.vue';

const app = createApp({})
app.component('welcome', Welcome)
app.use(VCalendar, {})

app.mount('#app')