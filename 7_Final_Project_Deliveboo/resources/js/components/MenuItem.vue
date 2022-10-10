<template>
  <div class="card rounded">

    <div class="card-body overflow-auto p-0 rounded-top">
      <img :src="getUrlImage(item.img_url)" class="w-100 rounded-top" alt="" />
      <div class="card-texts p-3">
        <h5 class="card-title t fw-bold">{{ item.name }}</h5>
        <p class="card-text">{{ item.description }}</p>
        <p class="card-text"><span class="fw-bold">Ingredienti:</span> {{ item.ingredients }}</p>
        <p class="card-text"><span class="fw-bold">prezzo:</span>  {{ item.price }} &euro;</p>
      </div>
    </div>
    <div class="q-holder w-100 d-flex justify-content-between align-items-center shadow p-3">
      <button class="btn w-25 fw-bold text-center" @click="minus()" :disabled="quantity.length == 0">-</button>
      <span class="fw-bold">{{ quantity }}</span>
      <button class="btn w-25 fw-bold" text-center @click="plus()">+</button>
    </div>
  </div>
</template>

<script>
  import { mapGetters } from "vuex";
  import Swal from "sweetalert2";
  export default {
    name: "MenuItem",
    data: () => ({
      quantity: 0,
    }),

    props: {
      item: {
        type: Object,
        required: true,
      },
    },

    computed: {
      ...mapGetters(["getRestaurantOrderId"]),
    },

    created() {
      const cart = this.$store.getters.getCart;

      const dish = cart.find((el) => el.dish.id == this.item.id);

      if (dish) {
        this.quantity = dish.quantity;
      }
    },

    methods: {
      plus() {
        const Toast = Swal.mixin({
          toast: true,
          position: "top",
          showConfirmButton: false,
          timer: 3500,
          didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
          },
        });

        if (this.getRestaurantOrderId && this.getRestaurantOrderId !== this.item.user_id) {
          this.$emit("insertError");
          return;
        }

        this.quantity++;
        this.addToCart();
        const name = this.item.name;
        Toast.fire({
          icon: "success",
          title: `${name} aggiunto al Carrello`,
        });
      },

      minus() {
        const Toast = Swal.mixin({
          toast: true,
          position: "top",
          showConfirmButton: false,
          timer: 3500,
          didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
          },
        });

        if (this.quantity === 0) return;
        this.quantity--;
        this.removeFromCart();
        Toast.fire({
          icon: "error",
          title: "Piatto eliminato dal carrello",
        });
      },

      addToCart() {
        this.quantity = parseInt(this.quantity);
        if (this.quantity <= 0) return;

        const payload = {
          dish: this.item,
          quantity: 1,
        };

        this.$store.commit("addProductToCart", payload);
      },

      removeFromCart() {
        this.quantity = parseInt(this.quantity);

        const payload = {
          dish: this.item,
          quantity: 1,
        };

        this.$store.commit("removeProductFromCart", payload);
      },

      getUrlImage(img) {
        if (img) {
          if (img.startsWith("http")) return img;
          else return "/storage/" + img;
        }
      },
    },
  };
</script>

<style lang="scss" scoped>
  .card{
    height: 70vh;
  }
  button{
    background-color: hsla(38, 100%, 58%, 1);
  }
</style>
