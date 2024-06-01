<?php
    require_once '../gabarit/header.php';
?>

<!-- Corps du code -->

<div class="corps">
    <h1>Nous proposons un service d'impression 3D</h1>
    <p>Afin de permettre à tout le monde d'imprimer ce qu'il souhaite. Pour pouvoir en profiter, contactez nous sur notre <a href="../rejoindre/rejoindre.php">discord</a>.</p>
    <div style="display: flex; align-items: flex-start;">
        <div class="gallery-item">
            <a href="./imprimante.jpg" rel="zoom"><img src="./imprimante.jpg" alt="photo_imprimante" width="200" height="300"></a>
        </div>
        <div style="margin-left: 10px;">
            <h1>Présentation de notre matériel</h1>
            <p style="margin-top: 0; max-width: 500px; justify-content: center; font-size: 25px;">Cette imprimante est une imprimante de la marque CREALITY (référence : creality cr-10S pro V2).</p> 
            <p style="margin-top: 20px;"> Date de sortie : septembre 2020.</p>
        </div>
    </div>
    <div class="details" style="margin-top: 10px;">
        <p>Quelques détails :</p>
        <ul style="margin-bottom: 0; list-style-type: '- '; padding-left: 0;">
            <li>Impression 3D de haute qualité</li>
            <li>Grand volume d'impression : jusqu'à 300 mm x 300 mm x 400 mm</li>
            <li>Structure solide en aluminium avec une stabilité améliorée</li>
            <li>Plateau chauffant en verre trempé pour une adhérence optimale</li>
            <li>Double moteur Z pour une stabilité et une précision accrues</li>
            <li>Écran tactile couleur de 4,3 pouces pour une utilisation conviviale</li>
            <li>Système de nivellement automatique du plateau</li>
            <li>Extrudeur tout en métal pour une alimentation fiable du filament</li>
            <li>Vitesse d'impression rapide jusqu'à 180 mm/s</li>
            <li>Connectivité facilitée grâce à la carte SD, l'USB et la connectivité en ligne</li>
            <li>Éclairage LED intégré pour une visualisation facile de l'impression</li>
            <li>Prise en charge du découpage et de l'impression hors ligne</li>
            <li>Logiciel de découpage inclus : Creality Slicer</li>
        </ul>
    </div>


    <h2>Ci-dessous vous pourrez voir quelques-unes des impressions que nous avons réalisées :</h2>

    <div class="gallery">
        <ul>
            <!-- Item 1 Exemple -->
            <li><h2>Masque de Bahtinov</h2></li>
            <h3>Photos de l'objet</h3>
            <div class="gallery-item">
                <a href="./Masque_de_Bahtinov.jpg" rel="zoom"><img src="./Masque_de_Bahtinov.jpg" alt="Image 1" width="200" height="300"></a>
                <a href="./Masque_de_Bahtinov2.jpg" rel="zoom"><img src="./Masque_de_Bahtinov2.jpg" alt="Image 2" width="200" height="300"></a>
                <a href="./Masque_de_Bahtinov3.jpg" rel="zoom"><img src="./Masque_de_Bahtinov3.jpg" alt="Image 3" width="200" height="300"></a>
            </div>

            <li><h2>Support d'appareil photo</h2></li>
            <h3>Photo de l'objet</h3>
            <div class="gallery-item">
                <a href="./Support_appareil_photo.jpg" rel="zoom"><img src="./Support_appareil_photo.jpg" alt="Image 2" width="200" height="300" rel="zoom"></a>
                <a href="./Support_appareil_photo2.jpg" rel="zoom"><img src="./Support_appareil_photo2.jpg" alt="Image 2" width="200" height="300" rel="zoom"></a>
                <a href="./Support_appareil_photo3_2.jpg" rel="zoom"><img src="./Support_appareil_photo3_1.jpg" alt="Image 2" width="200" height="300" rel="zoom"></a>
            </div>
            

            <li><h2>Deckbox Magic The Gathering</h2></li>
            <h3>Photos de l'objet</h3>
            <div class="gallery-item">
                <a href="./Deckbox.jpg" rel="zoom"><img src="./Deckbox.jpg" alt="Image 1" width="200" height="300" rel="zoom"></a>
                <a href="./Deckbox2.jpg" rel="zoom"><img src="./Deckbox2.jpg" alt="Image 2" width="200" height="300" rel="zoom"></a>
                <a href="./Deckbox3.jpg" rel="zoom"><img src="./Deckbox3.jpg" alt="Image 3" width="200" height="300" rel="zoom"></a>
            </div>
            
            <!-- TEMPLATE


            <li><h2>Nom de l'objet</h2></li>
            <h3>Photo de l'objet</h3>
            <div class="gallery-item">
                <a href="./path/to/image1.jpg" rel="zoom"><img src="path/to/image1.jpg" alt="Image 2" width="200" height="300" rel="zoom"></a>
            </div>
            <h3>Vidéo de l'impression</h3>
            <div class="gallery-item">
                <video width="400" height="300" controls>
                    <source src="path/to/video.mp4" type="video/mp4">
                </video>


            </div> -->
        </ul>
    </div>
                <!-- Ajoutez d'autres éléments de la galerie ici -->
    <div>
        <ul> 
            <p><h3>Liens vers des sites de modèles 3D :</h3></p>
            <li><a href="https://www.thingiverse.com/">https://www.thingiverse.com/</a></li>
            <li><a href="https://cults3d.com/">https://cults3d.com/</a></li>
            <li><a href="https://www.myminifactory.com/fr/">https://www.myminifactory.com/fr/</a></li>
            <li><a href="https://thangs.com/?sort=likes&range=month">https://thangs.com/?sort=likes&range=month</a></li>
            <li><a href="https://www.yeggi.com/">https://www.yeggi.com/</a></li>
        </ul>
        <ul>
            <p><h3>Liens vers des logiciels de modélisation 3d</h3></p>
            <li><a href="https://www.blender.org/download/">https://www.blender.org/download/</a></li>
        </ul>
    </div>
</div>

<!-- Fin corps du code -->

<?php
    require_once '../gabarit/footer.php';
?>