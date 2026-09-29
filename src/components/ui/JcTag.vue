<script setup>
defineProps({
  tone: {
    type: String,
    default: 'neutral',
    validator: (value) => ['neutral', 'brand', 'accent', 'mono'].includes(value),
  },
})
</script>

<template>
  <span class="jc-tag" :class="tone !== 'neutral' && `jc-tag--${tone}`"><slot /></span>
</template>

<style>
.jc-tag {
  display: inline-flex;
  align-items: center;
  gap: var(--space-1);
  padding: 3px 10px;
  border-radius: var(--radius-sm);
  font: 500 13px/18px var(--font-sans);
  background: var(--color-surface-sunken);
  color: var(--color-ink-muted);
  border: 1px solid var(--color-border);
}

.jc-tag--brand {
  background: var(--color-brand-soft);
  color: var(--color-on-brand-soft);
  border-color: transparent;
}

.jc-tag--accent {
  background: var(--color-accent-soft);
  color: var(--color-accent);
  border-color: transparent;
}

.jc-tag--mono {
  font-family: var(--font-mono);
  font-size: 13px;
}
</style>
