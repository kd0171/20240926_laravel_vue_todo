import { createApp } from 'vue'
import App from './App.vue'
import axios from 'axios';

axios.defaults.baseURL = 'http://localhost:8000'; // Laravelのローカルサーバー

createApp(App).mount('#app')
