<template>
  <navbar></navbar>
  <div class="pt-5"></div>
  <div class="container">
    <div class="card bg-dark text-white">
      <div class="card-header text-center">
        <h1>Create Room</h1>
      </div>
      <div class="card-body">
        <inertia-link
          :href="$route('create_room_type', $page.props.hotel)"
          class="btn btn-outline-success"
          ><i class="fas fa-plus-circle align-middle"></i> Create a new type of
          Room</inertia-link
        >
      </div>
    </div>
  </div>
</template>
<script>
import Navbar from "./../../Layouts/Navbar.vue";
export default {
  components: {
    Navbar,
  },
};
</script>