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
        $pwdFromBD= getPwdFromLogin($login);

        //on récupère bien un mot de passe
        if (isset($pwdFromBD) && !empty($pwdFromBD)) {
            if (password_verify($pwd, $pwdFromBD)) {

               $_SESSION['login'] = $login;
               require "vue/vue_accueil.php";

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

//permet de changer les mots de passes de chaque compte respectivement
function resetPwd()
{
    if(isset($_POST) && !empty($_POST['pwdOld']) && !empty($_POST['pwdNew1']) && !empty($_POST['pwdNew2']))
    {
        extract($_POST);

        $pwdFromBD = getPwdFromLogin($login);

        if (isset($pwdFromBD) && !empty($pwdFromBD))
        {
            if (password_verify($pwdOld, $pwdFromBD))
            {
                if($pwdNew1 === $pwdNew2)
                {
                    insertNewPwd($pwdNew1,$login);

                    $msg_err= "Le mot de passe du compte \"".$login."\" a été modifié avec succès!";
                    require "vue/vue_changer_pwd.php";
                }
                else
                {
                    $msg_err= 'Les nouveaux mots de passe ne correspondent pas';
                    require "vue/vue_changer_pwd.php";
                }
            }
            else
            {
                $msg_err= 'L\'ancien mot de passe du compte spécifié est incorrect';
                require "vue/vue_changer_pwd.php";
            }
        }
    }
    else
    {
        require "vue/vue_changer_pwd.php";
    }
}


function ouvrirFichierRecettes($fichier) {
    $rep = getRepStockage();
    $cheminDonnee = getCheminDonnee();
    $file = $rep . $cheminDonnee . $fichier;
    if (file_exists(utf8_decode($file))){
        ouvrirFichier($file);
    } else{
        echo "aucun fichier n'existe pour la recette demandée";
   }
  
function contenuPedagogique()
{
    if (isset($_POST) && !empty($_POST['type'])){
        $resultats = getTypeContenuPedagogique();
        $resultatContenuPedagogique = getContenuPedagogique($_POST['annee'],$_POST['type']);
        require "vue/vue_contenu_pedagogique.php";
    } else {
        $resultats = getTypeContenuPedagogique();
        require "vue/vue_contenu_pedagogique.php";
    }
}

function ouvrirFichierContenuPedagogique($fichier) {
    $rep = getRepStockage();
    $file= $rep . $fichier;
    if (file_exists(utf8_decode($file))) {
        ouvrirFichier($file);
    } else {
        echo "aucun fichier n'existe pour le contenu pédagogique demandée";
    }
}

function ouvrirFichier($file) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
  
    ob_clean();
    readfile(utf8_decode($file));
}

?>
