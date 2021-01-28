<template>
  <navbar></navbar>
  <div class="pt-5"></div>
  <div class="w-75 mx-auto card bg-dark text-white">
    <h1 class="card-header text-center border-white">{{$page.props.hotel.name}}</h1>
    <div class="card-body">
      <div v-if="hasImage">
        <img id="hotel-image" :src="'/img/hotels/' + hotel.id + '_large.jpg'" :alt="'Image of ' + hotel.name">
      </div>
      <p><b>Description:</b></p>
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
  props: ["hotel"],
  data: function () {
    return {
      hasImage: "",
    };
  },
  beforeMount() {
    try{
      let fileName = require('/img/hotels/' + this.hotel.id + '_large.jpg');
      this.hasImage = true; 
    } catch(e) {
      this.hasImage = false;
    }
  }
};
</script>