<script setup>
</script>

<template>
  <header>
    <div class="logo">
      <RouterLink to="/"><img src="/img/logo_JrCanDev.png" alt="Logo JrCanDev" height="50"></RouterLink>
    </div>
    <nav>
      <ul>
        <!-- Links to all pages -->
        <li><RouterLink to="/">Accueil</RouterLink></li>
        <li class="dérouler">
          <a href="#">A propos</a>
          <ul class="menu-déroulant">
            <li><RouterLink to="/association/charte">Charte</RouterLink></li>
            <li><RouterLink to="/association/nous-rejoindre">Nous rejoindre</RouterLink></li>
            <li><RouterLink to="/association/contact">Nous contacter</RouterLink></li>
            <li><RouterLink to="/association/bureau">Bureau de l'asso</RouterLink></li>
          </ul>
        </li>
        <li class="dérouler">
          <a href="#">Services</a>
          <ul class="menu-déroulant">
            <li><RouterLink to="/services/hebergement">Hébergement</RouterLink></li>
            <li><RouterLink to="/services/developpement">Développement</RouterLink></li>
            <li><RouterLink to="/services/impression-3d">Impression 3D</RouterLink></li>
            <li><RouterLink to="/services/realite-virtuelle">Réalité virtuelle</RouterLink></li>
          </ul>
        </li>
        <!-- Realisations disabled, see src/config.js -->
        <li><RouterLink to="/aide">FAQ</RouterLink></li>
        <!-- Archives disabled, see src/config.js -->
        <li><a href="https://files.jrcan.dev/web/client/login">Connexion</a></li>
      </ul>
    </nav>
  </header>
</template>
