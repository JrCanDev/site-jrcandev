<script setup>
import { mainNav } from '../../data/navigation.js'

const servicesNav = mainNav.find((item) => item.label === 'Services')
const associationNav = mainNav.find((item) => item.label === "L'association")
const currentYear = new Date().getFullYear()
</script>

<template>
  <footer class="jc-footer">
    <div class="jc-footer__in">
      <div>
        <RouterLink class="jc-logo" to="/">JrCanDev</RouterLink>
        <p class="jc-footer__intro">
          Association loi 1901 d'étudiants et d'enseignants de l'IUT du Littoral Côte d'Opale.
        </p>
      </div>
      <div>
        <h4>Services</h4>
        <ul>
          <li v-for="child in servicesNav.children" :key="child.to">
            <RouterLink :to="child.to">{{ child.label }}</RouterLink>
          </li>
        </ul>
      </div>
      <div>
        <h4>L'association</h4>
        <ul>
          <li v-for="child in associationNav.children" :key="child.to">
            <RouterLink :to="child.to">{{ child.label }}</RouterLink>
          </li>
        </ul>
      </div>
      <div>
        <h4>Contact</h4>
        <ul>
          <li><a href="https://discord.gg/pW3gVfK22z">Discord</a></li>
          <li><a href="mailto:jrcandev@free.fr">jrcandev@free.fr</a></li>
          <li>IUTLCO, Rue Louis David, 62100 Calais</li>
        </ul>
      </div>
    </div>
    <div class="jc-footer__legal">
      <span>© 2021–{{ currentYear }} JrCanDev</span>
      <RouterLink to="/mentions-legales">Mentions légales</RouterLink>
    </div>
  </footer>
</template>

<style>
.jc-footer {
  /* Cancel the legacy global `footer { padding:1em; ... }` rule
     (public/css/styles.css), still loaded for pages not yet migrated. */
  padding: 0;
  background: var(--color-surface-sunken);
  border-top: 1px solid var(--color-border);
  color: var(--color-ink-muted);
  font-size: 15px;
}

.jc-footer__in {
  max-width: var(--container-max);
  margin: 0 auto;
  padding: var(--space-7) var(--space-5) var(--space-5);
  display: grid;
  grid-template-columns: 1.4fr repeat(3, 1fr);
  gap: var(--space-6);
}

.jc-footer__intro {
  margin: var(--space-3) 0 0;
  max-width: 30ch;
  /* Cancel the legacy `footer p { text-align:center } ` rule. */
  text-align: left;
}

.jc-footer h4 {
  margin: 0 0 var(--space-3);
  font: 600 13px/16px var(--font-sans);
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: var(--color-ink-subtle);
}

.jc-footer ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: grid;
  gap: var(--space-2);
}

.jc-footer li {
  /* Cancel the legacy `footer li { margin:auto;text-align:center } ` rule. */
  margin: 0;
  text-align: left;
}

.jc-footer a {
  color: var(--color-ink);
  text-decoration: none;
}

.jc-footer a:hover {
  color: var(--color-brand-strong);
  text-decoration: underline;
}

.jc-footer__legal {
  max-width: var(--container-max);
  margin: 0 auto;
  padding: var(--space-4) var(--space-5);
  border-top: 1px solid var(--color-border);
  display: flex;
  justify-content: space-between;
  gap: var(--space-4);
  flex-wrap: wrap;
  font-size: 14px;
  color: var(--color-ink-subtle);
}

@media (max-width: 760px) {
  .jc-footer__in {
    grid-template-columns: 1fr 1fr;
  }
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
</style>
