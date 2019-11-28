import moment from 'moment'
import Vue from 'vue'
// timestamp format
Vue.filter('timeformat',(arg) => {
  return moment(arg).format("MMM Do YYYY")
});
// sortlength
Vue.filter('sortlength',(text,length,suffix) => {
  return text.substring(0,length)+suffix
});