import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import "@/assets/css/bootstrap.css";
import "@/assets/css/style.css";
import "@/assets/js/bootstrap.js";
import "@/assets/js/popper.js";
import axios from "axios";

axios.defaults.baseURL = "http://13.250.25.73/rest-division/api/v1/";
axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem("token");
axios.defaults.headers.common["Accept"] = "application/json";
createApp(App).use(store).use(router).mount("#app");
