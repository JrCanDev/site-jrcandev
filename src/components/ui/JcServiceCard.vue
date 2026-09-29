<script setup>
import { ArrowRight } from '@lucide/vue'
import JcIcon from './JcIcon.vue'
import JcTag from './JcTag.vue'

defineProps({
  icon: {
    type: [Object, Function],
    required: true,
  },
  title: {
    type: String,
    required: true,
  },
  tags: {
    type: Array,
    default: () => [],
  },
  cta: {
    type: String,
    required: true,
  },
  to: {
    type: [String, Object],
    required: true,
  },
})
</script>

<template>
  <div class="jc-card">
    <span class="jc-card__icon"><JcIcon :name="icon" /></span>
    <h3 class="jc-card__title">
      <RouterLink class="jc-card__link" :to="to">{{ title }}</RouterLink>
    </h3>
    <p class="jc-card__text"><slot /></p>
    <span v-if="tags.length" class="jc-card__tags">
      <JcTag v-for="tag in tags" :key="tag">{{ tag }}</JcTag>
    </span>
    <span class="jc-card__more" aria-hidden="true">
      {{ cta }}
      <JcIcon :name="ArrowRight" />
    </span>
  </div>
</template>

<style>
.jc-card {
  position: relative;
  display: flex;
  flex-direction: column;
  gap: var(--space-3);
  padding: var(--space-5);
  background: var(--color-surface-raised);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-sm);
  transition:
    box-shadow 0.15s,
    transform 0.15s,
    border-color 0.15s;
}

.jc-card:has(.jc-card__link:hover),
.jc-card:has(.jc-card__link:focus-visible) {
  box-shadow: var(--shadow-md);
  border-color: var(--color-border-strong);
  transform: translateY(-2px);
}

.jc-card__icon {
  width: 48px;
  height: 48px;
  display: grid;
  place-items: center;
  border-radius: var(--radius-md);
  background: var(--color-brand-soft);
  color: var(--color-on-brand-soft);
}

.jc-card__icon svg {
  width: 24px;
  height: 24px;
}

.jc-card__title {
  margin: 0;
  font: 600 22px/28px var(--font-display);
}

.jc-card__link {
  color: var(--color-ink);
  text-decoration: none;
}

.jc-card__link::after {
  content: '';
  position: absolute;
  inset: 0;
  border-radius: inherit;
}

.jc-card__link:hover {
  text-decoration: underline;
}

.jc-card__text {
  margin: 0;
  color: var(--color-ink-muted);
  font-size: 16px;
  line-height: 25px;
}

.jc-card__tags {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-2);
}

.jc-card__more {
  margin-top: auto;
  padding-top: var(--space-2);
  font: 600 15px/20px var(--font-sans);
  color: var(--color-brand-strong);
  display: inline-flex;
  gap: 6px;
  align-items: center;
}

.jc-card__more svg {
  width: 18px;
  height: 18px;
}
</style>
