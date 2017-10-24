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
    $connexion = new PDO('mysql:host=localhost;dbname=epm3;charset=utf8', 'root', '');
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

function getTypeRecette()
{
    $connexion = getBD();
    $requete = "SELECT nom FROM categoriePlat";
    $resultats = $connexion->query($requete);
    return $resultats;
}

function getRecette($titre, $type)
{
    $connexion = getBD();
    $requete = "SELECT recette.Titre, recette.idCheminDonnee, categorieplat.Nom as categorieplatNom from recette inner join categorieplat on recette.fkCategoriePlat  = categorieplat.idCategoriePlat  where recette.Titre like '" .$titre . "%'  and categorieplat.Nom = '" . $type ."'" ;
    $resultats = $connexion->query($requete);
    return $resultats;
}

function getRepStockage()
{
    $connexion = getBD();
    $requete = "SELECT NomRep from repprincipal";
    $resultat = $connexion->query($requete);
    foreach ($resultat as $row) {
        return $row['NomRep'];
    }
    //return "";
}
function getCheminDonnee()
{
    $connexion = getBD();
    $requete = "SELECT Path from chemindonnee";
    $resultat = $connexion->query($requete);
    foreach ($resultat as $row){
        return $row['Path'];
    }
}