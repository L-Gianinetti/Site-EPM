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
    $connexion = new PDO('mysql:host=localhost;dbname=cpm ;charset=utf8', 'root', '');
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