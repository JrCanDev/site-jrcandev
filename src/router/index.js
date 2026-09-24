import { createRouter, createWebHistory } from 'vue-router'
import { REALISATIONS_ENABLED, ARCHIVES_ENABLED } from '../config'

const routes = [
  { path: '/', component: () => import('../pages/AccueilPage.vue'), meta: { title: 'Accueil', description: "JrCanDev, association d'étudiants et d'enseignants de l'IUT du Littoral Côte d'Opale." } },

  { path: '/services/hebergement', component: () => import('../pages/services/Hebergement.vue'), meta: { title: 'Hébergement', description: 'Hébergement gratuit de sites statiques et dynamiques pour les projets des étudiants.' } },
  { path: '/services/developpement', component: () => import('../pages/services/Developpement.vue'), meta: { title: 'Aide au développement', description: 'Une aide pour vos projets de développement web sur notre serveur Discord.' } },
  { path: '/services/impression-3d', component: () => import('../pages/services/Impression3D.vue'), meta: { title: 'Impression 3D', description: "Service d'impression 3D de l'association." } },
  { path: '/services/realite-virtuelle', component: () => import('../pages/services/Vr.vue'), meta: { title: 'Réalité virtuelle', description: 'Casques et manettes de réalité virtuelle à disposition sur autorisation.' } },

  { path: '/association/bureau', component: () => import('../pages/contact/Bureau.vue'), meta: { title: "Le bureau", description: "Les membres du bureau de l'association." } },
  { path: '/association/charte', component: () => import('../pages/contact/Charte.vue'), meta: { title: 'Charte', description: "Charte d'utilisation du service d'hébergement mutualisé." } },
  { path: '/association/nous-rejoindre', component: () => import('../pages/contact/Rejoindre.vue'), meta: { title: 'Nous rejoindre', description: "Rejoindre l'association via notre serveur Discord." } },
  { path: '/association/contact', component: () => import('../pages/contact/Contact.vue'), meta: { title: 'Contact', description: "Contacter l'association." } },

  { path: '/aide', component: () => import('../pages/FaqPage.vue'), meta: { title: 'Aide et FAQ', description: "Réponses aux questions fréquentes sur l'hébergement et le développement web." } },
  { path: '/mentions-legales', component: () => import('../pages/MentionsLegalesPage.vue'), meta: { title: 'Mentions légales', description: 'Mentions légales du site JrCanDev.' } },
]

if (REALISATIONS_ENABLED) {
  const subs = {
    'but1-info': () => import('../pages/realisations/But1Info.vue'),
    'but2-info': () => import('../pages/realisations/But2Info.vue'),
    'but2-gea': () => import('../pages/realisations/But2Gea.vue'),
    'but3-info': () => import('../pages/realisations/But3Info.vue'),
    'e-cv': () => import('../pages/realisations/Ecv.vue'),
    'nuit-de-l-info': () => import('../pages/realisations/NuitInfo.vue'),
    autres: () => import('../pages/realisations/Autres.vue'),
  }
  for (const [slug, component] of Object.entries(subs)) {
    routes.push({ path: `/realisations/${slug}`, component, meta: { title: 'Réalisations', description: 'Projets réalisés par les étudiants.' } })
  }
}

if (ARCHIVES_ENABLED) {
  const leaves = {
    '2023-2024': {
      'but1-info': () => import('../pages/archives/y2023-2024/But1Info.vue'),
      'but2-info': () => import('../pages/archives/y2023-2024/But2Info.vue'),
      'but2-gea': () => import('../pages/archives/y2023-2024/But2Gea.vue'),
      'e-cv': () => import('../pages/archives/y2023-2024/Ecv.vue'),
      'nuit-de-l-info': () => import('../pages/archives/y2023-2024/NuitInfo.vue'),
      autres: () => import('../pages/archives/y2023-2024/Autres.vue'),
    },
    '2024-2025': {
      'but1-info': () => import('../pages/archives/y2024-2025/But1Info.vue'),
      'but2-info': () => import('../pages/archives/y2024-2025/But2Info.vue'),
      'but2-gea': () => import('../pages/archives/y2024-2025/But2Gea.vue'),
      'but3-info': () => import('../pages/archives/y2024-2025/But3Info.vue'),
      'e-cv': () => import('../pages/archives/y2024-2025/Ecv.vue'),
      'nuit-de-l-info': () => import('../pages/archives/y2024-2025/NuitInfo.vue'),
      autres: () => import('../pages/archives/y2024-2025/Autres.vue'),
    },
  }
  routes.push({ path: '/archives', component: () => import('../pages/archives/ArchivesIndex.vue'), meta: { title: 'Archives', description: 'Archives des projets par année scolaire.' } })
  for (const [annee, promos] of Object.entries(leaves)) {
    for (const [slug, component] of Object.entries(promos)) {
      routes.push({ path: `/archives/${annee}/${slug}`, component, meta: { title: `Archives ${annee}`, description: `Projets de l'année ${annee}.` } })
    }
  }
}

routes.push({
  path: '/:pathMatch(.*)*',
  component: () => import('../pages/NotFoundPage.vue'),
  meta: { title: 'Page introuvable' },
})

const router = createRouter({
  history: createWebHistory(),
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) return savedPosition
    if (to.hash) return { el: to.hash }
    return { top: 0 }
  },
})

router.afterEach((to) => {
  document.title = to.meta.title ? `${to.meta.title} — JrCanDev` : 'JrCanDev'
})

export default router
