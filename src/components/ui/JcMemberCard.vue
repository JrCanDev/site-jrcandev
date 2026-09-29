<script setup>
import { computed } from 'vue'

const props = defineProps({
  name: {
    type: String,
    required: true,
  },
  role: {
    type: String,
    required: true,
  },
  photo: {
    type: String,
    default: null,
  },
  honorary: {
    type: Boolean,
    default: false,
  },
})

const initials = computed(() =>
  props.name
    .split(/\s+/)
    .filter(Boolean)
    .slice(0, 2)
    .map((word) => word[0].toUpperCase())
    .join(''),
)
</script>

<template>
  <div class="jc-member">
    <img v-if="photo" class="jc-member__avatar" :src="photo" alt="" width="52" height="52" />
    <span v-else class="jc-member__avatar" :class="honorary && 'jc-member__avatar--accent'">{{
      initials
    }}</span>
    <div>
      <p class="jc-member__name">{{ name }}</p>
      <p class="jc-member__role">{{ role }}</p>
    </div>
  </div>
</template>

<style>
.jc-member {
  display: flex;
  align-items: center;
  gap: var(--space-4);
  padding: var(--space-4);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-md);
  background: var(--color-surface-raised);
}

.jc-member__avatar {
  flex: none;
  width: 52px;
  height: 52px;
  border-radius: var(--radius-pill);
  display: grid;
  place-items: center;
  background: var(--color-brand-soft);
  color: var(--color-on-brand-soft);
  font: 700 18px/1 var(--font-display);
  object-fit: cover;
}

.jc-member__avatar--accent {
  background: var(--color-accent-soft);
  color: var(--color-accent);
}

.jc-member__name {
  margin: 0;
  font-weight: 600;
}

.jc-member__role {
  margin: 0;
  font-size: 14px;
  line-height: 20px;
  color: var(--color-ink-muted);
}
</style>
