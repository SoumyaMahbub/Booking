<template>
  <div>
    <h1>Welcome</h1>
    <div>Hello</div>
    <div>{{ $page.props.foo }}</div>
    <div>{{ message }}</div>
    <inertia-link :href="$route('home')">Home</inertia-link>
  </div>
</template>
<script>
export default {
  data() {
    return {
      message: "this is a message",
    };
  },
};
</script>