<script setup>
import { ref } from 'vue'
import { Server, CodeXml, Box, Glasses } from '@lucide/vue'
import JcButton from '../components/ui/JcButton.vue'
import JcTag from '../components/ui/JcTag.vue'
import JcNotice from '../components/ui/JcNotice.vue'
import JcAccordion from '../components/ui/JcAccordion.vue'
import JcServiceCard from '../components/ui/JcServiceCard.vue'
import JcMemberCard from '../components/ui/JcMemberCard.vue'
import JcGallery from '../components/ui/JcGallery.vue'
import JcSiteHeader from '../components/ui/JcSiteHeader.vue'
import JcSiteFooter from '../components/ui/JcSiteFooter.vue'
import JcPageHeader from '../components/ui/JcPageHeader.vue'

const theme = ref('light')

function toggleTheme() {
  theme.value = theme.value === 'light' ? 'dark' : 'light'
  document.documentElement.dataset.theme = theme.value
}

const accordionItems = [
  { id: 'changer-mot-de-passe', question: 'Comment changer mon mot de passe ?' },
  { id: 'mettre-en-ligne', question: 'Comment mettre mon site en ligne ?' },
]

const galleryImages = [
  { src: '/img/impression_3D/Deckbox.jpg', alt: 'Deckbox imprimée en 3D', caption: 'Deckbox' },
  {
    src: '/img/impression_3D/imprimante.jpg',
    alt: "Imprimante 3D de l'association",
    caption: 'Imprimante',
  },
]
</script>

<template>
  <main class="styleguide">
    <header class="styleguide__header">
      <h1 class="jc-h1">Styleguide</h1>
      <button type="button" class="jc-btn jc-btn--secondary jc-btn--sm" @click="toggleTheme">
        Thème : {{ theme === 'light' ? 'clair' : 'sombre' }}
      </button>
    </header>

    <section>
      <h2 class="jc-h2">Button</h2>
      <div class="styleguide__row">
        <JcButton>Primary</JcButton>
        <JcButton variant="secondary">Secondary</JcButton>
        <JcButton variant="ghost">Ghost</JcButton>
        <JcButton variant="discord">Rejoindre le Discord</JcButton>
      </div>
      <div class="styleguide__row">
        <JcButton size="sm">Primary sm</JcButton>
        <JcButton variant="secondary" size="sm">Secondary sm</JcButton>
      </div>
      <div class="styleguide__row">
        <JcButton disabled>Bouton désactivé</JcButton>
        <JcButton href="https://example.com" disabled>Lien désactivé</JcButton>
        <JcButton href="https://example.com" external>Lien externe</JcButton>
      </div>
    </section>

    <section>
      <h2 class="jc-h2">Tag</h2>
      <div class="styleguide__row">
        <JcTag>Neutre</JcTag>
        <JcTag tone="brand">Gratuit pour les membres</JcTag>
        <JcTag tone="accent">Nouveau</JcTag>
        <JcTag tone="mono">docker</JcTag>
      </div>
    </section>

    <section>
      <h2 class="jc-h2">Notice</h2>
      <div class="styleguide__stack">
        <JcNotice tone="info" title="Paramètres de connexion SFTP">
          <dl class="jc-kv">
            <dt>Hôte</dt>
            <dd><code class="jc-code">files.jrcan.dev</code></dd>
            <dt>Port</dt>
            <dd><code class="jc-code">2022</code></dd>
          </dl>
        </JcNotice>
        <JcNotice tone="success" title="Demande envoyée">
          Un membre du bureau vous répond sur Discord sous 48 h ouvrées.
        </JcNotice>
        <JcNotice tone="warning" title="Nom de projet">
          Minuscules uniquement, sans espace ni caractère spécial.
        </JcNotice>
        <JcNotice tone="danger" title="Erreur"> Ce nom de projet est déjà utilisé. </JcNotice>
      </div>
    </section>

    <section>
      <h2 class="jc-h2">Accordion</h2>
      <JcAccordion :items="accordionItems">
        <template #answer-changer-mot-de-passe>
          <p>
            Dans l'espace membre, ouvrez le menu de votre nom d'utilisateur puis « Changer le mot de
            passe ».
          </p>
        </template>
        <template #answer-mettre-en-ligne>
          <p>
            Déposez vos fichiers via SFTP, hôte <code class="jc-code">files.jrcan.dev</code>, port
            <code class="jc-code">2022</code>.
          </p>
        </template>
      </JcAccordion>
    </section>

    <section>
      <h2 class="jc-h2">ServiceCard</h2>
      <div class="styleguide__grid">
        <JcServiceCard
          :icon="Server"
          title="Hébergement"
          :tags="['Statique', 'PHP']"
          cta="Demander un hébergement"
          to="/services/hebergement"
        >
          Mettez en ligne un site vitrine, une application PHP ou un projet Docker.
        </JcServiceCard>
        <JcServiceCard
          :icon="CodeXml"
          title="Aide au développement"
          cta="Poser une question"
          to="/services/developpement"
        >
          Une idée à structurer, une fonctionnalité qui résiste ? Des membres vous conseillent.
        </JcServiceCard>
        <JcServiceCard
          :icon="Box"
          title="Impression 3D"
          cta="Préparer une impression"
          to="/services/impression-3d"
        >
          Imprimez prototypes et pièces jusqu'à 30 × 30 × 40 cm.
        </JcServiceCard>
        <JcServiceCard
          :icon="Glasses"
          title="Réalité virtuelle"
          cta="Réserver un créneau"
          to="/services/realite-virtuelle"
        >
          Casques et manettes à disposition sur autorisation.
        </JcServiceCard>
      </div>
    </section>

    <section>
      <h2 class="jc-h2">MemberCard</h2>
      <div class="styleguide__grid">
        <!-- `role` here is JcMemberCard's own prop, not an ARIA role -->
        <!-- eslint-disable vuejs-accessibility/aria-role -->
        <JcMemberCard name="Théo Paepe" role="Président" />
        <JcMemberCard name="Laurane Mouronval" role="Présidente d'honneur" honorary />
        <!-- eslint-enable vuejs-accessibility/aria-role -->
      </div>
    </section>

    <section>
      <h2 class="jc-h2">Gallery / Lightbox</h2>
      <JcGallery :images="galleryImages" />
    </section>

    <section>
      <h2 class="jc-h2">PageHeader</h2>
      <JcPageHeader
        :breadcrumb="[{ label: 'Accueil', to: '/' }, { label: 'Hébergement' }]"
        overline="Services"
        title="Mettez votre site en ligne"
        lead="Hébergement gratuit de sites statiques et dynamiques pour les projets des étudiants."
      />
    </section>

    <section>
      <h2 class="jc-h2">SiteHeader</h2>
      <p class="jc-small">Reste collé en haut de la fenêtre en défilant (comportement normal).</p>
      <JcSiteHeader />
    </section>

    <section>
      <h2 class="jc-h2">SiteFooter</h2>
      <JcSiteFooter />
    </section>
  </main>
</template>

<style>
.styleguide {
  max-width: var(--container-max);
  margin: 0 auto;
  padding: var(--space-6) var(--space-5);
  display: grid;
  gap: var(--space-7);
}

.styleguide__header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: var(--space-4);
}

.styleguide__row {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-3);
  margin-top: var(--space-3);
}

.styleguide__stack {
  display: grid;
  gap: var(--space-3);
  margin-top: var(--space-3);
}

.styleguide__grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
  gap: var(--space-5);
  margin-top: var(--space-3);
}
</style>
