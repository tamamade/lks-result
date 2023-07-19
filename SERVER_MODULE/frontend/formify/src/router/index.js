import { createRouter, createWebHistory } from "vue-router";
import Login from "../views/Login.vue";
import Home from "../views/Home.vue";
import CreateForm from "../views/CreateForm.vue";
import DetailForm from "../views/DetailForm.vue";

const routes = [
  {
    path: "/login",
    name: "login",
    component: Login,
  },
  {
    path: "/home",
    name: "home",
    component: Home,
  },
  {
    path: "/createform",
    name: "CreateForm",
    component: CreateForm,
  },
  {
    path: "/detailform/:id",
    name: "DetailForm",
    component: DetailForm,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
