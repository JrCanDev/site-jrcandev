<script setup>
import { ref } from 'vue'
import JcLightbox from './JcLightbox.vue'

defineProps({
  images: {
    type: Array,
    required: true,
  },
})

const lightboxRef = ref(null)
const activeIndex = ref(0)

function openAt(index, event) {
  activeIndex.value = index
  lightboxRef.value.open(event.currentTarget)
}
</script>

<template>
  <div class="jc-gallery">
    <button
      v-for="(image, index) in images"
      :key="image.src"
      type="button"
      class="jc-gallery__item"
      @click="openAt(index, $event)"
    >
      <img :src="image.src" :alt="image.alt" loading="lazy" width="320" height="240" />
    </button>
  </div>
  <JcLightbox ref="lightboxRef" v-model:active-index="activeIndex" :images="images" />
</template>

<style>
.jc-gallery {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
  gap: var(--space-3);
}

.jc-gallery__item {
  display: block;
  padding: 0;
  border: 1px solid var(--color-border);
  border-radius: var(--radius-md);
  overflow: hidden;
  line-height: 0;
  cursor: pointer;
  background: var(--color-surface-sunken);
}

.jc-gallery__item img {
  display: block;
  width: 100%;
  height: 100%;
  aspect-ratio: 4 / 3;
  object-fit: cover;
}

.jc-gallery__item:hover img,
.jc-gallery__item:focus-visible img {
  opacity: 0.9;
}
</style>
