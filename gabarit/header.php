<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="FERMON Romain">
    <title>JrCanDev</title>
    <link rel="stylesheet" href="../gabarit/css.css"> <!-- Chemin vers le CSS du header -->
    <link rel="stylesheet" href="styles.css"> <!-- Chemin vers le fichier CSS de chaque page -->
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

      document.addEventListener('DOMContentLoaded', function() {
          const dropdown = document.querySelector('.dropdown');
          const dropdownToggle = dropdown.querySelector('.dropdown-toggle');
          const dropdownContent = dropdown.querySelector('.dropdown-content');

          dropdownToggle.addEventListener('click', function(event) {
              event.stopPropagation();
              dropdownContent.style.display = (dropdownContent.style.display === 'block') ? 'none' : 'block';
          });

          document.addEventListener('click', function() {
              dropdownContent.style.display = 'none'; // Ferme le menu en cliquant n'importe où sur la page
          });

          dropdownContent.addEventListener('click', function(event) {
              event.stopPropagation();
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
        <a href="../accueil/accueil.php"><img src="../gabarit/logo_JrCanDev.png" alt="Logo JrCanDev" height="50"></a>
      </div>
      <nav>
        <ul>
          <!-- Chemins vers toutes les pages -->
          <li><a href="../accueil/accueil.php">Accueil</a></li>
          <li class="dérouler">
            <a href="#">A propos</a>
            <ul class="menu-déroulant">
              <li><a href="../charte/charte.php">Charte</a></li>
              <li><a href="../rejoindre/rejoindre.php">Nous rejoindre</a></li>
              <li><a href="../contacter/contacter.php">Nous contacter</a></li>
              <li><a href="../bureau/bureau.php">Bureau de l'asso</a></li>
            </ul>
          </li>
          <li class="dérouler">
            <a href="#">Services</a>
            <ul class="menu-déroulant" id="2">
              <li><a href="../hebergement/hebergement.php">Hébergement</a></li>
              <li><a href="../developpement/developpement.php">Développement</a></li>
              <li><a href="../impression_3d/3d.php">Impression 3D</a></li>
              <li><a href="../vr/vr.php">Réalité virtuelle</a></li>
            </ul>
          </li>
          <li class="dérouler">
            <a href="#">Réalisations</a>
            <ul class="menu-déroulant" id="3">
              <li><a href="../realisations_but/realisations_but1_info.php">SAE-BUT1 INFO</a></li>
	      	  <li><a href="../realisations_but/realisations_but2_info.php">SAE-BUT2 INFO</a></li>
              <li><a href="../realisations_but/realisations_but2_gea.php">SAE-BUT2 GEA</a></li>
              <li><a href="../realisations_but/realisations_e-CV.php">e-CV</a></li>
              <li><a href="../realisations_but/realisations_nuit_info.php">Nuit de l'info 2023</a></li>
              <li><a href="../realisations_autres/autres.php">Autres</a></li>
            </ul>
          </li>
          <li><a href="../faq/faq.php">FAQ</a></li>
          <li><a href="https://files.jrcandev.netlib.re/web/client/login">Connexion</a></li>
        </ul>
      </nav>
    </header>
