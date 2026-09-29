<script setup>
import { onMounted, nextTick } from 'vue'

defineProps({
  items: {
    type: Array,
    required: true,
  },
})

onMounted(async () => {
  const hash = window.location.hash.slice(1)
  if (!hash) return
  await nextTick()
  const target = document.getElementById(hash)
  if (target instanceof HTMLDetailsElement) {
    target.open = true
    target.scrollIntoView()
  }
})
</script>

<template>
  <div class="jc-acc">
    <details v-for="item in items" :id="item.id" :key="item.id">
      <summary>{{ item.question }}</summary>
      <div class="jc-acc__body">
        <slot :name="`answer-${item.id}`">
          <p>{{ item.answer }}</p>
        </slot>
      </div>
    </details>
  </div>
</template>

<style>
.jc-acc {
  border-top: 1px solid var(--color-border);
}

.jc-acc details {
  border-bottom: 1px solid var(--color-border);
}

.jc-acc summary {
  list-style: none;
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: var(--space-4);
  padding: var(--space-4) var(--space-1);
  cursor: pointer;
  font: 600 19px/26px var(--font-display);
}

.jc-acc summary::-webkit-details-marker {
  display: none;
}

.jc-acc summary::after {
  content: '';
  flex: none;
  width: 28px;
  height: 28px;
  border-radius: var(--radius-pill);
  border: 1.5px solid var(--color-border-strong);
  background:
    linear-gradient(var(--color-ink), var(--color-ink)) center / 12px 2px no-repeat,
    linear-gradient(var(--color-ink), var(--color-ink)) center / 2px 12px no-repeat;
  transition:
    background-color 0.15s,
    border-color 0.15s;
}

.jc-acc details[open] summary::after {
  background: linear-gradient(var(--color-on-brand-strong), var(--color-on-brand-strong)) center /
    12px 2px no-repeat;
  background-color: var(--color-brand-strong);
  border-color: var(--color-brand-strong);
}

.jc-acc summary:hover {
  color: var(--color-brand-strong);
}

.jc-acc__body {
  padding: 0 var(--space-1) var(--space-5);
  color: var(--color-ink-muted);
  max-width: var(--measure);
}

.jc-acc__body p {
  margin: 0 0 var(--space-3);
}
</style>
