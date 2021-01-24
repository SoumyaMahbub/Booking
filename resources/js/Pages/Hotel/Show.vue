<template>
  <navbar></navbar>
  <div class="pt-5"></div>
  <div class="w-75 mx-auto card bg-dark text-white">
    <h1 class="card-header text-center border-white">{{$page.props.hotel.name}}</h1>
    <div class="card-body">
      <p>{{$page.props.hotel.description}}</p>
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
    return {};
  },
};
</script>