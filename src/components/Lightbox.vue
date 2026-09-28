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
  <!-- Rewritten as an accessible <dialog> in JrCanFix-2.8 -->
  <!-- eslint-disable-next-line vuejs-accessibility/click-events-have-key-events, vuejs-accessibility/no-static-element-interactions -->
  <div v-show="isOpen" class="voile" @click="close"></div>
  <!-- eslint-disable-next-line vuejs-accessibility/click-events-have-key-events, vuejs-accessibility/no-static-element-interactions -->
  <div v-show="isOpen" class="lightbox" @click="onLightboxClick">
    <img :src="src" alt="" class="lightbox-img" />
  </div>
</template>
