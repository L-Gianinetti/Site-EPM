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

function recherche_doc_enseignant() {
    // appeler la fonction définie dans modele.php qui va rechercher la liste des années d'étude (1ère année, 2ème année, 3ème année)
    // et qui retourne la réponse à la requête permettant de récupérer la liste des années, i.e. tout le contenu de la table contenant les noms des années

    // appeler la fonction définie dans modele.php qui va rechercher le répertoire dans lequel se trouvent les documents de l'enseignant

    if (isset($_POST) && !empty($_POST['semaine']) && !empty($_POST['annee'])) {
        $resultatsDoc = get_doc_enseignant($_POST['annee'], $_POST['semaine']);
    }
    require "vue/vue_doc_enseignant.php";
}

}
function recette()
{
    if (isset($_POST) && !empty($_POST['titre'])){
        $resultats = getTypeRecette();
        $resultatsRec = getRecette($_POST ['titre'], $_POST['type']);
        require "vue/vue_recette.php";
    } else {
        $resultats = getTypeRecette();
        require "vue/vue_recette.php";
}

//déconnecte l'utilisateur retourne au menu
function logout()
{
    session_destroy();
    session_start();
    require "vue/vue_accueil.php";
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
?>
