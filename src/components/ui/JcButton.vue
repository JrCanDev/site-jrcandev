<script setup>
import { computed } from 'vue'
import { RouterLink } from 'vue-router'
import JcIcon from './JcIcon.vue'
import DiscordIcon from './DiscordIcon.vue'

const props = defineProps({
  variant: {
    type: String,
    default: 'primary',
    validator: (value) => ['primary', 'secondary', 'ghost', 'discord'].includes(value),
  },
  size: {
    type: String,
    default: 'md',
    validator: (value) => ['md', 'sm'].includes(value),
  },
  to: {
    type: [String, Object],
    default: null,
  },
  href: {
    type: String,
    default: null,
  },
  external: {
    type: Boolean,
    default: false,
  },
  icon: {
    type: [Object, Function],
    default: null,
  },
  disabled: {
    type: Boolean,
    default: false,
  },
})

const tag = computed(() => {
  if (props.to) return RouterLink
  if (props.href) return 'a'
  return 'button'
})

const isLink = computed(() => tag.value !== 'button')

function onClick(event) {
  if (isLink.value && props.disabled) {
    event.preventDefault()
  }
}

// Keys are only added when relevant: an explicit `undefined` on a RouterLink
// prop such as `href` would override its own rendered attribute.
const attrs = computed(() => {
  const result = {}
  if (props.to) result.to = props.to
  else if (props.href) result.href = props.href
  if (!isLink.value) result.type = 'button'
  if (props.external) {
    result.target = '_blank'
    result.rel = 'noopener'
  }
  if (!isLink.value && props.disabled) result.disabled = true
  if (isLink.value && props.disabled) result['aria-disabled'] = 'true'
  return result
})
</script>

<template>
  <component
    :is="tag"
    class="jc-btn"
    :class="[`jc-btn--${variant}`, size === 'sm' && 'jc-btn--sm']"
    v-bind="attrs"
    @click="onClick"
  >
    <DiscordIcon v-if="variant === 'discord'" />
    <slot />
    <JcIcon v-if="icon" :name="icon" />
    <span v-if="external" class="jc-visually-hidden"> (nouvel onglet)</span>
  </component>
</template>

<style>
.jc-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: var(--space-2);
  min-height: 44px;
  padding: var(--space-3) var(--space-5);
  border-radius: var(--radius-md);
  border: 1.5px solid transparent;
  font: 600 15px/20px var(--font-sans);
  text-decoration: none;
  cursor: pointer;
  transition:
    background-color 0.15s,
    border-color 0.15s,
    color 0.15s;
}

.jc-btn svg {
  width: 18px;
  height: 18px;
  flex: none;
}

.jc-btn--primary {
  background: var(--color-brand-strong);
  color: var(--color-on-brand-strong);
}

.jc-btn--primary:hover {
  filter: brightness(1.08);
}

.jc-btn--secondary {
  background: var(--color-surface-raised);
  color: var(--color-ink);
  border-color: var(--color-border-strong);
}

.jc-btn--secondary:hover {
  border-color: var(--color-ink);
}

.jc-btn--ghost {
  background: transparent;
  color: var(--color-brand-strong);
  padding-inline: var(--space-3);
}

.jc-btn--ghost:hover {
  background: var(--color-brand-soft);
  color: var(--color-on-brand-soft);
}

.jc-btn--discord {
  background: var(--color-discord);
  color: #ffffff;
}

.jc-btn--discord:hover {
  filter: brightness(1.1);
}

.jc-btn--sm {
  min-height: 36px;
  padding: var(--space-2) var(--space-4);
  font-size: 14px;
}

.jc-btn[aria-disabled='true'],
.jc-btn:disabled {
  opacity: 0.5;
  cursor: not-allowed;
  filter: none;
}

a.jc-btn--primary {
  color: var(--color-on-brand-strong);
}

a.jc-btn--discord {
  color: #ffffff;
}

a.jc-btn--secondary {
  color: var(--color-ink);
}
</style>
