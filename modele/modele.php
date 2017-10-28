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
    $connexion = new PDO('mysql:host=localhost;dbname=epm ;charset=utf8', 'root', '');
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

//Fonction : cherche les documents dans la base de données
//Sortie : $documents
function getDocuments() {
    $connexion = getBD();
    $requete =  "SELECT * FROM documentationenseignant WHERE ";
    return '';
}

function nsemaines() {
    $connexion = getBD();
    $requete = "SELECT * FROM semaine";
    $nsemaines = $connexion->query($requete);
    return $nsemaines;
}

function nannees() {
    $connexion = getBD();
    $requete = "SELECT * FROM annee";
    $nannees = $connexion->query($requete);
    return $nannees;
}