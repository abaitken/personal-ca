import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap'
import './assets/main.css'

import { createApp } from 'vue'

// import VueMeta from 'vue-meta'

// Vue.use(VueMeta, {
//   // optional pluginOptions
//   refreshOnceOnNavigation: true,
// })

import PageTitle from './components/PageTitle.vue'

import App from './App.vue'
const app = createApp(App)

app.component('PageTitle', PageTitle)

import router from './router'
app.use(router)

app.mount('#app')
