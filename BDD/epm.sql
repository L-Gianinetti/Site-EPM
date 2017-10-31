-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 03 Octobre 2017 à 07:19
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `epm`
--

-- --------------------------------------------------------

--
-- Structure de la table `annee`
--

CREATE TABLE `annee` (
  `idAnnee` int(11) NOT NULL,
  `Annee` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categoriecontenupedagogique`
--

CREATE TABLE `categoriecontenupedagogique` (
  `idCategorieContenuPedagogique` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categoriefilm`
--

CREATE TABLE `categoriefilm` (
  `idCategorieFilm` int(11) NOT NULL,
  `Nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categoriephoto`
--

CREATE TABLE `categoriephoto` (
  `idCategoriePhoto` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categoriephoto`
--

INSERT INTO `categoriephoto` (`idCategoriePhoto`, `Nom`) VALUES
(1, 'Annee2/A1'),
(4, 'Annee2/A2'),
(5, 'Annee3/A1'),
(6, 'Annee3/A2'),
(7, 'Annee3/A3'),
(8, 'GrandChef');

-- --------------------------------------------------------

--
-- Structure de la table `categorieplat`
--

CREATE TABLE `categorieplat` (
  `idCategoriePlat` int(11) NOT NULL,
  `Nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `chemindonnee`
--

CREATE TABLE `chemindonnee` (
  `idCheminDonnee` int(11) NOT NULL,
  `Type` varchar(45) NOT NULL,
  `Path` varchar(45) NOT NULL,
  `fkRepPrincipal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `chemindonnee`
--

INSERT INTO `chemindonnee` (`idCheminDonnee`, `Type`, `Path`, `fkRepPrincipal`) VALUES
(1, 'Photo', 'Photo/', 1);

-- --------------------------------------------------------

--
-- Structure de la table `contenupedagogique`
--

CREATE TABLE `contenupedagogique` (
  `idContenuPedagogique` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `fkAnnee` int(11) NOT NULL,
  `fkCategorieContenuPedagogique` int(11) NOT NULL,
  `CheminDonnee_idCheminDonnee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `corbeille`
--

CREATE TABLE `corbeille` (
  `idCorbeille` int(11) NOT NULL,
  `Contenu` varchar(100) NOT NULL,
  `CheminDonnee_idCheminDonnee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `documentationenseignant`
--

CREATE TABLE `documentationenseignant` (
  `idDocumentationEnseignant` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `CheminDonnee_idCheminDonnee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `idFilm` int(11) NOT NULL,
  `Titre` varchar(100) NOT NULL,
  `fkAnnee` int(11) NOT NULL,
  `fkCategorieFilm` int(11) NOT NULL,
  `CheminDonnee_idCheminDonnee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE `ingredient` (
  `idIngredient` int(11) NOT NULL,
  `Nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ingredientparrecette`
--

CREATE TABLE `ingredientparrecette` (
  `idRecette` int(11) NOT NULL,
  `idIngredient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `idLogin` int(11) NOT NULL,
  `Identifiant` varchar(45) NOT NULL,
  `MotDePasse` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `idPhoto` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `fkCategoriePhoto` int(11) NOT NULL,
  `CheminDonnee_idCheminDonnee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `photo`
--

INSERT INTO `photo` (`idPhoto`, `Nom`, `fkCategoriePhoto`, `CheminDonnee_idCheminDonnee`) VALUES
(3, 'IMG_0545.jpg', 1, 1),
(4, 'IMG_0546.jpg', 1, 1),
(5, 'IMG_0549.jpg', 1, 1),
(6, 'IMG_0550.jpg', 1, 1),
(7, 'IMG_0553.jpg', 1, 1),
(8, 'IMG_0554.jpg', 1, 1),
(9, 'IMG_0556.jpg', 1, 1),
(10, 'IMG_3572.jpg', 1, 1),
(11, 'IMG_3573.jpg', 1, 1),
(12, 'IMG_3574.jpg', 1, 1),
(13, 'IMG_3575.jpg', 1, 1),
(14, 'IMG_0712.jpg', 4, 1),
(15, 'IMG_0713.jpg', 4, 1),
(16, 'IMG_0714.jpg', 4, 1),
(17, 'IMG_0715.jpg', 4, 1),
(18, 'IMG_0717.jpg', 4, 1),
(19, 'IMG_0719.jpg', 4, 1),
(20, 'IMG_0721.jpg', 4, 1),
(21, 'IMG_0723.jpg', 4, 1),
(22, 'IMG_0726.jpg', 4, 1),
(23, 'IMG_0728.jpg', 4, 1),
(24, 'IMG_0731.jpg', 4, 1),
(25, 'IMG_0738.jpg', 4, 1),
(26, 'IMG_3716.jpg', 4, 1),
(27, 'IMG_3717.jpg', 4, 1),
(28, 'IMG_3718.jpg', 4, 1),
(29, 'IMG_3719.jpg', 4, 1),
(30, 'IMG_3524.jpg', 5, 1),
(31, 'IMG_3528.jpg', 5, 1),
(32, 'IMG_3529.jpg', 5, 1),
(33, 'IMG_3530.jpg', 5, 1),
(34, 'IMG_3531.jpg', 5, 1),
(35, 'IMG_3532.jpg', 5, 1),
(36, 'IMG_3533.jpg', 5, 1),
(37, 'IMG_3534.jpg', 5, 1),
(38, 'IMG_2842.jpg', 6, 1),
(39, 'IMG_3710.jpg', 6, 1),
(40, 'IMG_3711.jpg', 6, 1),
(41, 'IMG_3712.jpg', 6, 1),
(42, 'IMG_3713.jpg', 6, 1),
(43, 'IMG_3714.jpg', 6, 1),
(44, 'IMG_3715.jpg', 6, 1),
(45, 'IMG_Fabio.jpeg', 7, 1),
(46, 'IMG_Luca.jpeg', 7, 1),
(47, 'F.G (2).jpg', 8, 1),
(48, 'Foie-gras.jpg', 8, 1),
(49, 'IMG_0243.jpg', 8, 1),
(50, 'IMG_0251.jpg', 8, 1),
(51, 'IMG_0274.jpg', 8, 1),
(52, 'IMG_0935.jpg', 8, 1),
(53, 'IMG_1910.jpg', 8, 1),
(54, 'IMG-20160528-WA0001.jpg', 8, 1),
(55, 'St-Jacques.jpg', 8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `idRecette` int(11) NOT NULL,
  `Titre` varchar(100) NOT NULL,
  `fkCategoriePlat` int(11) NOT NULL,
  `CheminDonnee_idCheminDonnee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `repprincipal`
--

CREATE TABLE `repprincipal` (
  `idRepPrincipal` int(11) NOT NULL,
  `NomRep` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `repprincipal`
--

INSERT INTO `repprincipal` (`idRepPrincipal`, `NomRep`) VALUES
(1, 'Images/');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `annee`
--
ALTER TABLE `annee`
  ADD PRIMARY KEY (`idAnnee`);

--
-- Index pour la table `categoriecontenupedagogique`
--
ALTER TABLE `categoriecontenupedagogique`
  ADD PRIMARY KEY (`idCategorieContenuPedagogique`);

--
-- Index pour la table `categoriefilm`
--
ALTER TABLE `categoriefilm`
  ADD PRIMARY KEY (`idCategorieFilm`);

--
-- Index pour la table `categoriephoto`
--
ALTER TABLE `categoriephoto`
  ADD PRIMARY KEY (`idCategoriePhoto`);

--
-- Index pour la table `categorieplat`
--
ALTER TABLE `categorieplat`
  ADD PRIMARY KEY (`idCategoriePlat`);

--
-- Index pour la table `chemindonnee`
--
ALTER TABLE `chemindonnee`
  ADD PRIMARY KEY (`idCheminDonnee`),
  ADD KEY `fk_CheminDonnee_RepPrincipal1_idx` (`fkRepPrincipal`);

--
-- Index pour la table `contenupedagogique`
--
ALTER TABLE `contenupedagogique`
  ADD PRIMARY KEY (`idContenuPedagogique`),
  ADD KEY `fk_ContenuPedagogique_Annee1_idx` (`fkAnnee`),
  ADD KEY `fk_ContenuPedagogique_CategorieContenuPedagogique1_idx` (`fkCategorieContenuPedagogique`),
  ADD KEY `fk_ContenuPedagogique_CheminDonnee1_idx` (`CheminDonnee_idCheminDonnee`);

--
-- Index pour la table `corbeille`
--
ALTER TABLE `corbeille`
  ADD PRIMARY KEY (`idCorbeille`),
  ADD KEY `fk_Corbeille_CheminDonnee1_idx` (`CheminDonnee_idCheminDonnee`);

--
-- Index pour la table `documentationenseignant`
--
ALTER TABLE `documentationenseignant`
  ADD PRIMARY KEY (`idDocumentationEnseignant`),
  ADD KEY `fk_DocumentationEnseignant_CheminDonnee1_idx` (`CheminDonnee_idCheminDonnee`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`idFilm`),
  ADD KEY `fk_Film_Annee1_idx` (`fkAnnee`),
  ADD KEY `fk_Film_CategorieFilm1_idx` (`fkCategorieFilm`),
  ADD KEY `fk_Film_CheminDonnee1_idx` (`CheminDonnee_idCheminDonnee`);

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`idIngredient`);

--
-- Index pour la table `ingredientparrecette`
--
ALTER TABLE `ingredientparrecette`
  ADD PRIMARY KEY (`idRecette`,`idIngredient`),
  ADD KEY `fk_Recette_has_Ingredients_Ingredients1_idx` (`idIngredient`),
  ADD KEY `fk_Recette_has_Ingredients_Recette1_idx` (`idRecette`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLogin`),
  ADD UNIQUE KEY `Login_UNIQUE` (`Identifiant`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`idPhoto`),
  ADD KEY `fk_Photo_CategoriePhoto1_idx` (`fkCategoriePhoto`),
  ADD KEY `fk_Photo_CheminDonnee1_idx` (`CheminDonnee_idCheminDonnee`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`idRecette`),
  ADD KEY `fk_Recette_CategoriePlat_idx` (`fkCategoriePlat`),
  ADD KEY `fk_Recette_CheminDonnee1_idx` (`CheminDonnee_idCheminDonnee`);

--
-- Index pour la table `repprincipal`
--
ALTER TABLE `repprincipal`
  ADD PRIMARY KEY (`idRepPrincipal`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `annee`
--
ALTER TABLE `annee`
  MODIFY `idAnnee` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categoriecontenupedagogique`
--
ALTER TABLE `categoriecontenupedagogique`
  MODIFY `idCategorieContenuPedagogique` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categoriefilm`
--
ALTER TABLE `categoriefilm`
  MODIFY `idCategorieFilm` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categoriephoto`
--
ALTER TABLE `categoriephoto`
  MODIFY `idCategoriePhoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `categorieplat`
--
ALTER TABLE `categorieplat`
  MODIFY `idCategoriePlat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `chemindonnee`
--
ALTER TABLE `chemindonnee`
  MODIFY `idCheminDonnee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `corbeille`
--
ALTER TABLE `corbeille`
  MODIFY `idCorbeille` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `documentationenseignant`
--
ALTER TABLE `documentationenseignant`
  MODIFY `idDocumentationEnseignant` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `idFilm` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `idIngredient` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `idPhoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `idRecette` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `repprincipal`
--
ALTER TABLE `repprincipal`
  MODIFY `idRepPrincipal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `chemindonnee`
--
ALTER TABLE `chemindonnee`
  ADD CONSTRAINT `fk_CheminDonnee_RepPrincipal1` FOREIGN KEY (`fkRepPrincipal`) REFERENCES `repprincipal` (`idRepPrincipal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `contenupedagogique`
--
ALTER TABLE `contenupedagogique`
  ADD CONSTRAINT `fk_ContenuPedagogique_Annee1` FOREIGN KEY (`fkAnnee`) REFERENCES `annee` (`idAnnee`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ContenuPedagogique_CategorieContenuPedagogique1` FOREIGN KEY (`fkCategorieContenuPedagogique`) REFERENCES `categoriecontenupedagogique` (`idCategorieContenuPedagogique`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ContenuPedagogique_CheminDonnee1` FOREIGN KEY (`CheminDonnee_idCheminDonnee`) REFERENCES `chemindonnee` (`idCheminDonnee`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `corbeille`
--
ALTER TABLE `corbeille`
  ADD CONSTRAINT `fk_Corbeille_CheminDonnee1` FOREIGN KEY (`CheminDonnee_idCheminDonnee`) REFERENCES `chemindonnee` (`idCheminDonnee`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `documentationenseignant`
--
ALTER TABLE `documentationenseignant`
  ADD CONSTRAINT `fk_DocumentationEnseignant_CheminDonnee1` FOREIGN KEY (`CheminDonnee_idCheminDonnee`) REFERENCES `chemindonnee` (`idCheminDonnee`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `fk_Film_Annee1` FOREIGN KEY (`fkAnnee`) REFERENCES `annee` (`idAnnee`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Film_CategorieFilm1` FOREIGN KEY (`fkCategorieFilm`) REFERENCES `categoriefilm` (`idCategorieFilm`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Film_CheminDonnee1` FOREIGN KEY (`CheminDonnee_idCheminDonnee`) REFERENCES `chemindonnee` (`idCheminDonnee`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `ingredientparrecette`
--
ALTER TABLE `ingredientparrecette`
  ADD CONSTRAINT `fk_Recette_has_Ingredients_Ingredients1` FOREIGN KEY (`idIngredient`) REFERENCES `ingredient` (`idIngredient`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Recette_has_Ingredients_Recette1` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`idRecette`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `fk_Photo_CategoriePhoto1` FOREIGN KEY (`fkCategoriePhoto`) REFERENCES `categoriephoto` (`idCategoriePhoto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Photo_CheminDonnee1` FOREIGN KEY (`CheminDonnee_idCheminDonnee`) REFERENCES `chemindonnee` (`idCheminDonnee`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `fk_Recette_CategoriePlat` FOREIGN KEY (`fkCategoriePlat`) REFERENCES `categorieplat` (`idCategoriePlat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Recette_CheminDonnee1` FOREIGN KEY (`CheminDonnee_idCheminDonnee`) REFERENCES `chemindonnee` (`idCheminDonnee`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
