<script setup>
</script>

<template>
  <header>
    <div class="logo">
      <a href="?"><img src="/img/logo_JrCanDev.png" alt="Logo JrCanDev" height="50"></a>
    </div>
    <nav>
      <ul>
        <!-- Chemins vers toutes les pages -->
        <li><a href="?">Accueil</a></li>
        <li class="dérouler">
          <a href="#">A propos</a>
          <ul class="menu-déroulant">
            <li><a href="?page=contact&sub=charte">Charte</a></li>
            <li><a href="?page=contact&sub=rejoindre">Nous rejoindre</a></li>
            <li><a href="?page=contact&sub=contact">Nous contacter</a></li>
            <li><a href="?page=contact&sub=bureau">Bureau de l'asso</a></li>
          </ul>
        </li>
        <li class="dérouler">
          <a href="#">Services</a>
          <ul class="menu-déroulant">
            <li><a href="?page=services&sub=hebergement">Hébergement</a></li>
            <li><a href="?page=services&sub=developpement">Développement</a></li>
            <li><a href="?page=services&sub=impression_3D">Impression 3D</a></li>
            <li><a href="?page=services&sub=vr">Réalité virtuelle</a></li>
          </ul>
        </li>
        <!-- Réalisations désactivé temporairement, voir src/App.vue -->
        <li><a href="?page=faq">FAQ</a></li>
        <!-- Archive désactivé temporairement, voir src/App.vue -->
        <li><a href="https://files.jrcan.dev/web/client/login">Connexion</a></li>
      </ul>
    </nav>
  </header>
</template>
