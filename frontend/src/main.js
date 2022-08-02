import Vue from 'vue'
import App from './App.vue'
import vuetify from './plugins/vuetify'
import custom_axios from '@/plugins/axios'
import VueAxios from "vue-axios"
import router from './router'

Vue.config.productionTip = false
Vue.use(custom_axios, VueAxios)

new Vue({
  vuetify,
  router,
  VueAxios,
  custom_axios,
  render: h => h(App)
}).$mount('#app')
