<?php
$titre ='Plateforme échanges fiches techniques - Changer mot de passe';

// Tampon de flux stocké en mémoire
ob_start();
?>

    <script>

        $(document).ready(function(){
            $('#mPwdChange').addClass('current');
        });
    </script>

    <header>

        <h2>Changement de mot de passe</h2>
        <p>Veuillez sélectionner un compte et indiquer l'ancien mot de passe ainsi que le nouveau.</p>
    </header>

<?php

if (isset($msg_err) && !empty($msg_err)) {
    echo $msg_err;
    echo "<br/><br/>";
}
?>

    <form method="post" action="index.php?action=changer_pwd">
        <div>
            <label>Login à modifier: </label>
        </div>
        <div>
            <input type="radio" name="login" value="eleve" checked/> Elèves<br>
            <input type="radio" name="login" value="prof"/> Professeur <br>
        </div>
        <br/>
        <div>
            <label> Ancien mot de passe : </label>
        </div>
        <div>
            <input type="password" size="40" name="pwdOld" required/>
        </div>
        <br/>
        <div>
            <label> Nouveau mot de passe : </label>
        </div>
        <div>
            <input type="password" size="40" name="pwdNew1" required/>
            <br/>
            <input type="password" size="40" name="pwdNew2" required/>
        </div>
        <br/>
        <div>
            <input type="submit" name="changerPwd" value="Valider"/>
            <input type="reset" value="Réinitialiser"/>
        </div>

    </form>


<?php

$contenu = ob_get_clean();
require "gabarit.php";
?>