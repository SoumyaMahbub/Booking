<template>
  <navbar></navbar>
  <div class="pt-5"></div>
  <div class="container">
    <div class="card bg-dark text-white">
      <div class="card-header text-center">
        <h3>Create Room Type of {{ $page.props.hotel.name }}</h3>
      </div>
      <div class="card-body">
        <form
          method="POST"
          @submit.prevent="save"
          enctype="multipart/form-data"
        >
          <div class="form-group">
            <label for="room-type">Room Type</label>
            <input type="text" class="form-control" id="room-type" v-model="editedRoom.name"/>
          </div>
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01"
                  >Bed Number</label
                >
              </div>
              <select v-model="editedRoom.bedNumber" class="custom-select" id="inputGroupSelect01">
                <option selected>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
              </select>
            </div>
          </div>
          <input
            type="submit"
            class="btn btn-outline-success float-right"
            value="Save"
          />
        </form>
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
  data: function(){
      return{
          editedRoom: {
              name : "",
              bedNumber : "",
          }
      }
  },
  methods: {
      save() {
          this.$inertia.post(route("store_room"), editedRoom);
      }
  }
};
</script>