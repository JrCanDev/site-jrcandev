<script setup>
import { ref, watch, onMounted, onUnmounted } from 'vue'
import { useRoute } from 'vue-router'
import { ChevronDown, Menu, X } from '@lucide/vue'
import JcIcon from './JcIcon.vue'
import JcButton from './JcButton.vue'
import { mainNav } from '../../data/navigation.js'

const route = useRoute()
const openIndex = ref(null)
const navRef = ref(null)
const toggleRefs = ref([])

function setToggleRef(el, index) {
  if (el) toggleRefs.value[index] = el
}

function toggle(index) {
  openIndex.value = openIndex.value === index ? null : index
}

function close() {
  openIndex.value = null
}

function onDocumentClick(event) {
  if (openIndex.value !== null && navRef.value && !navRef.value.contains(event.target)) {
    close()
  }
}

function onKeydown(event) {
  if (event.key === 'Escape' && openIndex.value !== null) {
    const index = openIndex.value
    close()
    toggleRefs.value[index]?.focus()
  }
}

const mobileOpen = ref(false)
const mobileDialogRef = ref(null)

function openMobile() {
  document.body.style.overflow = 'hidden'
  mobileDialogRef.value.showModal()
  mobileOpen.value = true
}

function closeMobile() {
  mobileDialogRef.value?.close()
}

function onMobileClose() {
  document.body.style.overflow = ''
  mobileOpen.value = false
}

watch(
  () => route.fullPath,
  () => {
    close()
    if (mobileOpen.value) closeMobile()
  },
)

onMounted(() => {
  document.addEventListener('click', onDocumentClick)
  document.addEventListener('keydown', onKeydown)
})

onUnmounted(() => {
  document.removeEventListener('click', onDocumentClick)
  document.removeEventListener('keydown', onKeydown)
})

function hasActiveChild(item) {
  return item.children?.some((child) => route.path === child.to) ?? false
}

function menuId(index) {
  return `jc-header-menu-${index}`
}
</script>

<template>
  <header class="jc-header">
    <div class="jc-header__in">
      <RouterLink class="jc-logo" to="/" aria-label="JrCanDev, accueil">JrCanDev</RouterLink>
      <nav ref="navRef" class="jc-header__nav" aria-label="Navigation principale">
        <ul class="jc-nav">
          <li v-for="(item, index) in mainNav" :key="item.label">
            <template v-if="item.children">
              <button
                :ref="(el) => setToggleRef(el, index)"
                type="button"
                class="jc-nav__link"
                :class="hasActiveChild(item) && 'jc-nav__link--active'"
                :aria-expanded="openIndex === index"
                :aria-controls="menuId(index)"
                @click="toggle(index)"
              >
                {{ item.label }}
                <JcIcon :name="ChevronDown" />
              </button>
              <ul :id="menuId(index)" class="jc-menu" :hidden="openIndex !== index">
                <li v-for="child in item.children" :key="child.to">
                  <RouterLink :to="child.to">
                    <strong>{{ child.label }}</strong>
                    <span v-if="child.description">{{ child.description }}</span>
                  </RouterLink>
                </li>
              </ul>
            </template>
            <RouterLink v-else class="jc-nav__link" :to="item.to">
              {{ item.label }}
            </RouterLink>
          </li>
        </ul>
      </nav>
      <div class="jc-header__actions">
        <JcButton variant="ghost" size="sm" href="https://files.jrcan.dev/web/client/login">
          Espace membre
        </JcButton>
        <JcButton variant="primary" size="sm" to="/association/nous-rejoindre">
          Nous rejoindre
        </JcButton>
        <button
          type="button"
          class="jc-btn jc-btn--secondary jc-btn--sm jc-burger"
          aria-label="Ouvrir le menu"
          aria-controls="jc-mobile-nav"
          :aria-expanded="mobileOpen"
          @click="openMobile"
        >
          <JcIcon :name="Menu" />
        </button>
      </div>
    </div>
  </header>

  <dialog
    id="jc-mobile-nav"
    ref="mobileDialogRef"
    class="jc-mobile-nav"
    aria-label="Menu"
    @close="onMobileClose"
  >
    <div class="jc-mobile-nav__header">
      <span class="jc-logo">JrCanDev</span>
      <button
        type="button"
        class="jc-mobile-nav__close"
        aria-label="Fermer le menu"
        @click="closeMobile"
      >
        <JcIcon :name="X" />
      </button>
    </div>
    <nav aria-label="Navigation principale">
      <ul class="jc-mobile-nav__list">
        <li v-for="item in mainNav" :key="item.label">
          <details v-if="item.children" class="jc-mobile-nav__group">
            <summary>{{ item.label }}</summary>
            <ul>
              <li v-for="child in item.children" :key="child.to">
                <RouterLink :to="child.to">{{ child.label }}</RouterLink>
              </li>
            </ul>
          </details>
          <RouterLink v-else class="jc-mobile-nav__link" :to="item.to">
            {{ item.label }}
          </RouterLink>
        </li>
      </ul>
    </nav>
    <JcButton variant="ghost" href="https://files.jrcan.dev/web/client/login">
      Espace membre
    </JcButton>
  </dialog>
</template>

<style>
.jc-header {
  position: sticky;
  top: 0;
  z-index: 10;
  /* Cancel the legacy global `header { display:flex; padding:1em; ... }` rule
     (public/css/styles.css), still loaded for pages not yet migrated. */
  display: block;
  padding: 0;
  background: var(--color-surface-raised);
  border-bottom: 1px solid var(--color-border);
  box-shadow: var(--shadow-sm);
}

