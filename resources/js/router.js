import Vue from 'vue'
import VueRouter from 'vue-router'
import Router from 'vue-router'
import Mypage from './components/user/MypageComponent.vue'
import Profile from './components/user/ProfileComponent.vue'

Vue.use(VueRouter);

const routes = [
    {
      path: '/mypage',
      name:'mypage',
      component: Mypage
    },
    {
      path: '/profile',
      name:'profile',
      component: Profile
    }
]
  
const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
