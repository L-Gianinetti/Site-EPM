<?php
/**
 * Created by PhpStorm.
 * User: Vojislav.RISTIC
 * Date: 26.09.2017
 * Time: 13:47
 */

$titre = 'Librairie photo';

ob_start();
        switch ($categorie){
            case 'tout':
                ?>
            <header>
                <h2>Toutes les Photos</h2>
            </header>

            <section>
                <form method="post" action="Index.php?action=photo">
                    <p>
                        <label for="categorie">Catégorie</label><br />
                        <select name="categorie" id="categorie">
                            <option value="tout" selected>Sélectionnez une catégorie</option>
                            <option value="Annee2">2ème Année</option>
                            <option value="Annee3">3ème Année</option>
                            <option value="8">Grand Chef</option>
                        </select>
                    </p>
                <div style="display: flex">
                    <input type="submit" value="Rechercher">
                </form>
                <form method="get" action="Index.php">
                    <input type="submit" value="Ajouter">
                </form>
                </div>
                <?php
                break;
            case 'Annee2':
                ?>
            <header>
                <h2>Photos Deuxième Année</h2>
            </header>

            <section>
                <form method="post" action="Index.php?action=photo">
                    <p>
                        <label for="sousCategorie">Sous catégorie</label><br/>
                        <select name="sousCategorie" id="sousCategorie">
                            <option value="tout2" selected>Sélectionnez une application</option>
                            <option value="1">Application 1 </option>
                            <option value="4">Application 2 </option>
                        </select>
                    </p>
                <div style="display: flex">
                    <input type="submit" value="Rechercher">
                </form>
                <form method="post" action="Index.php?action=photo">
                    <input type="hidden" name="categorie" value="tout">
                    <input type="submit" value="Retour">
                </form>
                </div>
                <?php
                break;
            case 'Annee3':
                ?>
            <header>
                <h2>Photos Troisième Année</h2>
            </header>

            <section>
                <form method="post" action="Index.php?action=photo">
                    <p>
                        <label for="sousCategorie">Sous catégorie</label><br/>
                        <select name="sousCategorie" id="sousCategorie">
                            <option value="tout3" selected>Sélectionnez une application</option>
                            <option value="5">Application 1 </option>
                            <option value="6">Application 2 </option>
                            <option value="7">Application 3 </option>
                        </select>
                    </p>
                <div style="display: flex">
                    <input type="submit" value="Rechercher">
                </form>
                <form method="post" action="Index.php?action=photo">
                    <input type="hidden" name="categorie" value="tout">
                    <input type="submit" value="Retour">
                </form>
                </div>
                <?php
                break;
            case '8':
                ?>
            <header>
                <h2>Photos Grand Chef</h2>
            </header>

            <section>
                <form method="post" action="Index.php?action=photo">
                    <p>
                        <label for="categorie">Catégorie</label><br />
                        <select name="categorie" id="categorie">
                            <option value="tout" selected>Sélectionnez une catégorie</option>
                            <option value="Annee2">2ème Année</option>
                            <option value="Annee3">3ème Année</option>
                            <option value="8">Grand Chef</option>
                        </select>
                    </p>
                <div style="display: flex">
                    <input type="submit" value="Rechercher">
                </form>
                <form method="post" action="Index.php?action=photo">
                    <input type="hidden" name="categorie" value="tout">
                    <input type="submit" value="Retour">
                </form>
                </div>
                <?php
                break;
            default :
                ?>
                <form method="post" action="Index.php?action=photo">
                    <input type="hidden" name="categorie" value="tout">
                    <input type="submit" value="Retour">
                </form>
            <?php
        }
    ?>

    </section>
    <section>
        <div id="gallerie">
            <?php
            foreach ($resultats as $resultat){
                ?><div class="image"><img src="Images/Photo/<?php echo $resultat['Nom']?>"></div>
      <?php  } ?>

        </div>
    </section>





<?php

$contenu = ob_get_clean();
require "gabarit.php";
