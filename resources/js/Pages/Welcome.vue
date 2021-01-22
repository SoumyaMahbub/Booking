<template>
  <div>
    <h1>Welcome</h1>
    <div>Hello</div>
    <div>{{ $page.props.foo }}</div>
    <div>{{ message }}</div>
    <a :href="route('home')">Home</a>
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