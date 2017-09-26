<?php

session_set_cookie_params(1200);
session_start();

require  'controleur/controleur.php';

try
{
    if (isset($_GET['action']))
    {
        $action = $_GET['action'];

        switch ($action)
        {
            case 'welcome' :
                accueil(); //appel de la fonction dans le controleur
                break;
            case 'login' :
                login(); //appel de la fonction dans le controleur
                break;
            case 'logout' :
                logout();
                break;
            case 'changer_pwd':
                resetPwd();
                break;
            default :
                throw new Exception("action non valide");
        }
    }
    else
        accueil();  // Si aucune action n’est envoyée dans l’URL

}
catch (Exception $e)
{
    echo($e->getMessage());
}
