<?php
/**
 * Created by PhpStorm.
 * User: Lucas.GIANINETTI
 * Date: 05.09.2017
 * Time: 14:01
 */
// connexion au serveur MySQL et à la BD
// sortie : $connexion
function getBD() {
    $connexion = new PDO('mysql:host=localhost;dbname=epm;charset=utf8', 'root', '');
// permet d'avoir plus de détails sur les erreurs retournées
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $connexion;
}

//Fonction : vérifie le login de l'utilisateur
//Sortie : résultat de la requête
function getPwdFromLogin($login)
{
    $connexion = getBD();
    $requete = "SELECT idUser, pwd FROM Rights WHERE login='" . $login . "'";
    $resultats = $connexion->query($requete);
    if ($donnees = $resultats->fetch()) {
        return $donnees['pwd'];
    } else {
        return '';
    }
}

//Fonction: recherche les photos selon la categorie
//Sortie :  résultat de la requête
function getPhoto($categorie){
    $connexion = getBD();
    if($categorie == 'tout'){
        $requete = "SELECT Nom, fkCategoriePhoto FROM photo";
    }else{
            if($categorie == 'Annee2' || $categorie == 'tout2'){
                $requete = "SELECT Nom, fkCategoriePhoto FROM photo WHERE fkCategoriePhoto = 1 OR fkCategoriePhoto = 4";
            }else{
                if($categorie == 'Annee3' || $categorie == 'tout3'){
                    $requete = "SELECT Nom, fkCategoriePhoto FROM photo WHERE fkCategoriePhoto = 5 OR fkCategoriePhoto = 6 OR fkCategoriePhoto = 7";
                }else{
                    $requete = "SELECT Nom, fkCategoriePhoto FROM photo WHERE fkCategoriePhoto='" . $categorie . "'";
                }
            }
    }
    $resultats = $connexion->query($requete);
    return $resultats;

}