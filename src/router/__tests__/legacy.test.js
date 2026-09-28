import { describe, it, expect } from 'vitest'
import { resolveLegacyPath } from '../legacy'

describe('resolveLegacyPath', () => {
  it('returns null without a page param', () => {
    expect(resolveLegacyPath({})).toBeNull()
  })

  it('maps the home page', () => {
    expect(resolveLegacyPath({ page: 'accueil' })).toBe('/')
  })

  it('rejects an unknown sub for the home page', () => {
    expect(resolveLegacyPath({ page: 'accueil', sub: 'x' })).toBe('/introuvable')
  })

  it.each([
    ['hebergement', '/services/hebergement'],
    ['developpement', '/services/developpement'],
    ['impression_3D', '/services/impression-3d'],
    ['vr', '/services/realite-virtuelle'],
  ])('maps services/%s', (sub, path) => {
    expect(resolveLegacyPath({ page: 'services', sub })).toBe(path)
  })

  it.each([
    ['charte', '/association/charte'],
    ['rejoindre', '/association/nous-rejoindre'],
    ['contact', '/association/contact'],
    ['bureau', '/association/bureau'],
  ])('maps contact/%s', (sub, path) => {
    expect(resolveLegacyPath({ page: 'contact', sub })).toBe(path)
  })

  it('maps the FAQ', () => {
    expect(resolveLegacyPath({ page: 'faq' })).toBe('/aide')
  })

  it('rejects an unknown sub for the FAQ', () => {
    expect(resolveLegacyPath({ page: 'faq', sub: 'x' })).toBe('/introuvable')
  })

  it('maps mentions legales', () => {
    expect(resolveLegacyPath({ page: 'mentions_legales' })).toBe('/mentions-legales')
  })

  it('maps realisations without a sub to the index', () => {
    expect(resolveLegacyPath({ page: 'realisations' })).toBe('/realisations')
  })

  it('maps a realisations promo, converting the slug', () => {
    expect(resolveLegacyPath({ page: 'realisations', sub: 'ECV' })).toBe('/realisations/e-cv')
  })

  it('maps archives without a year to the index', () => {
    expect(resolveLegacyPath({ page: 'archives' })).toBe('/archives')
  })

  it('rejects a year without a sub', () => {
    expect(resolveLegacyPath({ page: 'archives', annee: '2024-2025' })).toBe('/introuvable')
  })

  it('maps a year and promo', () => {
    expect(resolveLegacyPath({ page: 'archives', annee: '2024-2025', sub: 'nuit_info' })).toBe(
      '/archives/2024-2025/nuit-de-l-info',
    )
  })

  it('rejects an unknown page', () => {
    expect(resolveLegacyPath({ page: 'foo' })).toBe('/introuvable')
  })

  it('rejects an unknown sub instead of matching inherited object properties', () => {
    expect(resolveLegacyPath({ page: 'services', sub: 'constructor' })).toBe('/introuvable')
  })
})
