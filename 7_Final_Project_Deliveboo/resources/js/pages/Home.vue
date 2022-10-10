<template>
  <div id="wrapper" class="mb-5">
    <!-- <Header /> -->
    <div class="container">
      <div id="jumbo" class="row mb-3">
        <div class="col-12" v-if="loading">
          {{ loading }}
        </div>
        <div id="full-width-div" class="container-fluid mb-5">
          <Jumbo />
          <div id="searchbar" class="position-absolute">
            <SearchBar @restaurant="setSearchedData" />
          </div>
        </div>
      </div>
      <div id="main" class="row">
        <h1>Ristoranti</h1>
        <div
          id="restaurants"
          v-for="restaurant in restaurantToShow"
          :key="restaurant.id"
          class="col-md-6 col-lg-4 mt-3 mb-5">
          <img
            :src="getUrlImg(restaurant.image_url)"
            class="mb-3 w-100 h-50"
            :alt="'image of ' + restaurant.name_restaurant" />
          <h4 class="px-3">{{ restaurant.name_restaurant }}</h4>
          <div class="txt p-3 mt-3 d-flex">
            <div id="address">
              <p class="card-text pb-2 pe-2">{{ restaurant.address }}</p>
            </div>
            <div class="menu-btn d-flex justify-content-end align-items-center">
              <router-link
                :to="{
                  name: 'menu',
                  params: { id: restaurant.id },
                }">
                <button class="btn btn-outline-dark text-uppercase rounded-pill">menu</button>
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <Footer /> -->
  </div>
</template>

<script>
  import Header from "../components/Header";
  import SearchBar from "../components/SearchBar";
  import Footer from "../components/Footer";
  import Jumbo from "../components/Jumbo.vue";
  export default {
    name: "index",
    components: {
      Header,
      SearchBar,
      Footer,
      Jumbo,
    },
    data() {
      return {
        loading: true,
        restaurants: [],
        searchedRestaurant: [],
      };
    },
    methods: {
      setSearchedData(restaurant) {
        this.searchedRestaurant = restaurant;
      },

      getUrlImg(img) {
        if (img.startsWith("http")) return img;
        else return "/storage/" + img;
      },
    },
    created() {
      this.loading = true;
      axios.get("/api/restaurant").then((response) => {
        this.restaurants = response.data;
        this.loading = false;
      });
    },
    computed: {
      randomRestaurants() {
        return this.restaurants.sort(() => Math.random() - Math.random()).slice(0, 10);
      },
      restaurantToShow() {
        if (this.searchedRestaurant.length == 0) {
          return this.randomRestaurants;
        } else {
          return this.searchedRestaurant;
        }
      },
    },
  };
</script>

<style lang="scss" scoped>
  @import "../../sass/app.scss";
  div#wrapper {
    div#jumbo {
      margin: 0 auto;
      div#full-width-div {
        position: absolute;
        width: 100vw;
        left: 0;
        padding: 50px 0;
        border-radius: 60px;
        background-color: $cambridge-blue;
        div#searchbar {
          top: 40%;
          left: 30%;
          background-color: hsla(39, 39%, 85%, 1);
          padding: 30px 40px;
          border-radius: 20px;
          box-shadow: 7.3px 5.4px 6.4px rgba(0, 0, 0, 0.06), 27.3px 20px 21.4px rgba(0, 0, 0, 0.022),
            82px 60px 96px rgba(0, 0, 0, 0.007);

          @include media("<=tablet") {
            left: 10%;
          }
          @include media("<=phone") {
            left: 10%;
          }
        }
      }
    }
    div#main {
      justify-content: center;
      margin-top: 40rem;
      img {
        border-radius: 20px 20px 0px 0px;
      }
      h1 {
        color: $rich-black-fogra-29;
        font-family: $font-family-headings;
      }
      div#restaurants {
        h4 {
          font-family: $font-family-headings;
          font-size: 1.5rem;
          color: $rich-black-fogra-29;
        }
        div.txt {
          border-radius: 0 0 20px 20px;
          background-color: $cambridge-blue;
          //   border-bottom: 1px solid $rich-black-fogra-29;
          div#address {
            width: 70%;
            p {
              font-family: $font-family-txt;
              font-size: 0.9rem;
              color: $rich-black-fogra-29;
              //   border-right: 1px solid $rich-black-fogra-29;
            }
          }
          div.menu-btn {
            width: 30%;
            button {
              font-family: $font-family-txt;
              font-size: 0.8rem;
              color: $rich-black-fogra-29;
              // background-color: $bright-yellow-crayola;
              cursor: pointer;
              &:hover {
                background-color: $rich-black-fogra-29;
                color: white;
                border: 1px solid $rich-black-fogra-29;
              }
            }
          }
        }
      }
    }
  }
</style>
