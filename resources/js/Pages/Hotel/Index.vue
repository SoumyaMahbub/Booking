<template>
  <navbar :isHome="isHome" :isHotels="isHotels" :isAbout="isAbout"></navbar>
  <div class="pt-5"></div>
  <div class="container">
    <div
      class="alert alert-success animate__animated animate__fadeIn"
      role="alert"
      v-if="$page.props.flash.message"
    >
      {{ $page.props.flash.message }}
    </div>
    <h1>Hotels</h1>
    <div>
      <div v-for="hotel in $page.props.hotels" class="my-3 card bg-dark text-white" :key="hotel.id">
        <p>fdusfyudsgfygfdyugfdyusg</p>
      </div>
    </div>
  </div>
  <!-- <div
    class="container card bg-dark text-white animate__animated animate__fadeInUp"
  >
    <div class="card-header text-center border-white">Hotels</div>
    <ul class="list-group list-group-flush">
      <li
        class="hotel-li list-group-item bg-dark border-white d-flex align-items-center"
        v-for="hotel in $page.props.hotels"
        :key="hotel.id"
      >
        <img
          class="hotels-image"
          :src="'/img/hotels/' + hotel.id + '_large.jpg'"
          alt=""
        />
        <div class="p-2 w-75">
          <inertia-link
            :href="$route('hotel.show', hotel)"
            class="text-white hotel-header"
            >{{ hotel.name }}</inertia-link
          >
          <p class="hotel-desc overflow-hidden text-nowrap text-truncate">
            {{ hotel.description }}
          </p>
        </div>

        <div v-if="$page.props.user" class="ml-auto p-2 flex-shrink-0">
          <inertia-link
            :href="$route('hotel.edit', hotel)"
            class="btn btn-outline-light mx-2"
            >Edit</inertia-link
          >
          <form class="d-inline" @submit.prevent="destroy(hotel)" method="POST">
            <button type="submit" class="btn btn-outline-danger">Delete</button>
          </form>
        </div>
      </li>
    </ul>
  </div> -->
</template>
<script>
import Navbar from "./../Layouts/Navbar.vue";
export default {
  components: {
    Navbar,
  },
  data: function () {
    return {
      isHome: false,
      isHotels: true,
      isAbout: false,
    };
  },
  methods: {
    destroy(object) {
      this.$inertia.delete(route("hotel.destroy", object));
    },
  }
};
</script>