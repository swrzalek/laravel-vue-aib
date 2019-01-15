require('./bootstrap');

window.Vue = require('vue');
window.Event = new Vue(); 

Vue.use(require('vue-resource'));


Vue.component('task-form', require('./components/TaskForm.vue').default);
Vue.component('card-component', require('./components/CardComponent.vue').default);
Vue.component('sidebar', require('./components/SideBarLeft.vue').default);
Vue.component('table-component', require('./components/TableComponent.vue').default);
//translate
Vue.component('translate-component', require('./components/TranslateComponent.vue').default);
Vue.component('TranslateForm', require('./components/TranslateForm.vue').default);
Vue.component('TranslateOutput', require('./components/TranslateOutput.vue').default);

// modal fot edit
Vue.component('modal', {
  template: '#modal-template'
})

const app = new Vue({
    el: '#app'
});
