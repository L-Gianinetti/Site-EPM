Dans vue_liste_recettes.php, si cette page est la première à s'ouvrir après le login, positionner la variable 
$_SESSION['login'] avec le login de l'utilisateur connecté. 


Dans chaque fichier php de la vue, ajouter après ob_start();
<script>

        $(document).ready(function(){
            $('#<id du menu>').addClass('current');
        });

</script>


Exemple :
<?php
$titre ='Liste des recettes';

// vue_accueil.php
// Date de création : 26/09/17
// Date de modification :
// Auteur : FAO
// Fonction : vue pour l'affichage de la liste des recettes
// _______________________________

// Tampon de flux stocké en mémoire
ob_start();
?>

    <script>

        $(document).ready(function(){
            $('#mrecette').addClass('current');
        });

    </script>
