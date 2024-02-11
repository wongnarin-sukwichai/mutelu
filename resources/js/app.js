import './bootstrap';
import { createApp } from 'vue';

import App from './components/App.vue';
import store from './store/index';
import router from './router/index';
import CKEditor from '@ckeditor/ckeditor5-vue';
import AOS from 'aos'
import 'aos/dist/aos.css'

const app = createApp(App)

app.use(store)
app.use(router)
app.use(CKEditor)
app.use(AOS)
app.mount('#app')
