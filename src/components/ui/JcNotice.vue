<script setup>
import { computed } from 'vue'
import { Info, CircleCheck, TriangleAlert, CircleX } from '@lucide/vue'
import JcIcon from './JcIcon.vue'

const props = defineProps({
  tone: {
    type: String,
    required: true,
    validator: (value) => ['info', 'success', 'warning', 'danger'].includes(value),
  },
  title: {
    type: String,
    default: null,
  },
})

const icons = { info: Info, success: CircleCheck, warning: TriangleAlert, danger: CircleX }
const icon = computed(() => icons[props.tone])
const role = computed(() => {
  if (props.tone === 'success') return 'status'
  if (props.tone === 'danger') return 'alert'
  return 'note'
})
</script>

<template>
  <div class="jc-notice" :class="`jc-notice--${tone}`" :role="role">
    <span class="jc-notice__icon"><JcIcon :name="icon" /></span>
    <div>
      <p v-if="title" class="jc-notice__title">{{ title }}</p>
      <div class="jc-notice__text"><slot /></div>
    </div>
  </div>
</template>

<style>
.jc-notice {
  display: flex;
  gap: var(--space-3);
  padding: var(--space-4) var(--space-5);
  border-radius: var(--radius-md);
  background: var(--color-surface-sunken);
  border: 1px solid var(--color-border);
}

.jc-notice__icon {
  flex: none;
  width: 24px;
  height: 24px;
  display: grid;
  place-items: center;
}

.jc-notice__icon svg {
  width: 18px;
  height: 18px;
}

.jc-notice--info .jc-notice__icon {
  color: var(--color-info);
}

.jc-notice--success .jc-notice__icon {
  color: var(--color-brand-strong);
}

.jc-notice--warning .jc-notice__icon {
  color: var(--color-warning);
}

.jc-notice--danger .jc-notice__icon {
  color: var(--color-danger);
}

.jc-notice__title {
  margin: 0 0 2px;
  font-weight: 600;
}

.jc-notice__text {
  margin: 0;
  color: var(--color-ink-muted);
  font-size: 16px;
  line-height: 25px;
}

.jc-code {
  font-family: var(--font-mono);
  font-size: 14px;
  background: var(--color-surface-raised);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-sm);
  padding: 1px 6px;
  color: var(--color-ink);
}

.jc-kv {
  display: grid;
  grid-template-columns: max-content 1fr;
  gap: 4px var(--space-4);
  margin: var(--space-2) 0 0;
  font-size: 15px;
}

.jc-kv dt {
  color: var(--color-ink-subtle);
}

.jc-kv dd {
  margin: 0;
}
</style>
