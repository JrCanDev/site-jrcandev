import { REALISATIONS_ENABLED, ARCHIVES_ENABLED } from '../config'

// Shared between JcSiteHeader (3.1), the mobile menu (3.2) and JcSiteFooter (3.3).
// Shape: { label, to?, children?: [{ label, description?, to }] }
export const mainNav = [
  {
    label: 'Services',
    children: [
      {
        label: 'Hébergement',
        description: 'Mettez votre site en ligne gratuitement',
        to: '/services/hebergement',
      },
      {
        label: 'Aide au développement',
        description: 'Conseils et entraide sur vos projets',
        to: '/services/developpement',
      },
      {
        label: 'Impression 3D',
        description: "Imprimez vos pièces jusqu'à 30 × 30 × 40 cm",
        to: '/services/impression-3d',
      },
      {
        label: 'Réalité virtuelle',
        description: 'Casques et manettes à disposition sur autorisation',
        to: '/services/realite-virtuelle',
      },
    ],
  },
  {
    label: "L'association",
    children: [
      {
        label: 'Le bureau',
        description: "Les membres du bureau de l'association",
        to: '/association/bureau',
      },
      {
        label: 'Charte',
        description: "Charte d'utilisation du service d'hébergement",
        to: '/association/charte',
      },
      {
        label: 'Nous rejoindre',
        description: "Rejoindre l'association via notre serveur Discord",
        to: '/association/nous-rejoindre',
      },
      {
        label: 'Contact',
        description: "Contacter l'association",
        to: '/association/contact',
      },
    ],
  },
]

// Hidden entirely while disabled; no landing page exists for either route yet
// (only per-item sub-routes), so this needs revisiting before the flags flip on.
if (REALISATIONS_ENABLED) {
  if (ARCHIVES_ENABLED) {
    mainNav.push({
      label: 'Réalisations',
      children: [
        {
          label: 'Réalisations',
          description: 'Projets réalisés par les étudiants',
          to: '/realisations',
        },
        { label: 'Archives', description: 'Projets des années précédentes', to: '/archives' },
      ],
    })
  } else {
    mainNav.push({ label: 'Réalisations', to: '/realisations' })
  }
}

mainNav.push({ label: 'Aide & FAQ', to: '/aide' })
