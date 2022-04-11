import Vue from 'vue'
import Router from 'vue-router'
import Mypage from './components/user/MypageComponent.vue'
import Profile from './components/user/ProfileComponent.vue'

Vue.use(Router)

export default new Router({

  routes: [
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
})
