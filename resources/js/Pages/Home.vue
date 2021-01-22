<template>
  <div>
    <h1>Home</h1>
    <div>Hello</div>
    <div>{{ $page.props.foo }}</div>
    <div>{{ message }}</div>
    <inertia-link :href="$route('welcome')">Welcome</inertia-link>
  </div>
</template>
<script>
export default {
  data() {
      return {
        message: 'this is a message'
      }
    },
};
</script>