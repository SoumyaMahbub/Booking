<template>
  <navbar></navbar>
  <div class="pt-5"></div>
  <div class="w-75 mx-auto card bg-dark text-white">
    <h1 class="card-header text-center border-white">{{$page.props.hotel.name}}</h1>
    <div class="card-body">
      <div>
        <img class="mx-auto d-block" id="hotel-image" :src="'/storage/images/hotels/' + hotel.id + '_large.jpg'" :alt="'Image of ' + hotel.name">
      </div>
      <h3 class="m-0"><b>Description:</b></h3>
      <p class="m-0">{{$page.props.hotel.description}}</p>
      <h3 class="m-0"><b>View Count:</b></h3>
      <p class="m-0">{{$page.props.hotel.view_count}}</p>
    </div>
  </div>
</template>
<script>
import Navbar from "./../Layouts/Navbar.vue";
export default {
  components: {
    Navbar,
  },
  props: ["hotel"],
  data: function () {
    return {
      
    };
  },
};
</script>