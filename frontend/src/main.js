// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import VueI18n from 'vue-i18n'
import { languages } from './languages/index.js'

Vue.config.productionTip = false
Vue.use(VueI18n)

const messages = languages;

var i18n = new VueI18n(
  messages
)

window.i = i18n

new Vue({
  i18n,
  el: '#app',
  router,
  components: { App },
  template: '<app />'
  // watch:{
  //   '$route' (to, from) {
  //     console.log(from.name)
  //       // call your method here that updates your page
  //    }
  // },
})
