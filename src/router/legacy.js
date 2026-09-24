// Maps old ?page=...&sub=...&annee=... URLs to the new paths.
const NOT_FOUND = '/introuvable'

const services = {
  hebergement: '/services/hebergement',
  developpement: '/services/developpement',
  impression_3D: '/services/impression-3d',
  vr: '/services/realite-virtuelle',
}

const contact = {
  charte: '/association/charte',
  rejoindre: '/association/nous-rejoindre',
  contact: '/association/contact',
  bureau: '/association/bureau',
}

const promoSlugs = {
  but1_info: 'but1-info',
  but2_info: 'but2-info',
  but2_gea: 'but2-gea',
  but3_info: 'but3-info',
  ECV: 'e-cv',
  nuit_info: 'nuit-de-l-info',
  autres: 'autres',
}

const has = (map, key) => Object.hasOwn(map, key)

// Returns the new path, or null if the URL has no legacy `page` param.
export function resolveLegacyPath({ page, sub, annee }) {
  if (!page) return null

  switch (page) {
    case 'accueil':
      return sub ? NOT_FOUND : '/'
    case 'services':
      return has(services, sub) ? services[sub] : NOT_FOUND
    case 'contact':
      return has(contact, sub) ? contact[sub] : NOT_FOUND
    case 'faq':
      return sub ? NOT_FOUND : '/aide'
    case 'mentions_legales':
      return sub ? NOT_FOUND : '/mentions-legales'
    case 'realisations':
      if (!sub) return '/realisations'
      return has(promoSlugs, sub) ? `/realisations/${promoSlugs[sub]}` : NOT_FOUND
    case 'archives':
      if (!annee) return '/archives'
      if (!sub) return NOT_FOUND
      return has(promoSlugs, sub) ? `/archives/${annee}/${promoSlugs[sub]}` : NOT_FOUND
    default:
      return NOT_FOUND
  }
}
