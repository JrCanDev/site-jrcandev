<script setup>
// Icon mapping for service cards: Server = hebergement, CodeXml = developpement,
// Box = impression 3D, Glasses = realite virtuelle (to validate)
defineProps({
  name: {
    type: [Object, Function],
    required: true,
  },
  label: {
    type: String,
    default: null,
  },
})
</script>

<template>
  <component
    :is="name"
    class="jc-icon"
    :size="24"
    :stroke-width="1.8"
    :aria-hidden="label ? null : 'true'"
    :role="label ? 'img' : null"
    :aria-label="label"
  />
</template>
