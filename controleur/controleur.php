<?php
require "modele/modele.php";
// Affichage de la page d'accueil
function accueil()
{
    require "vue/vue_accueil.php";
}

//Affichage de la page de login
function login()
{
    if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['pwd'])) {
        extract($_POST);

        //Appel de la fonction qui vérifie si le login existe dans la BD et retourne le mot de passe
        //définie dans le modèle
        $pwdFromBD = getPwdFromLogin($login);

        //on récupère bien un mot de passe
        if (isset($pwdFromBD) && !empty($pwdFromBD)) {
            if (password_verify($pwd, $pwdFromBD)) {
                //on peut accéder au site. Attention ni la vue ni la fonction ci-dessous n'existe pas encore
                //$resultats = getTypeRecette();
                //require "vue/vue_liste_recettes.php";
            } else {
                $msg_err= 'Le mot de passe est incorrect';
                require "vue/vue_login.php";
            }
        } else {
            $msg_err= 'Aucun utilisateur avec ce login n\'est défini pour cette application.';
            require "vue/vue_login.php";
        }
    } else {
        require "vue/vue_login.php";
    }
}

//Affichage de la page de photos
function photo()
{
    if(isset($_POST)){
        if(!empty ($_POST['sousCategorie'])){
            $categorie = $_POST['sousCategorie'];
            $resultats = getPhoto($categorie);
            require "vue/vue_photo.php";
        }else{
            if(!empty($_POST['categorie'])){
                $categorie = $_POST['categorie'];
                $resultats = getPhoto($categorie);
                require "vue/vue_photo.php";
            }else{
                $categorie = 'tout';
                $resultats = getPhoto($categorie);
                require "vue/vue_photo.php";
            }
        }
    }else{
        $categorie = 'tout';
        $resultats = getPhoto($categorie);
        require "vue/vue_photo.php";
    }


}


//Affichage de la page d'ajout de photo
function ajoutPhoto()
{
    require "vue/vue_ajoutPhoto.php";
}