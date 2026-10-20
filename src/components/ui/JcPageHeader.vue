<script setup>
defineProps({
  breadcrumb: {
    type: Array, // [{ label, to? }], last item has no `to`
    default: () => [],
  },
  overline: {
    type: String,
    default: null,
  },
  title: {
    type: String,
    required: true,
  },
  lead: {
    type: String,
    default: null,
  },
})
</script>

<template>
  <div class="jc-page-header">
    <nav v-if="breadcrumb.length" class="jc-breadcrumb" aria-label="Fil d'Ariane">
      <ol>
        <li v-for="crumb in breadcrumb" :key="crumb.label">
          <RouterLink v-if="crumb.to" :to="crumb.to">{{ crumb.label }}</RouterLink>
          <span v-else aria-current="page">{{ crumb.label }}</span>
        </li>
      </ol>
    </nav>
    <p v-if="overline" class="jc-overline">{{ overline }}</p>
    <h1 class="jc-h1">{{ title }}</h1>
    <p v-if="lead" class="jc-lead">{{ lead }}</p>
  </div>
</template>

<style>
.jc-page-header {
  display: grid;
  gap: var(--space-2);
  padding-block: var(--space-7) var(--space-5);
}

.jc-breadcrumb ol {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  gap: var(--space-1);
  margin: 0;
  padding: 0;
  list-style: none;
  font-size: 14px;
  color: var(--color-ink-subtle);
}

.jc-breadcrumb li:not(:last-child)::after {
  content: '/';
  margin-left: var(--space-1);
  color: var(--color-border-strong);
}

.jc-breadcrumb a {
  color: var(--color-ink-subtle);
}

.jc-breadcrumb a:hover {
  color: var(--color-brand-strong);
}

.jc-breadcrumb [aria-current='page'] {
  color: var(--color-ink);
}
</style>
