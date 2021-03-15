/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueToast from 'vue-toast-notification';
import App from './App.vue';
import router from './router/index';
import Layout from './components/admin/index.vue';
import Sidebar from './components/admin/global/sidebar/index.vue';
import Resume from './components/resume/index.vue';
import Users from './components/admin/users/index.vue';
import Settings from './components/admin/Settings/index.vue';
import Profile from './components/admin/Settings/Profile/index.vue';
import ProfileImage from './components/admin/Settings/profile/profile_image/index.vue';
import Education from './components/admin/Settings/education/index.vue';
import School from './components/admin/settings/education/school/index.vue';
import University from './components/admin/settings/education/university/index.vue';
import Master from './components/admin/settings/education/master/index.vue';
import Doctorate from './components/admin/settings/education/doctorate/index.vue';
import Work_Experince from './components/admin/Settings/work_experince/index.vue';
import Skills from './components/admin/Settings/skills/index.vue';
import CV from './components/admin/Settings/cv/index.vue';
import Languages from './components/admin/Settings/languages/index.vue';
import create_user_form from './components/admin/users/create/index.vue';
import edit_user_form from './components/admin/users/edit/index.vue';
import permissions from './components/admin/global/permissions/index.vue';
import create_permission from './components/admin/global/permissions/create/index.vue';
import tickets from './components/admin/tickets/index.vue';
import create_ticket from './components/admin/tickets/create/index.vue';
import dashboard from './components/admin/dashboard/index.vue';
import categories from './components/admin/categories/index.vue';
import create_category from './components/admin/categories/create/index.vue';
import Portfolio from './components/admin/settings/portfolio/index.vue';
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
import 'vue-toast-notification/dist/theme-sugar.css';
Vue.use(VueToast);


Vue.component('Layout', Layout);
Vue.component('Sidebar', Sidebar);
Vue.component('Resume', Resume);
Vue.component('Users', Users);
Vue.component('Settings', Settings);
Vue.component('Profile', Profile);
Vue.component('ProfileImage', ProfileImage);
Vue.component('Education', Education);
Vue.component('School', School);
Vue.component('University', University);
Vue.component('Master', Master);
Vue.component('Doctorate', Doctorate);
Vue.component('Work_Experince', Work_Experince);
Vue.component('Skills', Skills);
Vue.component('CV', CV);
Vue.component('Languages', Languages);
Vue.component('create_user_form', create_user_form);
Vue.component('edit_user_form', edit_user_form);
Vue.component('permissions', permissions);
Vue.component('create_permission', create_permission);
Vue.component('tickets', tickets);
Vue.component('create_ticket', create_ticket);
Vue.component('dashboard', dashboard);
Vue.component('categories', categories);
Vue.component('create_category', create_category);
Vue.component('Portfolio', Portfolio);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el:'#app'
});
