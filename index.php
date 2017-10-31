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
            case 'vue_documentation_de_lenseignant' :
                recherche_doc_enseignant();
                break;
            case 'recette' :
                recette();
                break;
            case 'ouvrir_recette' :
                $nomfichier = $_GET['fichier'];
                ouvrirFichierRecettes($nomfichier);
            case 'logout' :
                logout();
                break;
            case 'changer_pwd':
                resetPwd();
                break;
            case 'afficher_contenu_pedagogique':
                contenuPedagogique();
                break;
            case 'ouvrir_contenu_pedagogique':
                $nomfichier = $_GET['fichier'];
                ouvrirFichierContenuPedagogique($nomfichier); //appel de la fonction dans le controleur
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