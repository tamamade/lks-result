import { createStore } from "vuex";

const store = createStore({
  state() {
    return {
      isLoggedIn: false,
    };
  },
  mutations: {
    changeAuthStatus(state, payload) {
      state.isLoggedIn = payload.status;
    },
  },
  actions: {
    login(context) {
      context.commit("changeAuthStatus", { status: true });
    },
    logout(context) {
      context.commit("changeAuthStatus", { status: false });
    },
  },
  getters: {
    getAuthStatus(state) {
      return state.isLoggedIn;
    },
  },
});

export default store;
