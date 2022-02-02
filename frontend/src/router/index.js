import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Home from '@/components/Home'
import Login from '@/components/Login'
import Settings from '@/components/Settings/Settings'
// import Settings from '@/components/FriendSidebar/Friend'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/hello',
      name: 'HelloWorld',
      component: HelloWorld
    },
    {
      path: '/',
      name: 'Home',
      component: Login
    },
    {
      path: '/settings',
      name: 'Settings',
      component: Settings
    }
  ]

})
// 