<?php
$titre ='Plateforme échanges fiches techniques - Contenu pédagogique';

// Tampon de flux stocké en mémoire
ob_start();

?>

    <script>

        $(document).ready(function(){
            $('#mContenuPedagogique').addClass('current');
        });

    </script>

    <header>
        <h2>Contenu pédagogique</h2>
    </header>

    <form method="post" action="index.php?action=afficher_contenu_pedagogique">
        <div>
            <label>Année : </label>
        </div>
        <div>
            <input type="radio" name="annee" value="1" checked/> 1ère année
            <input type="radio" name="annee" value="2"/> 2ème année
            <input type="radio" name="annee" value="3"/> 3ème année
        </div>
        <br/>
        <div>
            <label>Catégorie : </label>
        </div>
        <div>
            <select name="type" required>
                <option value=""></option>
                <?php
                foreach ($resultats as $resultat) :

                    //attention case sensitive!!!
                    ?>
                    <option value="<?php echo $resultat['Nom']; ?>"> <?php echo $resultat['Nom']; ?> </option>

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
    echo '<th align="left"><strong>Nom du document</strong></th>';
    echo '</tr>';

    foreach ($resultatContenuPedagogique as $resultat) {

        //attention case sensitive!!!
        echo '<tr>';
        //echo '<td>';
        //echo '<a href="index.php?action=ouvrir_recette&fichier=' . $resultat['cheminFichierRecette'] . '">' . $resultat['nom'] . '</a>' ;
        //echo '</td>';
        echo '<td>';
        echo "<a href='index.php?action=ouvrir_contenu_pedagogique&fichier=".$resultat['chemindonnee']."'>".$resultat['typenom']."</a>";
        echo '</td>';
        echo '</tr>';

    }
    echo '</table>';

}


$contenu = ob_get_clean();
require "gabarit.php";
