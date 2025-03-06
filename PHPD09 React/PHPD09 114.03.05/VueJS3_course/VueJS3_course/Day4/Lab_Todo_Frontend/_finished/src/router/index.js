import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import TodoIndex from '../components/TodoIndex.vue';
import TodoCreate from '../components/TodoCreate.vue';
import TodoEdit from '../components/TodoEdit.vue';
import TodoDelete from '../components/TodoDelete.vue';
import MemberLogin from '../components/MemberLogin.vue';

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  },
  {
    path: '/Todo/Index',
    name: 'TodoIndex',
    component: TodoIndex
  },
  {
    path: '/Todo/Create',
    name: 'TodoCreate',
    component: TodoCreate
  },
  {
    path: '/Todo/Edit/:id?',
    name: 'TodoEdit',
    component: TodoEdit
  },
  {
    path: '/Todo/Delete/:id?',
    name: 'TodoDelete',
    component: TodoDelete
  },
  {
    path: '/Member/Login',
    name: 'MemberLogin',
    component: MemberLogin
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
