<template>
  <NavBar/>
  <router-view/>
  <FooterApp/>
</template>

<script>
import FooterApp from './components/FooterApp.vue';
import NavBar from './components/NavBar.vue';

  export default {
    name: 'App',
    components: {
    NavBar,
    FooterApp
}
  }
</script>


<style>
  *{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }
</style>