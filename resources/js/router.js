import Vue from 'vue'
import VueRouter from 'vue-router'
import Router from 'vue-router'
import User from './components/user/UserComponent.vue'
import Profile from './components/user/ProfileComponent.vue'

Vue.use(VueRouter);

const routes = [
    {
      path: '/user',
      name:'user',
      component: User
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
