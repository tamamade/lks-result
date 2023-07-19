<template>
  <navbar></navbar>
  <router-view />
</template>

<script>
import Navbar from "@/components/Navbar.vue";
export default {
  components: { Navbar },
  created() {
    if (localStorage.getItem("token")) {
      this.$store.dispatch("login");
    }
  },
};
</script>

<style>
body {
  overflow-x: hidden;
}
</style>
