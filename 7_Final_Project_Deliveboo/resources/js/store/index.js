import Vue from "vue";
import vuex from "vuex";

Vue.use(vuex);

export const store = new vuex.Store({
  state: {
    cart: [],
    restaurantOrderId: null,
    restaurants: [],
    order: {},
  },

  getters: {
    getRestaurants(state) {
      return state.restaurants;
    },

    getRestaurantOrderId(state) {
      return state.restaurantOrderId;
    },

    getTotalCartPrice(state) {
      let total = 0;

      function reduceFn(accumulator, next) {
        return accumulator + next.dish.price * next.quantity;
      }

      total = state.cart.reduce(reduceFn, 0);

      return total;
    },

    getTotalNumberOfItemInCart(state) {
      let number = 0;

      state.cart.forEach((p) => {
        number += p.quantity;
      });

      return number;
    },

    getCart(state) {
      return state.cart;
    },
  },

  mutations: {
    updateRestaurant(state, restaurants) {
      state.restaurants = restaurants;
    },

    addProductToCart(state, { dish, quantity = 1 }) {
      if (state.cart.length) {
        if (dish.user_id != state.restaurantOrderId) {
          return;
        }

        let toPush = true;

        state.cart.forEach((p) => {
          if (p.dish.id == dish.id) {
            p.quantity += parseFloat(quantity);
            toPush = false;
          }
        });

        if (toPush) state.cart.push({ dish, quantity });
      } else {
        state.restaurantOrderId = dish.user_id;
        state.cart.push({ dish, quantity });
      }

      // Salvo nel local storage
      localStorage.setItem("cart", JSON.stringify(state.cart));
      return true;
    },

    removeProductFromCart(state, { dish, quantity = 1 }) {
      const newCart = [];

      state.cart.forEach((p) => {
        if (p.dish.id == dish.id) {
          p.quantity -= quantity;
          if (p.quantity > 0) newCart.push(p);
        } else {
          newCart.push(p);
        }
      });

      if (!newCart.length) {
        state.restaurantOrderId = null;
      }

      state.cart = newCart;

      localStorage.setItem("cart", JSON.stringify(state.cart));
    },

    fillCart(state, cart) {
      state.cart = cart;
      if (cart.length > 0) state.restaurantOrderId = state.cart[0].dish.user_id;
      else state.restaurantOrderId = null;

      localStorage.setItem("cart", JSON.stringify(state.cart));
      if (cart.length) {
        state.restaurantOrderId = cart[0].dish.user_id;
      }
    },

    updateOrder(state, order) {
      state.order = order;
    },
  },

  actions: {
    async syncRestaurants({ commit }) {
      try {
        let restaurants = (await axios.get("/api/restaurant")).data;
        commit("updateRestaurant", restaurants);
      } catch (e) {
        console.error(e);
      }
    },

    initCart({ commit }) {
      let cart = JSON.parse(localStorage.getItem("cart"));

      if (cart) {
        commit("fillCart", cart);
      } else {
        localStorage.setItem("cart", JSON.stringify([]));
      }
    },

    clearCart({ commit }) {
      commit("fillCart", []);
    },

    removeItem({ commit }, dish) {
      commit("removeProductFromCart", { dish });
    },
    addItem({ commit }, dish) {
      commit("addProductToCart", { dish });
    }
  },
});
