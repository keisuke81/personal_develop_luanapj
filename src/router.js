import Vue from 'vue'
import Router from 'vue-router'
import Mypage from './components/MypageComponent.vue'
import Profile from './components/ProfileComponent.vue'

Vue.use(Router)

export default new Router({

  routes: [
    { path: '/mypage', component: Mypage },
    { path: '/profile', component: Profile }
  ]
})
