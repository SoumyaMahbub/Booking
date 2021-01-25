<template>
  <navbar></navbar>
  <div class="pt-5"></div>
  <div class="w-75 mx-auto card bg-dark text-white">
    <h1 v-if="hotel && hotel.id" class="card-header text-center border-white">Edit Hotel</h1>
    <h1 v-else class="card-header text-center border-white">Create Hotel</h1>
    
    <div class="card-body">
      <form method="POST" @submit.prevent="save">
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" :class="{ 'is-invalid': $page.props.errors.name }" id="name" v-model="editedHotel.name">
              <div class="invalid-feedback" v-if="$page.props.errors.name">
                {{$page.props.errors.name}}
              </div>
          </div>
          <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" :class="{ 'is-invalid': $page.props.errors.description }" v-model="editedHotel.description" id="description" rows="5"></textarea>
              <div class="invalid-feedback" v-if="$page.props.errors.description">
                {{$page.props.errors.description}}
              </div>
          </div>
          <input type="submit" class="btn btn-outline-success float-right" value="Save">
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
  props: ['hotel'],
  data: function(){
    return {
        editedHotel: {
          name: '',
          descripton: ''
        }
    }
  },
  mounted() {
    if (this.hotel) {
      this.editedHotel.name = this.hotel.name;
      this.editedHotel.description = this.hotel.description;
    }
  },
  methods: {
      save() {
          if (this.hotel && this.hotel.id) {
            // Edit
            this.$inertia.put(route('hotel.update', this.hotel.id), this.editedHotel);
          }
          else {
            // Create
            this.$inertia.post(route('hotel.store'), this.editedHotel);
          }
      }
  }
};
</script>