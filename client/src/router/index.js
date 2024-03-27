import { createRouter, createWebHistory } from 'vue-router';
import LoginView from '@/views/LoginView.vue';
import TasksView from '@/views/TasksView.vue';
import CreateTaskView from "@/views/CreateTaskView.vue";
import CreateUserView from "@/views/CreateUserView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/login',
      name: 'login',
      component: LoginView
    },
    {
      path: '/tasks',
      name: 'tasks',
      component: TasksView
    },
    {
      path: '/create-task',
      name: 'create-task',
      component: CreateTaskView
    },
    {
      path: '/create-user',
      name: 'create-user',
      component: CreateUserView
    },
  ]
})

export default router;