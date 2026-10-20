import { nextTick } from 'vue'

const SITE_NAME = 'JrCanDev'

function setMetaTag(name, content) {
  let tag = document.querySelector(`meta[name="${name}"]`)
  if (!tag) {
    tag = document.createElement('meta')
    tag.setAttribute('name', name)
    document.head.appendChild(tag)
  }
  tag.setAttribute('content', content)
}

function setCanonical(path) {
  let link = document.querySelector('link[rel="canonical"]')
  if (!link) {
    link = document.createElement('link')
    link.setAttribute('rel', 'canonical')
    document.head.appendChild(link)
  }
  link.setAttribute('href', new URL(path, window.location.origin).toString())
}

function announce(text) {
  const region = document.getElementById('jc-route-announcer')
  if (region) region.textContent = text
}

function focusPageHeading() {
  const heading = document.querySelector('#contenu h1') ?? document.getElementById('contenu')
  if (!heading) return
  heading.setAttribute('tabindex', '-1')
  heading.focus()
}

// Called from router.afterEach on every navigation.
export function usePageMeta(to) {
  const title = to.meta.title
  document.title = title ? `${title} — ${SITE_NAME}` : SITE_NAME
  setMetaTag('description', to.meta.description ?? `${SITE_NAME}, association étudiante.`)
  setMetaTag('robots', to.meta.robots ?? 'index, follow')
  setCanonical(to.fullPath)

  nextTick(() => {
    focusPageHeading()
    announce(title ?? 'Page chargée')
  })
}
