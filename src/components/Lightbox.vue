<script setup>
import { ref, onMounted, onUnmounted } from 'vue'

// Opens a[rel="zoom"] links in an overlay; click outside the image to close.
const isOpen = ref(false)
const src = ref('')

function onDocumentClick(event) {
  const zoomLink = event.target.closest('a[rel="zoom"]')
  if (zoomLink) {
    event.preventDefault()
    src.value = zoomLink.getAttribute('href')
    isOpen.value = true
  }
}

function close() {
  isOpen.value = false
}

function onLightboxClick(event) {
  if (event.target === event.currentTarget) {
    close()
  }
}

onMounted(() => document.addEventListener('click', onDocumentClick))
onUnmounted(() => document.removeEventListener('click', onDocumentClick))
</script>

<template>
  <div class="voile" v-show="isOpen" @click="close"></div>
  <div class="lightbox" v-show="isOpen" @click="onLightboxClick">
    <img :src="src" alt="" class="lightbox-img">
  </div>
</template>
