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