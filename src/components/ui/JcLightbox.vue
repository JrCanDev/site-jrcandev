<script setup>
import { ref, computed, nextTick } from 'vue'
import { X, ChevronLeft, ChevronRight } from '@lucide/vue'
import JcIcon from './JcIcon.vue'

const props = defineProps({
  images: {
    type: Array,
    required: true,
  },
})

const activeIndex = defineModel('activeIndex', { type: Number, default: 0 })

const dialogRef = ref(null)
const closeButtonRef = ref(null)
let triggerEl = null

const current = computed(() => props.images[activeIndex.value])
const hasMultiple = computed(() => props.images.length > 1)

async function open(trigger) {
  triggerEl = trigger ?? null
  document.body.style.overflow = 'hidden'
  dialogRef.value.showModal()
  await nextTick()
  closeButtonRef.value?.focus()
}

function close() {
  dialogRef.value.close()
}

function onClose() {
  document.body.style.overflow = ''
  triggerEl?.focus()
  triggerEl = null
}

function onBackdropClick(event) {
  if (event.target === dialogRef.value) close()
}

function prev() {
  activeIndex.value = (activeIndex.value - 1 + props.images.length) % props.images.length
}

function next() {
  activeIndex.value = (activeIndex.value + 1) % props.images.length
}

function onKeydown(event) {
  if (event.key === 'ArrowLeft') prev()
  else if (event.key === 'ArrowRight') next()
}

defineExpose({ open, close })
</script>

<template>
  <!-- native <dialog> is already keyboard-accessible (Escape, focus trap); this click only detects the backdrop area -->
  <!-- eslint-disable-next-line vuejs-accessibility/no-static-element-interactions -->
  <dialog
    ref="dialogRef"
    class="jc-lightbox"
    @click="onBackdropClick"
    @close="onClose"
    @keydown="onKeydown"
  >
    <figure v-if="current" class="jc-lightbox__figure">
      <button
        ref="closeButtonRef"
        type="button"
        class="jc-lightbox__close"
        aria-label="Fermer"
        @click="close"
      >
        <JcIcon :name="X" />
      </button>
      <button
        v-if="hasMultiple"
        type="button"
        class="jc-lightbox__nav jc-lightbox__nav--prev"
        aria-label="Image précédente"
        @click="prev"
      >
        <JcIcon :name="ChevronLeft" />
      </button>
      <img :src="current.src" :alt="current.alt" class="jc-lightbox__img" />
      <button
        v-if="hasMultiple"
        type="button"
        class="jc-lightbox__nav jc-lightbox__nav--next"
        aria-label="Image suivante"
        @click="next"
      >
        <JcIcon :name="ChevronRight" />
      </button>
      <figcaption v-if="current.caption" class="jc-lightbox__caption">
        {{ current.caption }}
      </figcaption>
    </figure>
  </dialog>
</template>

<style>
.jc-lightbox {
  max-width: min(90vw, 1100px);
  max-height: 90vh;
  padding: 0;
  border: none;
  border-radius: var(--radius-lg);
  background: var(--color-surface-raised);
  box-shadow: var(--shadow-md);
}

.jc-lightbox::backdrop {
  background: rgba(0, 0, 0, 0.6);
}

.jc-lightbox__figure {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: 0;
}

.jc-lightbox__img {
  display: block;
  max-width: min(90vw, 1100px);
  max-height: 80vh;
  width: auto;
  height: auto;
}

.jc-lightbox__caption {
  padding: var(--space-3) var(--space-4);
  color: var(--color-ink-muted);
  font-size: 14px;
  line-height: 20px;
  text-align: center;
}

.jc-lightbox__close {
  position: absolute;
  top: var(--space-3);
  right: var(--space-3);
  z-index: 1;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 44px;
  height: 44px;
  padding: 0;
  border: none;
  border-radius: var(--radius-pill);
  background: var(--color-surface-raised);
  color: var(--color-ink);
  box-shadow: var(--shadow-sm);
  cursor: pointer;
}

.jc-lightbox__close:hover {
  background: var(--color-surface-sunken);
}

.jc-lightbox__nav {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 44px;
  height: 44px;
  padding: 0;
  border: none;
  border-radius: var(--radius-pill);
  background: var(--color-surface-raised);
  color: var(--color-ink);
  box-shadow: var(--shadow-sm);
  cursor: pointer;
}

.jc-lightbox__nav:hover {
  background: var(--color-surface-sunken);
}

.jc-lightbox__nav--prev {
  left: var(--space-3);
}

.jc-lightbox__nav--next {
  right: var(--space-3);
}
</style>
