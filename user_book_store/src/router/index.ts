import { createRouter, createWebHashHistory, RouteRecordRaw } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import BookDetail from '../views/BookDetail.vue'
import BookCart from '../views/BookCart.vue'

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'welcomeUser',
    component: () => import('../views/Welcome.vue')
  },
  {
    path: '/loginPage',
    name: 'loginPage',
    component: () => import('../views/loginPage.vue')
  },
  {
    path: '/registerPage',
    name: 'registerPage',
    component: ()=>import('../views/RegisterPage.vue')
  },
  {
    path: '/homePage',
    name: 'home',
    component: HomeView
  },
  {
    path: '/bookDetail/:bookId/:userId',
    name: 'BookDetail',
    component: BookDetail
  },
  {
    path: '/cart/:userId',
    name: 'BookCart',
    component: BookCart
  },
  {
    path: '/contactToAdmin/:userId',
    name: 'ContactToAdmin',
    component : ()=>import('../views/ContactToAdmin.vue')
  },
  {
    path: '/UserOrder/:userId',
    name: 'UserOrder',
    component : ()=>import('../views/UserOrder.vue')
  }
  
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
