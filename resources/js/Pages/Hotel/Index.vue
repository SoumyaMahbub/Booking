<template>
  <navbar :isHome="isHome" :isHotels="isHotels" :isAbout="isAbout"></navbar>
  <div class="pt-5"></div>
  <div class="container overflow-hidden">
    <div
      class="alert alert-success animate__animated animate__fadeIn"
      role="alert"
      v-if="$page.props.flash.message"
    >
      {{ $page.props.flash.message }}
    </div>
    <h1>Hotels</h1>
    <div
      v-for="(hotel, index) in $page.props.hotels"
      class=" my-3 card bg-dark text-white p-2 animate__animated list-enter-animation opacity-0"
      :key="hotel.id"
      :data-index="index"
    >
      <div class="d-flex align-items-center">
        <img
          class="hotels-image"
          :src="'/storage/images/hotels/' + hotel.id + '_large.jpg'"
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
      </div>
    </div>
  </div>
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
  mounted() {
    $(".list-enter-animation").each(function(i) {
      $(this).delay(100 * i).queue(function() {
        $(this).addClass("animate__slideInRight d-block opacity-100");
      })
    });
  },
  methods: {
    destroy(object) {
      this.$inertia.delete(route("hotel.destroy", object));
    },
  },
  beforeMount() {
    
  }
};
</script>