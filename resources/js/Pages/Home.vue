<template>
    <navbar></navbar>
    <div class="pt-5"></div>
    <div class="container">
      <div class="row">
        <div class="card bg-dark col-12 col-md-3 text-white">
          <div class="card-header">Most Viewed</div>
          <div class="card-body">
            <div v-for="(hotel,index) in $page.props.view" :key="index">
              <a class="text-white" :href="$route('hotel.show', hotel)"><h3>{{hotel.name}}</h3></a>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>
<script>
import Navbar from './Layouts/Navbar.vue';
export default {
  components: {
    Navbar
  },
  data: function () {
    return {
      
    };
  },
};
</script>