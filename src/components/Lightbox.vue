<script setup>
import { ref, onMounted, onUnmounted } from 'vue'

// Reimplémentation sans jQuery du zoom d'image ($("a[rel='zoom']")) présent
// dans gabarit/header.php à l'origine : un clic sur un lien rel="zoom" ouvre
// l'image en grand, un clic sur le voile ou en dehors de l'image la referme.
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
