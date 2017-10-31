<?php
$titre ='Recettes';
// Tampon de flux stocké en mémoire
ob_start();
?>
    <header>
        <h2>Recettes</h2>
    </header>

    <form method="post" action="index.php?action=recette">
        <div>
            <label>Titre : </label>
        </div>
        <div>
            <input type="text" size="40" name="titre" required/>
        </div>
        <br/>
        <div>
            <label>Type de recettes : </label>
        </div>
        <div>
            <select name="type" required>
                <option value=""></option>
                <?php

                foreach ($resultats as $resultat) :

                    ?>
                    <option value="<?= $resultat['nom']; ?>"> <?php echo $resultat['nom']; ?> </option>

                <?php endforeach ?>


            </select>
        </div>
        <br/>

        <div>
            <input type="submit" name="search" value="Chercher"></input>
            <input type="reset" value="Réinitialiser"></input>
        </div>

    </form>


<?php


if (isset($_POST['search'])){

    echo '<br>';
    echo '<table>';
    echo '<tr>';
    echo '<th align="left"><strong>Titre recette</strong></th>';
    echo '<th align="left"><strong>Type recette</strong></th>';
    echo '</tr>';

    foreach ($resultatsRec as $resultat) {

        //attention case sensitive!!!
        echo '<tr>';
        echo '<td>';
        echo '<a href="index.php?action=ouvrir_recette&fichier=' . $resultat['Titre'] . '">' . $resultat['Titre'] . '</a>' ;
        echo '</td>';
        echo '<td>';
        echo $resultat['categorieplatNom'];
        echo '</td>';
        echo '</tr>';

    }
    echo '</table>';

}

$contenu = ob_get_clean();
require "gabarit.php";