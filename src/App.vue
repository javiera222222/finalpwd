

<template>
  <div id="app">
    <MenuComponent />
    <router-view /> 
    <FooterComponent />
  </div>
</template>

<script setup lang="ts">
import MenuComponent from './components/MenuComponent.vue';
import FooterComponent from './components/FooterComponent.vue';

</script>

<style>

</style>
