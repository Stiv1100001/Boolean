<template>
  <div>
    <div class="position-absolute loader h-100 w-100" :class="{ 'd-none': !loading }">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

    <!-- <Header></Header> -->
    <div class="container bg-cambridge-blue p-4 shadow rounded my-5">
      <div class=" p-2 shadow rounded-pill bg-white mb-4 d-flex justify-content-center align-items-center flex-wrap">
        <h1 class="fw-bold text-center abril-fatface-font me-3">{{ restaurant.name_restaurant }}</h1>
        <h6 v-if="restaurant" class="d-flex flex-wrap justify-content-center m-0">
          <span class="badge m-2 px-4 py-2" v-for="type in restaurant.types" :key="type.id">{{ type.name_type }}</span>
        </h6>
      </div>

      <div class="d-flex p-3">
        <div class="menu-container row align-items-stretch w-100 me-3 justify-content-center">
          <div class=" col-10 col-sm-8 col-md-4 col-lg-3 m-3 p-0 shadow" v-for="dish in availableDishes" :key="dish.id">
            <MenuItem :item="dish" @insertError="showInsertError" />
          </div>
        </div>

        </div>
        <div class="card w-100 mt-4 shadow">
          <div class="card-header text-center fw-bold">Carrello</div>
          <div class="card body p-1">
            <ul class="list-group mb-3">
              <li class="list-group-item d-flex justify-content-between" v-for="item in getCart" :key="item.dish.id">
                <span> {{ item.dish.name }}</span>
                <span> {{ item.quantity }}</span>
              </li>
            </ul>
          </div>
          <div class="card-footer d-flex justify-content-between align-items-center flex-wrap p-0 px-3">
            <h5 class="m-0">Totale: &euro; {{ getTotalCartPrice.toFixed(2) }}</h5>
            <router-link :to="{ name: 'checkout' }">
              <button class="btn my-3">Checkout</button>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import { mapGetters } from "vuex";
  import MenuItem from "../components/MenuItem.vue";
  import Header from "../components/Header.vue";
  import Swal from "sweetalert2";
  export default {
    components: { MenuItem, Header },
    name: "Menu",

    data: () => ({
      restaurant: null,
      dishes: [],
      loading: true,
      showError: false,
    }),

    computed: {
      availableDishes() {
        return this.dishes.filter((dish) => dish.availability);
      },

      ...mapGetters(["getTotalNumberOfItemInCart", "getTotalCartPrice", "getCart"]),
    },

    methods: {
      showInsertError() {
        Swal.fire({
          position: "center",
          icon: "error",
          title: "Non puoi acquistare piatti da ristoranti diversi!",
          showConfirmButton: true,
          timer: 2000,
        });
      },
    },

    async created() {
      const dishes = (await axios.get("/api/dishes/" + this.$route.params.id)).data.data;

      const restaurant = (await axios.get("/api/restaurant/" + this.$route.params.id)).data;

      this.dishes = dishes;
      this.restaurant = restaurant;

      this.loading = false;
    },
  };
</script>

<style lang="scss" scoped>
  .loader {
    background-color: white;
    top: 0;
    z-index: 10;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .badge{
    background-color: hsla(38, 100%, 58%, 1);
    color: black;
  }
  button{
    background-color: hsla(38, 100%, 58%, 1);
  }
</style>
