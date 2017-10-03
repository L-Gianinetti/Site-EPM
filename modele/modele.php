<?php
/**
 * Created by PhpStorm.
 * User: Melvyn.HERZIG
 * Date: 05.09.2017
 * Time: 14:02
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
    $requete = "SELECT Identifiant, MotDePasse FROM Login WHERE Identifiant='" . $login . "'";
    $resultats = $connexion->query($requete);
    if ($donnees = $resultats->fetch()) {
        return $donnees['MotDePasse'];
    } else {
        return '';
    }
}

//insetion du nouveau hachage pour un mot de passe
function insertNewPwd($pwdNew,$login)
{
    $connexion = getBD();
    $hachage = password_hash($pwdNew, PASSWORD_DEFAULT);
    $requete = "UPDATE Login SET MotDePasse='".$hachage."' WHERE Identifiant ='".$login."'";
    $connexion->query($requete);
}