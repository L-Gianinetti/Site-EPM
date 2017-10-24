<?php
$titre ='Plateforme échanges fiches techniques - Accueil';
// Tampon de flux stocké en mémoire
ob_start();
?>
    <header>
        <h2>Ajouter des documents</h2>
    </header>
    <form method="post" action="index.php?action=rechercher_doc_enseignant">
            <div>
                Année
                <select name="annee" required>
                    <option value=""></option>
                    <?php
                    foreach ($nannees as $annee) :
                        //attention case sensitive!!!
                        ?>
                        <option value="<?= $annee; ?>"> <?php echo $annee; ?> </option>

                    <?php endforeach ?>
                </select>
            </div>
    <div>
        <br/>
        Semaine
        <select name="semaine" required>
            <option value=""></option>
            <?php
            foreach ($nsemaines as $semaine) :
                //attention case sensitive!!!
                ?>
                <option value="<?= $semaine; ?>"> <?php echo $semaine; ?> </option>

            <?php endforeach ?>
        </select>
    </div>
        <br/>
        <input type="submit" value="Réinnitialiser" name="submit">
        <input type="submit" value="Chercher" name="clear">
    </form>
</form>


<?php
$contenu = ob_get_clean();
require "gabarit.php";