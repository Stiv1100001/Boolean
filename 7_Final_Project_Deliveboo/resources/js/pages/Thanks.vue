<template>
  <div>
    <!-- <Header></Header> -->
    <div class="d-flex justify-content-center align-items-center">
      <div class="text-center" v-if="order">
        <h1 class="">Grazie dell'ordine!</h1>
        <h3 class="mb-3">Ecco un riepilogo:</h3>
        <div class="card text-start">
          <div class="card-header">Ordine N{{ order.id }}</div>
          <div class="card-body">
            <h5 class="card-title">{{ order.name_customer }}</h5>
            <p class="card-text">{{ order.address_customer }}, {{ order.phone_number_customer }}</p>
            <ul class="list-group mb-3">
              <li class="list-group-item" v-for="dish in order.dishes" :key="dish.id">
                {{ dish.name }} x{{ dish.pivot.quantity }}
              </li>
            </ul>
            <p class="card-text">Totale: {{ order.total_price }}&euro;</p>
          </div>
          <div class="p-2 d-flex justify-content-center">
            <router-link to="/">
              <a class="btn btn-primary">Torna alla home</a>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Header from "../components/Header.vue";
  export default {
    name: "Thanks",

    components: { Header },

    data: () => ({
      order: null,
    }),

    async created() {
      const order = (await axios.get("/api/order/" + this.$route.params.id)).data;

      this.order = order;
    },
  };
</script>

<style lang="scss" scoped></style>
