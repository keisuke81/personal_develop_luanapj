import Vue from 'vue';
import VueRouter from 'vue-router';
import MenuComponent from "./components/user/MenuComponent.vue";
import UserMypageComponent from "./components/UserMypageComponent.vue";
import UserSearchComponent from "./components/user/SearchComponent";


require('./bootstrap');

window.Vue = require('vue');

Vue.component('menu-component', MenuComponent);


Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/user/:userId',
            name: 'user.mypage',
            component: UserMypageComponent,
            props:true,
        },

        {
            path: 'user/search',
            name: 'user.search',
            component: UserSearchComponent,
        },

        {
            path: 'user/search/:castId',
            name: 'user.search.castId',
            component: UserSearchCastIdComponent,
            props:true
        },

        {
            path: '/user/invite/:castId',
            name: 'user.invite',
            component: UserInviteComponent,
            props:true
        }
    ]
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});