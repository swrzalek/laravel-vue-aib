
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
// import vuejquery from 'vue-jquery'

// Vue.use(vuejquery)

window.Vue = require('vue');
window.Event = new Vue(); 

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('task-form', require('./components/TaskForm.vue').default);
Vue.component('card-component', require('./components/CardComponent.vue').default);
// Vue.component('card-list', require('./components/CardList.vue').default);
Vue.component('sidebar', require('./components/SideBarLeft.vue').default);
Vue.component('card-item', require('./components/CardItem.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
// Vue.component('card-component', {
//   template: '</template>',
//   props: [ ],
//   mounted: function() {
//   $('.card').click(function(){
//               $(this).toggleClass('flipped');
//             });
//   },
//   beforeDestroy: function() {}
// });