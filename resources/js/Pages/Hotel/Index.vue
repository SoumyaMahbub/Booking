<template>
  <navbar :isHome="isHome" :isHotels="isHotels" :isAbout="isAbout"></navbar>
  <div class="pt-5"></div>
  <div class="w-75 mx-auto card bg-dark text-white">
    <div class="card-header text-center border-white">Hotels</div>
    <ul class="list-group list-group-flush">
      <li
        class="hotel-li list-group-item bg-dark border-white row d-flex justify-content-between align-items-center"
        v-for="hotel in $page.props.hotels"
        :key="hotel.id"
      >
        <div>
          <inertia-link :href="$route('hotel.show', hotel)" class="text-white hotel-header">{{ hotel.name }}</inertia-link>
          <p class="hotel-desc">{{ hotel.description }}</p>
        </div>
        <div>
          <inertia-link :href="$route('hotel.edit', hotel)" class="btn btn-outline-light mx-2">Edit</inertia-link>
          <button class="btn btn-outline-danger">Delete</button>
        </div>
      </li>
      </ul>
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
  methods: {
    
  }
};
</script>