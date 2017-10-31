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
    $requete = "SELECT Identifiant, MotDePasse FROM Login WHERE Identifiant='" . $login . "'";
    $resultats = $connexion->query($requete);
    if ($donnees = $resultats->fetch()) {
        return $donnees['MotDePasse'];
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

function getTypeRecette()
{
    $connexion = getBD();
    $requete = "SELECT nom FROM categoriePlat";
}

//insetion du nouveau hachage pour un mot de passe
function insertNewPwd($pwdNew,$login)
{
    $connexion = getBD();
    $hachage = password_hash($pwdNew, PASSWORD_DEFAULT);
    $requete = "UPDATE Login SET MotDePasse='".$hachage."' WHERE Identifiant ='".$login."'";
    $connexion->query($requete);
}

//Retourne la catégorie des contenus pédagogiques
function getTypeContenuPedagogique()
{
    $connexion = getBD();
    $requete = "SELECT Nom FROM CategorieContenuPedagogique";
    $resultats = $connexion->query($requete);
    return $resultats;
}


function getRecette($titre, $type)
{
    $connexion = getBD();
    $requete = "SELECT recette.Titre, recette.idCheminDonnee, categorieplat.Nom as categorieplatNom from recette inner join categorieplat on recette.fkCategoriePlat  = categorieplat.idCategoriePlat  where recette.Titre like '" .$titre . "%'  and categorieplat.Nom = '" . $type ."'" ;
}

function getContenuPedagogique($annee, $type)
{
    $connexion = getBD();
    $requete = "SELECT CheminDonnee.Path as chemindonnee, ContenuPedagogique.Nom AS typenom FROM ContenuPedagogique INNER JOIN CategorieContenuPedagogique ON ContenuPedagogique.fkCategorieContenuPedagogique = CategorieContenuPedagogique.idCategorieContenuPedagogique INNER JOIN Annee ON ContenuPedagogique.fkAnnee = Annee.idAnnee INNER JOIN CheminDonnee ON ContenuPedagogique.fkCheminDonnee = CheminDonnee.idCheminDonnee INNER JOIN RepPrincipal ON CheminDonnee.fkRepPrincipal = RepPrincipal.idRepPrincipal WHERE CategorieContenuPedagogique.Nom = '".$type."' AND Annee.Annee =".$annee;
    $resultats = $connexion->query($requete);
    return $resultats;
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

function getRepStockage() {
    $connexion = getBD();
    $requete = "SELECT NomRep FROM RepPrincipal";
    $resultats = $connexion->query($requete);
    foreach  ($resultats as $row) {
        return $row['NomRep'];
    }
    return "";
}