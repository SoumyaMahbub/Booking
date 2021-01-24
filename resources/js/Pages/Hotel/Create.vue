<template>
  <navbar></navbar>
  <div class="pt-5"></div>
  <div class="w-75 mx-auto card bg-dark text-white">
    <h1 class="card-header text-center border-white">Create Page</h1>
    <div class="card-body">
      <form method="POST" @submit.prevent="create">
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" v-model="name" value="">
          </div>
          <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" v-model="description" id="description" rows="5"></textarea>
          </div>
          <input type="submit" class="btn btn-outline-success float-right" value="Create">
      </form>
    </div>
  </div>
</template>
<script>
import Navbar from "./../Layouts/Navbar.vue";
export default {
  components: {
    Navbar,
  },
  data: function(){
    return {
        name: '',
        descripton: ''
    }
  },
  methods: {
      create() {
          this.$inertia.post(route('hotel.store'), {
              name: this.name,
              description: this.description,
          })
      }
  }
};
</script>