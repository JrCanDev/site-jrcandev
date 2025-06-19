<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="FERMON Romain">
    <title>JrCanDev</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
          $("a[rel='zoom']").click(function(event){
              event.preventDefault();
              $(".lightbox").html("<img src='"+ $(this).attr("href")+ "' alt=''>");

              $(".voile").fadeIn();
              $(".lightbox").fadeIn();
          });

          $(".voile").click(function(event){
              event.preventDefault();
              $(".lightbox").fadeOut();
              $(".voile").fadeOut();
          });

          $(".lightbox").click(function(event){
              if (event.target === this) {
                  $(".lightbox").fadeOut();
                  $(".voile").fadeOut();
              }
          });
      });
      </script>
  </head>
  <body>
    <div class="voile"></div>
    <div class="lightbox">
      <img src="" alt="" class="lightbox-img">
    </div>
    <header>
      <div class="logo">
        <a href="?"><img src="img/logo_JrCanDev.png" alt="Logo JrCanDev" height="50"></a>
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
          <li class="dérouler">
            <a href="#">Réalisations</a>
            <ul class="menu-déroulant">
              <li><a href="?page=realisations&sub=but1_info">SAE-BUT1 INFO</a></li>
	      	    <li><a href="?page=realisations&sub=but2_info">SAE-BUT2 INFO</a></li>
              <li><a href="?page=realisations&sub=but2_gea">SAE-BUT2 GEA</a></li>
              <li><a href="?page=realisations&sub=but3_info">SAE-BUT3 INFO</a></li>
              <li><a href="?page=realisations&sub=ECV">e-CV</a></li>
              <li><a href="?page=realisations&sub=nuit_info">Nuit de l'info 2023</a></li>
              <li><a href="?page=realisations&sub=autres">Autres</a></li>
            </ul>
          </li>
          <li><a href="?page=faq">FAQ</a></li>
          <li><a href="?page=archives">Archive</a></li>
          <li><a href="https://files.jrcan.dev/web/client/login">Connexion</a></li>
        </ul>
      </nav>
    </header>
