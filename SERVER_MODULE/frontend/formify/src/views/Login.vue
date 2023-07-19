<template>
  <main>
    <section class="login">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-6">
            <h1 class="text-center mb-4">Formify</h1>
            <div class="card card-default">
              <div class="card-body">
                <h3 class="mb-3">Login</h3>
                <form @submit.prevent="handleSubmit">
                  <div class="form-group my-3">
                    <label for="email" class="mb-1 text-muted">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" autofocus v-model="email" />
                  </div>

                  <div class="form-group my-3">
                    <label for="password" class="mb-1 text-muted">Password</label>
                    <input type="password" id="password" name="password" class="form-control" v-model="password" />
                  </div>

                  <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      email: "user1@webtech.id",
      password: "password1",
    };
  },
  methods: {
    handleSubmit() {
      const _this = this;
      axios
        .post("auth/login", {
          password: this.password,
          email: this.email,
        })
        .then(function (response) {
          console.log(response);
          _this.$router.replace("/home");
          _this.$store.dispatch("login");
          localStorage.setItem("token", response.data.user.accessToken);
          localStorage.setItem("name", response.data.user.name);
        })
        .catch(function (error) {
          alert(error.response.data.message);
        });
    },
  },
};
</script>
