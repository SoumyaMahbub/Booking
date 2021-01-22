<template>
  <div>
    <h1>Home</h1>
    <div>Hello</div>
    <div>{{ $page.props.foo }}</div>
    <div>{{ message }}</div>
    <a :href="route('welcome')">Welcome</a>
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