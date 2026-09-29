import { describe, it, expect } from 'vitest'
import { mount } from '@vue/test-utils'
import { createRouter, createWebHistory } from 'vue-router'
import JcButton from '../JcButton.vue'

const router = createRouter({
  history: createWebHistory(),
  routes: [{ path: '/', component: { template: '<div />' } }],
})

describe('JcButton', () => {
  it('renders a button when neither to nor href is given', () => {
    const wrapper = mount(JcButton, { slots: { default: 'Envoyer' } })
    expect(wrapper.element.tagName).toBe('BUTTON')
    expect(wrapper.attributes('type')).toBe('button')
  })

  it('renders a RouterLink when to is given', async () => {
    await router.push('/')
    await router.isReady()
    const wrapper = mount(JcButton, {
      global: { plugins: [router] },
      props: { to: '/' },
      slots: { default: 'Accueil' },
    })
    expect(wrapper.element.tagName).toBe('A')
    expect(wrapper.attributes('href')).toBe('/')
  })

  it('renders an anchor when href is given', () => {
    const wrapper = mount(JcButton, {
      props: { href: 'https://example.com' },
      slots: { default: 'Externe' },
    })
    expect(wrapper.element.tagName).toBe('A')
    expect(wrapper.attributes('href')).toBe('https://example.com')
  })

  it('sets aria-disabled on a disabled link instead of the disabled attribute', () => {
    const wrapper = mount(JcButton, {
      props: { href: 'https://example.com', disabled: true },
      slots: { default: 'Externe' },
    })
    expect(wrapper.attributes('aria-disabled')).toBe('true')
    expect(wrapper.attributes('disabled')).toBeUndefined()
  })

  it('sets the disabled attribute on a disabled button', () => {
    const wrapper = mount(JcButton, {
      props: { disabled: true },
      slots: { default: 'Envoyer' },
    })
    expect(wrapper.attributes('disabled')).toBeDefined()
    expect(wrapper.attributes('aria-disabled')).toBeUndefined()
  })

  it('adds target and rel and hidden text only when external is set', () => {
    const wrapper = mount(JcButton, {
      props: { href: 'https://example.com', external: true },
      slots: { default: 'Externe' },
    })
    expect(wrapper.attributes('target')).toBe('_blank')
    expect(wrapper.attributes('rel')).toBe('noopener')
    expect(wrapper.text()).toContain('nouvel onglet')
  })
})
