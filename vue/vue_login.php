<?php
$titre ='Plateforme échanges fiches techniques - Login';
// Tampon de flux stocké en mémoire
ob_start();
?>
<header>
    <h2>Connection</h2>
    <p>Veuillez vous connecter pour avoir accès au site.</p>
</header>
<?php
if (isset($msg_err) && !empty($msg_err)) {
    echo $msg_err;
}
?>
    <form method="post" action="index.php?action=login">
        <div>
            <label>Login : </label>
        </div>
        <div>
            <input type="text" size="40" name="login" required/>
        </div>
        <br/>
        <div>
            <label>Mot de passe : </label>
        </div>
        <div>
            <input type="password" size="40" name="pwd" required/>
        </div>
        <br/>
        <div>
            <input type="submit" name="connecter" value="Se connecter"></input>
            <input type="reset" value="Réinitialiser"></input>
        </div>
    </form>
<?php
$contenu = ob_get_clean();
require "gabarit.php";