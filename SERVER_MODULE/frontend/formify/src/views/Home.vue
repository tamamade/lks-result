<template>
  <main>
    <div class="hero py-5 bg-light">
      <div class="container">
        <router-link to="/createform" class="btn btn-primary"> Create Form </router-link>
      </div>
    </div>

    <div class="list-form py-5">
      <div class="container">
        <h6 class="mb-3">List Form</h6>

        <router-link :to="'/detailform/' + form.id" class="card card-default mb-3" v-for="form in forms" :key="form.id">
          <div class="card-body">
            <h5 class="mb-1">{{ form.name }}</h5>
            <small class="text-muted">@{{ form.slug }} {{ form.limit_one_response == 1 ? "limit for 1 response" : "" }}</small>
          </div>
        </router-link>
      </div>
    </div>
  </main>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      forms: [],
    };
  },
  created() {
    this.getData();
  },
  methods: {
    async getData() {
      try {
        const response = await axios.get("forms/", {
          headers: { Authorization: "Bearer " + localStorage.getItem("token") },
        });
        console.log(response);
        this.forms = response.data.forms;
      } catch (error) {
        console.error(error);
      }
    },
  },
};
</script>
