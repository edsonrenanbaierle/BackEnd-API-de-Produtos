<template>
  <div>
    <NavBar/>
    <router-view/>
    <FooterApp/>
  </div>
</template>

<script setup>
import NavBar from './components/NavBar.vue';
import FooterApp from './components/FooterApp.vue';
</script>

<style>
  *{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }
</style>
