<script setup>
import { computed } from 'vue'
import { useQueryRoute } from './composables/useQueryRoute'
import SiteHeader from './components/SiteHeader.vue'
import SiteFooter from './components/SiteFooter.vue'
import Lightbox from './components/Lightbox.vue'

import AccueilPage from './pages/AccueilPage.vue'
import FaqPage from './pages/FaqPage.vue'
import MentionsLegalesPage from './pages/MentionsLegalesPage.vue'

import Hebergement from './pages/services/Hebergement.vue'
import Developpement from './pages/services/Developpement.vue'
import Impression3D from './pages/services/Impression3D.vue'
import Vr from './pages/services/Vr.vue'

import Charte from './pages/contact/Charte.vue'
import Rejoindre from './pages/contact/Rejoindre.vue'
import Contact from './pages/contact/Contact.vue'
import Bureau from './pages/contact/Bureau.vue'

import But1Info from './pages/realisations/But1Info.vue'
import But2Info from './pages/realisations/But2Info.vue'
import But2Gea from './pages/realisations/But2Gea.vue'
import But3Info from './pages/realisations/But3Info.vue'
import Ecv from './pages/realisations/Ecv.vue'
import NuitInfo from './pages/realisations/NuitInfo.vue'
import Autres from './pages/realisations/Autres.vue'

import ArchivesIndex from './pages/archives/ArchivesIndex.vue'
import Archives2023But1Info from './pages/archives/y2023-2024/But1Info.vue'
import Archives2023But2Info from './pages/archives/y2023-2024/But2Info.vue'
import Archives2023But2Gea from './pages/archives/y2023-2024/But2Gea.vue'
import Archives2023Ecv from './pages/archives/y2023-2024/Ecv.vue'
import Archives2023NuitInfo from './pages/archives/y2023-2024/NuitInfo.vue'
import Archives2023Autres from './pages/archives/y2023-2024/Autres.vue'
import Archives2024But1Info from './pages/archives/y2024-2025/But1Info.vue'
import Archives2024But2Info from './pages/archives/y2024-2025/But2Info.vue'
import Archives2024But2Gea from './pages/archives/y2024-2025/But2Gea.vue'
import Archives2024But3Info from './pages/archives/y2024-2025/But3Info.vue'
import Archives2024Ecv from './pages/archives/y2024-2025/Ecv.vue'
import Archives2024NuitInfo from './pages/archives/y2024-2025/NuitInfo.vue'
import Archives2024Autres from './pages/archives/y2024-2025/Autres.vue'

const { page, sub, annee } = useQueryRoute()

// Transposition directe des switch() imbriqués de index.php et des
// controllers/*/index.controller.php d'origine : mêmes URLs, mêmes
// combinaisons valides, même comportement (combinaison invalide -> page
// blanche, comme un include PHP qui ne matche aucun cas).
const realisationsSubs = {
  but1_info: But1Info,
  but2_info: But2Info,
  but2_gea: But2Gea,
  but3_info: But3Info,
  ECV: Ecv,
  nuit_info: NuitInfo,
  autres: Autres,
}

const servicesSubs = {
  hebergement: Hebergement,
  developpement: Developpement,
  impression_3D: Impression3D,
  vr: Vr,
}

const contactSubs = {
  charte: Charte,
  rejoindre: Rejoindre,
  contact: Contact,
  bureau: Bureau,
}

const archivesLeaves = {
  '2023-2024': {
    but1_info: Archives2023But1Info,
    but2_info: Archives2023But2Info,
    but2_gea: Archives2023But2Gea,
    ECV: Archives2023Ecv,
    nuit_info: Archives2023NuitInfo,
    autres: Archives2023Autres,
  },
  '2024-2025': {
    but1_info: Archives2024But1Info,
    but2_info: Archives2024But2Info,
    but2_gea: Archives2024But2Gea,
    but3_info: Archives2024But3Info,
    ECV: Archives2024Ecv,
    nuit_info: Archives2024NuitInfo,
    autres: Archives2024Autres,
  },
}

function resolveArchives(subValue, anneeValue) {
  if (anneeValue === null) return ArchivesIndex
  if (!['2023-2024', '2024-2025', '2025-2026'].includes(anneeValue)) return null
  if (subValue === null) return null
  return archivesLeaves[anneeValue]?.[subValue] ?? null
}

// Désactivés temporairement à la demande de l'utilisateur : le menu ne les
// affiche plus et l'accès direct par URL est bloqué (page blanche, comme une
// combinaison invalide). Remettre à `true` pour les réactiver.
const REALISATIONS_ENABLED = false
const ARCHIVES_ENABLED = false

const currentPage = computed(() => {
  switch (page.value) {
    case 'realisations':
      return REALISATIONS_ENABLED ? realisationsSubs[sub.value] ?? null : null
    case 'contact':
      return contactSubs[sub.value] ?? null
    case 'services':
      return servicesSubs[sub.value] ?? null
    case 'faq':
      return sub.value === null ? FaqPage : null
    case 'archives':
      return ARCHIVES_ENABLED ? resolveArchives(sub.value, annee.value) : null
    case 'mentions_legales':
      return sub.value === null ? MentionsLegalesPage : null
    case 'accueil':
    case null:
      return sub.value === null ? AccueilPage : null
    default:
      return null
  }
})
</script>

<template>
  <template v-if="currentPage">
    <SiteHeader />
    <component :is="currentPage" />
    <SiteFooter />
    <Lightbox />
  </template>
</template>
