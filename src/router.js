import Vue from 'vue'
import Router from 'vue-router'
import Mypage from './components/user/MypageComponent.vue'
import Profile from './components/user/ProfileComponent.vue'

Vue.use(Router)

export default new Router({

  routes: [
    { path: '/mypage', component: Mypage },
    { path: '/profile', component: Profile }
  ]
})
