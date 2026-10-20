<script setup>
import JcSiteHeader from './components/ui/JcSiteHeader.vue'
import JcSiteFooter from './components/ui/JcSiteFooter.vue'
import Lightbox from './components/Lightbox.vue'
</script>

<template>
  <a class="jc-skip-link" href="#contenu">Aller au contenu</a>
  <JcSiteHeader />
  <main id="contenu" tabindex="-1">
    <RouterView />
  </main>
  <JcSiteFooter />
  <Lightbox />
  <div id="jc-route-announcer" class="jc-visually-hidden" role="status" aria-live="polite"></div>
</template>

<style>
.jc-skip-link {
  position: absolute;
  top: -100%;
  left: var(--space-4);
  z-index: 100;
  padding: var(--space-2) var(--space-4);
  background: var(--color-brand-strong);
  color: var(--color-on-brand-strong);
  border-radius: var(--radius-sm);
  text-decoration: none;
}

.jc-skip-link:focus {
  top: var(--space-2);
}

#contenu:focus-visible {
  outline: none;
}
</style>
