<template>
  <navbar />
  <router-view />
</template>

<script>
import navbar from './components/navbar/navbar.vue';
export default {
  components: {
    navbar,
  }
}
</script>