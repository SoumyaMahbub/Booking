<template>

    <navbar :isHome="isHome" :isHotels="isHotels" :isAbout="isAbout"></navbar>


</template>
<script>
import Navbar from "./Layouts/Navbar.vue";
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
  }
}
</script>