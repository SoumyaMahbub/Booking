<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <p class="navbar-brand text-light font-weight-bold" href="">BOOKING</p>
    <ul class="navbar-nav ml-3 mr-auto">
      <li class="nav-item mx-2">
        <inertia-link
          class="nav-link text-light"
          :class="{ active: currentUrl == $route('home') }"
          :href="$route('home')"
          >HOME</inertia-link
        >
      </li>
      <li class="nav-item mx-2">
        <inertia-link
          class="nav-link text-light"
          :class="{ active: currentUrl == $route('hotels') }"
          :href="$route('hotels')"
          >HOTELS</inertia-link
        >
      </li>
      <li class="nav-item mx-2">
        <inertia-link
          class="nav-link text-light"
          :class="{ active: currentUrl == $route('about') }"
          :href="$route('about')"
          >ABOUT</inertia-link
        >
      </li>
    </ul>
    <div class="nav-item dropdown" v-if="$page.props.user">
      <a
        class="nav-link dropdown-toggle text-light"
        href="#"
        id="navbarDropdownMenuLink"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
      >
        {{ $page.props.user.name }}
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="#">Profile</a>
        <a class="dropdown-item" href="#">Booked Hotels</a>
        <a class="dropdown-item" href="#">
          <form method="POST" @submit.prevent="logout">
            <button id="logout" type="submit">Log out</button>
          </form>
          </a>
      </div>
    </div>
    <div v-else>
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link text-light" :href="$route('login')">LOGIN</a></li>
        <li class="nav-item"><a class="nav-link text-light" :href="$route('register')">REGISTER</a></li>
      </ul>
    </div>
  </nav>
</template>
<script>
export default {
  name: "navbar",
  data: function () {
    return {
      currentUrl: window.location.href.replace(/\/$/, "")
    };
  },
  mounted() {
    console.log(this.currentUrl);
  },
  methods: {
    logout() {
      this.$inertia.post(route("logout"));
    },
  }
};
</script>