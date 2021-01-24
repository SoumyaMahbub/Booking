<template>
    <navbar></navbar>
    <h1>{{ username }}</h1>
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