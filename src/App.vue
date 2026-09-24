<script setup>
import SiteHeader from './components/SiteHeader.vue'
import SiteFooter from './components/SiteFooter.vue'
import Lightbox from './components/Lightbox.vue'
</script>

<template>
  <SiteHeader />
  <RouterView />
  <SiteFooter />
  <Lightbox />
</template>
