<template>
  <div id="jumbo" class="d-flex container-fluid justify-content-evenly">
    <img src="/img/delivery.jpeg" class="align-self-center" id="delivery" alt="Image of friends eating" />
    <img src="/img/friends_delivery.jpeg" id="friends" class="" alt="Delivery image" />
  </div>
</template>

<script>
  export default {
    name: "Jumbo",
  };
</script>

<style lang="scss" scoped>
  @import "../../sass/app.scss";
  div#jumbo {
    position: relative;

    @include media("<=phone") {
      img#delivery {
        display: none;
      }
    }
    @include media("<=tablet") {
      img#delivery {
        display: none;
      }
      img#friends {
        width: 150px;
      }
    }
    img#delivery {
      width: 300px;
      height: 300px;
    }
    img#friends {
      width: 420px;
    }
    img {
      box-shadow: 3.4px 3.4px 2.7px rgba(0, 0, 0, 0.019), 8.7px 8.7px 6.9px rgba(0, 0, 0, 0.027),
        17.7px 17.7px 14.2px rgba(0, 0, 0, 0.033), 36.5px 36.5px 29.2px rgba(0, 0, 0, 0.041),
        100px 100px 80px rgba(0, 0, 0, 0.06);
    }
  }
</style>
