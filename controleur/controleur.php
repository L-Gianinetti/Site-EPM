<?php

require "modele/modele.php";

ob_start();

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