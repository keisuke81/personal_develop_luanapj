import Vue from 'vue';
import VueRouter from 'vue-router';
import MenuComponent from "./components/MenuComponent.vue";
import UserMypageComponent from "./components/UserMypageComponent.vue";
import UserSearchComponent from "./components/SearchComponent";
import CastProfileComponent from "./components/CastProfileComponent";
import OfferCastComponent from "./components/OfferCastComponent";
import UserProfileComponent from "./components/UserProfileComponent";


require('./bootstrap');

window.Vue = require('vue').default;

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
            name: 'user.acst.profile',
            component: CastProfileComponent,
            props:true
        },

        {
            path: '/user/offer/:castId',
            name: 'user.cast.offer',
            component: OfferCastComponent,
            props:true
        },

        {
            path: 'user/profile',
            name: 'user.profile',
            component: UserProfileComponent,
            props:true
        }
    ]
});



const app = new Vue({
    el: '#app',
    router
});