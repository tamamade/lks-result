<template>
  <nav class="navbar navbar-expand-lg sticky-top bg-primary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="manage-forms.html">Formify</a>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <p class="nav-link active" href="#" v-if="authStatus">Administrator</p>
        </li>
        <li class="nav-item"></li>
        <li class="nav-item">
          <router-link class="nav-link" to="/login" v-if="!authStatus">Login</router-link>
          <a class="nav-link" @click.prevent="logout" v-else>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
import axios from "axios";

export default {
  computed: {
    authStatus() {
      return this.$store.getters.getAuthStatus;
    },
  },
  methods: {
    logout() {
      this.$store.dispatch("logout");
      localStorage.removeItem("token");
      this.$router.replace("login");
    },
  },
};
</script>
