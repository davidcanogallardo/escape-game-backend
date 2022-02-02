import { languages } from './index.js'
import VueI18n from 'vue-i18n'
const messages = languages;

console.log(messages);

var i18n = new VueI18n({
  locale: navigator.language,
  messages
})

window.i = i18n
export { i18n };