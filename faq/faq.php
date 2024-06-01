<?php
    require_once '../gabarit/header.php';
?>

<!-- Corps du code -->

<div class="corps">

    <div class="questions">
        <h2>Les différentes questions :</h2>
        <ul>
            <li>
                <a href="#hebergement">Héberger mon site</a>
            </li>
            <li>
                <a href="#changement-mot-de-passe">Changer mon mot de passe</a>
            </li>
            <li>
                <a href="#mise_en_ligne">Mettre mon site en ligne</a>
            </li>
            <li>
                <a href="#carac_accentués">Les caractères accentués ne s'affichent pas bien</a>
            </li>
            <li>
                <a href="#acces_bdd">Accéder à une base de données sur des sites dynamiques</a>
            </li>
            <li>
                <a href="#wordhtml">Créer une page web sans connaître HTML</a>
            </li>
            
        </ul>
    </div>

    <div class="dropdown">
        <div class="dropdown-toggle">
            <span> liens vers les questions </span>
        </div>
        <div class="dropdown-content">
            <h2>Les différentes questions :</h2>    
            <ul>
                <li>
                    <a href="#hebergement">Héberger mon site</a>
                </li>
                <li>
                    <a href="#changement-mot-de-passe">Changer mon mot de passe</a>
                </li>
                <li>
                    <a href="#mise_en_ligne">Mettre mon site en ligne</a>
                </li>
                <li>
                    <a href="#carac_accentués">Les caractères accentués ne s'affichent pas bien</a>
                </li>
                <li>
                    <a href="#acces_bdd">Accéder à une base de données sur des sites dynamiques</a>
                </li>
                <li>
                <a href="#wordhtml">Créer une page web sans connaître HTML</a>
            </li>
            </ul>
        </div>
    </div>





    <h1 id="hebergement">Demande d'hébergement</h1>
    <p>Dans un premier temps, il vous faudra trouver un nom pour votre projet. Celui-ci doit être tout en minuscule et caractère spécial.</p>
    <p>Vérifiez ensuite que ce nom n'est pas déjà pris en vous rendant à l'adresse :</p>
    <p><a href="https://projets.jrcandev.netlib.re/nomduprojet">https://projets.jrcandev.netlib.re/nomduprojet</a></p>
    <p>Si un projet est déjà en ligne à cette adresse (ou si vous tombez sur une erreur 403), alors vous devez trouver un autre nom.</p>
    <p>Ensuite, si ce n'est pas encore fait, rejoignez-nous sur discord <a href = "https://discord.gg/ScrCRy5YCU">(nous rejoindre)</a>. Dans le salon hébergement_projets, tagguez @ admin-discord en donnant le nom du projet à créer et en précisant si le projet nécessite l'accès à une base de données.</p>
    <p>Le compte sera créé et le mot de passe vous sera envoyé en message privé sur discord.</p>

    
    <h1 id="changement-mot-de-passe">Changement de mot de passe</h1>
    <p>Connectez-vous sur votre compte (<a href="https://files.jrcandev.netlib.re/web/client/login">ici</a>) puis cliquez sur votre nom d'utilisateur en haut à droite de la page et enfin "change password".</p>

    <div class="video-tutorial">
        <video controls>
            <source src="./change_pwd.mp4" type="video/mp4">
        </video>
    </div>

    <h1 id="mise_en_ligne">Mise en ligne du site (html/css)</h1>
    <p>Il existe deux possibilités pour mettre en ligne son site :</p>
    <ol>
        <li>Par le site de gestion de votre compte</li>
        <li>Par transfert FTP</li>
    </ol>

    <h2>Par le site de gestion de votre compte</h2>
    <ol>
        <li>Connectez-vous à votre compte (<a href="https://files.jrcandev.netlib.re/web/client/login">ici</a>).</li>
        <li>Sur la page d'accueil, l'espace disque accessible est affiché. Il vous suffit alors de cliquer et glisser les fichiers de votre site dans cet espace. Prenez garde à bien avoir un fichier index.html.</li>
    </ol>

    <!--<div class="video-tutorial">-->
        <!-- <video controls>
            
        </video> -->
    <!--</div>-->

    <h2>Par transfert FTP</h2>
    <ol>
      <li>Installez un client FTP, par exemple FileZilla.</li>
      <center><img src="./filezilla_00.png" width="500px"></center>
      <li>Ouvrez le gestionnaire de sites dans FileZilla et cliquez sur "Nouveau".</li>
	<center><img src="./filezilla_01.png" width="500px"></center><br />
	<li>Remplissez le formulaire avec informations de connexion suivantes :</li>
        <ul>
            <li>Protocole : SFTP</li>
            <li>Hôte : files.jrcandev.netlib.re</li>
            <li>Port : 2022</li>
            <li>Utilisateur : nomduprojet</li>
        </ul>
	<center><img src="./filezilla_02.png" width="500px"></center>
        <li>Cliquez sur "Valider".</li>
      <li>Revenez sur le gestionnaire de sites, sélectionnez le nouveau site, puis cliquez sur "Connexion".</li>
      <center><img src="./filezilla_03.png" width="500px"></center>
        <li>Entrez le mot de passe qui vous a été communiqué. Validez si des fenêtres d'avertissements apparaissent.</li>
      <li>Vous êtes maintenant connecté.</li>
      <center><img src="./filezilla_04.png" width="500px"></center>
        <li>Dans la partie basse gauche, naviguez sur votre disque dur local pour retrouver votre site, notamment votre fichier "index.html".</li>
        <li>Toujours dans cette partie basse gauche, sélectionnez tous les fichiers (y compris le fichier "index.html"), puis faites un clic droit et choisissez "Téléverser".</li>
        <li>Attendez que tous les fichiers soient envoyés.</li>
        <li>Rendez-vous sur le site <a href="https://projets.jrcandev.netlib.re/nomduprojet">https://projets.jrcandev.netlib.re/nomduprojet</a> pour vérifier que la mise en ligne s'est bien passée.</li>
    </ol>

    <h1 id="carac_accentués">Les caractères accentués ne s'affichent pas correctement</h1>
    <p>Pour gérer correctement les caractères accentués, vous devez indiquer l'encodage de caractères utf-8 dans la balise "head" de vos pages web :</p>
    <pre>
        &lt;head&gt;
        ...
        &lt;meta charset="utf-8"&gt;
        ...
        &lt;/head&gt;
    </pre>

    <div class="video-tutorial">
        <video controls>
            <source src="./carac_accentues.mp4" type="video/mp4">
        </video>
    </div>

    <h1 id="acces_bdd">Accéder à une base de données sur des sites dynamiques</h1>
    <p>
        Site exemple utilisant mysql disponible ici : <a href="https://demo-sql.jrcandev.netlib.re/" target="_blank">https://demo-sql.jrcandev.netlib.re/</a><br />
        Site exemple utilisant postgreSQL disponible ici : <a href="https://pgdemo.jrcandev.netlib.re/" target="_blank">https://pgdemo.jrcandev.netlib.re/</a>
    </p>
    <p><strong>Attention !</strong> Lorsque vous demandez l'ouverture d'un hébergement, spécifiez bien si vous voulez avoir une BD mysql ou pstgreSQL.</p>

    <h1 id="wordhtml">Créer une page web sans connaître HTML</h1>
    <p>
        Des outils en ligne vous permettront de créer des pages web en utilisant une interface de type word.<br />
        Voir ici : <a href="https://wordhtml.com/" target="_blank">https://wordhtml.com/</a>
    </p>

</div>
    

<!-- Fin corps du code -->

<?php
    require_once '../gabarit/footer.php';
?>
