<template>
  <div id="header-guest" class="container">
    <nav class="navbar d-flex">
      <!-- Logo -->
      <a href="/" class="logo text-decoration-none">
        <!-- <span>DeliveBoo</span> -->
        <img src="/img/Deliveboo_Logo.png" alt="DeliveBoo logo" />
      </a>

      <div class="right-side d-flex align-items-center justify-content-between">
        <!-- Login/Register -->

        <div class="login-control">
          <a
            href="/login"
            class="btn btn-outline-dark text-uppercase rounded-pill me-2"
          >
            Login
          </a>
          <a
            href="/register"
            class="btn btn-outline-dark text-uppercase rounded-pill"
          >
            Register
          </a>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
  export default {
    name: "Header",
  };
</script>

<style lang="scss" scoped>
  @import "../../sass/app.scss";

  @include media("<=phone") {
      div#header-guest {
        a.logo {
            width: 70px;
        }
        div.login-control {

        }
      }
    }
</style>
