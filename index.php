<?php
require 'controleur/controleur.php';
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
            case 'photo' :
                photo(); //appel de la fonction dans le controleur
                break;
            case 'ajoutPhoto':
                ajoutPhoto(); //appel de la fonction dans le controleur
            default :
                throw new Exception("action non valide");
        }
    }
    else
        accueil(); // Si aucune action n’est envoyée dans l’URL
}
catch (Exception $e)
{
    echo($e->getMessage());
}