.jc-header__in {
  max-width: var(--container-max);
  margin: 0 auto;
  height: var(--header-height);
  padding: 0 var(--space-5);
  display: flex;
  align-items: center;
  gap: var(--space-6);
}

.jc-logo {
  display: inline-flex;
  align-items: center;
  gap: var(--space-2);
  font: 700 21px/1 var(--font-display);
  color: var(--color-ink);
  text-decoration: none;
  letter-spacing: -0.01em;
}

.jc-logo img {
  display: block;
  height: 36px;
  width: auto;
}

.jc-header__nav {
  /* Cancel the legacy `header nav { display:flex;flex-direction:column;
     font-size:25px;margin-top:1em } ` rule. */
  display: block;
  flex: 1;
  margin-top: 0;
  font-size: inherit;
}

.jc-nav {
  display: flex;
  align-items: center;
  /* Cancel the legacy `nav ul { justify-content:center;flex-wrap:wrap;
     margin-top:-20px;margin-right:20px } ` rule. */
  justify-content: flex-start;
  flex-wrap: nowrap;
  gap: var(--space-1);
  margin: 0;
  padding: 0;
  list-style: none;
}

.jc-nav > li {
  position: relative;
}

.jc-nav__link {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  min-height: 40px;
  padding: 0 var(--space-3);
  border: 0;
  background: none;
  border-radius: var(--radius-sm);
  font: 600 15px/20px var(--font-sans);
  color: var(--color-ink);
  text-decoration: none;
  cursor: pointer;
}

.jc-nav__link:hover {
  background: var(--color-brand-soft);
  color: var(--color-on-brand-soft);
}

.jc-nav__link[aria-current='page'],
.jc-nav__link--active {
  color: var(--color-brand-strong);
  box-shadow: inset 0 -2px 0 var(--color-brand-strong);
  border-radius: 0;
}

.jc-nav__link svg {
  width: 14px;
  height: 14px;
  transition: transform 0.15s;
}

.jc-nav__link[aria-expanded='true'] svg {
  transform: rotate(180deg);
}

.jc-menu {
  position: absolute;
  top: calc(100% + 6px);
  left: 0;
  min-width: 260px;
  margin: 0;
  padding: var(--space-2);
  list-style: none;
  /* Cancel the legacy `nav ul { display:flex;flex-wrap:wrap;
     justify-content:center } ` rule: items stack as a column, not a row. */
  display: block;
  background: var(--color-surface-raised);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-md);
  box-shadow: var(--shadow-md);
}

.jc-menu[hidden] {
  display: none;
}

.jc-menu a {
  display: block;
  padding: var(--space-2) var(--space-3);
  border-radius: var(--radius-sm);
  color: var(--color-ink);
  text-decoration: none;
}

.jc-menu a:hover {
  background: var(--color-brand-soft);
  color: var(--color-on-brand-soft);
}

.jc-menu a span {
  display: block;
  font-size: 14px;
  line-height: 20px;
  color: var(--color-ink-muted);
}

.jc-menu a strong {
  font-weight: 600;
  font-size: 15px;
}

.jc-header__actions {
  display: flex;
  gap: var(--space-2);
  align-items: center;
}

.jc-burger {
  display: none;
}

@media (max-width: 860px) {
  .jc-nav,
  .jc-header__actions .jc-btn--ghost {
    display: none;
  }

  .jc-burger {
    display: inline-flex;
    margin-left: auto;
  }

  .jc-header__in {
    height: 64px;
    padding: 0 var(--space-4);
  }
}

.jc-mobile-nav {
  position: fixed;
  inset: 0;
  margin: 0;
  padding: var(--space-5);
  border: none;
  max-width: none;
  max-height: none;
  width: 100vw;
  height: 100vh;
  background: var(--color-surface-raised);
}

.jc-mobile-nav[open] {
  display: flex;
  flex-direction: column;
  gap: var(--space-5);
}

.jc-mobile-nav::backdrop {
  background: rgba(0, 0, 0, 0.4);
}

.jc-mobile-nav__header {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.jc-mobile-nav__close {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 44px;
  height: 44px;
  padding: 0;
  border: none;
  border-radius: var(--radius-md);
  background: var(--color-surface-sunken);
  color: var(--color-ink);
  cursor: pointer;
}

.jc-mobile-nav__list {
  list-style: none;
  margin: 0;
  padding: 0;
  display: grid;
  gap: var(--space-2);
  overflow-y: auto;
}

.jc-mobile-nav__link,
.jc-mobile-nav__group summary {
  display: flex;
  align-items: center;
  min-height: 44px;
  padding: 0 var(--space-3);
  border-radius: var(--radius-sm);
  font: 600 16px/20px var(--font-sans);
  color: var(--color-ink);
  text-decoration: none;
  cursor: pointer;
  list-style: none;
}

.jc-mobile-nav__group summary::-webkit-details-marker {
  display: none;
}

.jc-mobile-nav__group ul {
  list-style: none;
  margin: 0;
  padding: 0 0 0 var(--space-4);
  display: grid;
  gap: var(--space-1);
}

.jc-mobile-nav__group ul a {
  display: flex;
  align-items: center;
  min-height: 44px;
  padding: 0 var(--space-3);
  border-radius: var(--radius-sm);
  color: var(--color-ink-muted);
  text-decoration: none;
}

.jc-mobile-nav .jc-btn {
  align-self: flex-start;
  margin-top: auto;
}
</style>
