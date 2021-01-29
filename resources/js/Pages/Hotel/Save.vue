<template>
  <navbar></navbar>
  <div class="pt-5"></div>
  <div class="w-75 mx-auto card bg-dark text-white">
    <h1 v-if="hotel && hotel.id" class="card-header text-center border-white">
      Edit Hotel
    </h1>
    <h1 v-else class="card-header text-center border-white">Create Hotel</h1>

    <div class="card-body">
      <form method="POST" @submit.prevent="save" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Name</label>
          <input
            type="text"
            class="form-control"
            :class="{ 'is-invalid': $page.props.errors.name }"
            id="name"
            v-model="editedHotel.name"
          />
          <div class="invalid-feedback" v-if="$page.props.errors.name">
            {{ $page.props.errors.name }}
          </div>
        </div>
        <img
          id="edit-image"
          :src="'/storage/images/hotels/' + hotel.id + '_large.jpg'"
        />
        <div class="form-group">
          <label for="image">Image</label>
          <input
            type="file"
            class="form-control-file"
            :class="{ 'is-invalid': $page.props.errors.image }"
            v-on:change="fileChange"
            id="image"
            name="image"
          />
          <div class="invalid-feedback" v-if="$page.props.errors.image">
            {{ $page.props.errors.image }}
          </div>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea
            class="form-control"
            :class="{ 'is-invalid': $page.props.errors.description }"
            v-model="editedHotel.description"
            id="description"
            rows="5"
          ></textarea>
          <div class="invalid-feedback" v-if="$page.props.errors.description">
            {{ $page.props.errors.description }}
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
      editedHotel: {
        name: "",
        description: "",
        image: "",
      },
    };
  },
  mounted() {
    if (this.hotel) {
      this.editedHotel.name = this.hotel.name;
      this.editedHotel.description = this.hotel.description;
      this.editedHotel.image = this.hotel.image;
    }
  },
  methods: {
    fileChange(event) {
      console.log("inside filechange");
      if (event.target.value != "") {
        this.editedHotel.image = event.target.files[0];
      }
    },
    save() {
      var data = new FormData();
      data.append("name", this.editedHotel.name || "");
      data.append("description", this.editedHotel.description || "");
      data.append('image', this.editedHotel.image || '');
      console.log(data.getAll('name'));
      console.log(data.getAll('image'));
      if (this.hotel && this.hotel.id) {
        // Edit
        data.append('_method', 'PUT');
        this.$inertia.post(
          route("hotel.update", this.hotel.id),
          data
        );
      } else {
        // Create
        this.$inertia.post(route("hotel.store"), data);
      }
    },
  },
};
</script>