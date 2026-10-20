<script setup>
import JcPageHeader from '../components/ui/JcPageHeader.vue'
import JcButton from '../components/ui/JcButton.vue'
</script>

<template>
  <div class="jc-container jc-section">
    <JcPageHeader
      title="Cette page n'existe pas (ou plus)"
      lead="Elle a peut-être changé d'adresse, ou quelqu'un a mal recopié un lien. Ça arrive, même aux meilleurs serveurs."
    />
    <div class="jc-not-found__actions">
      <JcButton to="/">Revenir à l'accueil</JcButton>
      <JcButton variant="secondary" to="/services/hebergement">Découvrir les services</JcButton>
      <JcButton variant="ghost" to="/aide">Consulter l'aide</JcButton>
    </div>
  </div>
</template>

<style>
.jc-not-found__actions {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-3);
}
</style>
