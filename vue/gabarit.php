<!DOCTYPE HTML>
<!--
	Striped by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>EPM - plateforme d'échange</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="contenu/assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="contenu/assets/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="contenu/assets/css/ie8.css" /><![endif]-->
    <link rel="stylesheet" type="text/css" href="contenu/assets/css/tableau-res.css">
    <script src="contenu/assets/js/jquery.min.js"></script>
</head>
<body>

<script>

    $(document).ready(function(){
        if ($('#mContenuPedagogique').hasClass('current')) {
            $('#mContenuPedagogique').removeClass('current');
        }
        if ($('#mCorbeille').hasClass('current')) {
            $('#mCorbeille').removeClass('current');
        }
        if ($('#mDocumentationEnseignant').hasClass('current')) {
            $('#mDocumentationEnseignant').removeClass('current');
        }
        if ($('#mConnexion').hasClass('current')) {
            $('#mConnexion').removeClass('current');
        }
        if ($('#mFilms').hasClass('current')) {
            $('#mFilms').removeClass('current');
        }
        if ($('#mPhotos').hasClass('current')) {
            $('#mPhotos').removeClass('current');
        }
        if ($('#mRecettes').hasClass('current')) {
            $('#mRecettes').removeClass('current');
        }
        if ($('#mPwdChange').hasClass('current')) {
            $('#mPwdChange').removeClass('current');
        }
    });

</script>

<!-- Content -->
<div id="content">
    <div class="inner">

        <?=$contenu ?>

    </div>
</div>


<!-- Sidebar -->
<div id="sidebar">

    <!-- Logo -->
    <h1 id="logo"><a href="index.php?action=welcome">EPM</a></h1>

    <!-- Nav -->
    <nav id="nav">
        <ul>
            <?php if (isset($_SESSION['login'])) 
                ?>

                <li id="mContenuPedagogique"><a href="index.php?action=rechercher_recettes">Contenu pédagogique</a></li>
                <li id="mCorbeille"><a href="index.php?action=afficher_photo">Corbeille</a></li>
                <li id="mDocumentationEnseignant"><a href="index.php?action=afficher_info_produit">Documentation enseignant</a></li>
                <li id="mFilms"><a href="index.php?action=afficher_info_theme">Films</a></li>
                <li id="mPhotos"><a href="index.php?action=afficher_info_gouts">Photos</a></li>
                <li id="mRecettes"><a href="index.php?action=afficher_info_techniques">Recettes</a></li>

                <?php if (isset($_SESSION['admin']) && ($_SESSION['admin'] == 1 ) ) {?>
                    <li id="mPwdChange"><a href="index.php?action=changer_pwd">Modifier le mot de passe</a></li>
                <?php } ?>

                <li id="mDeconnexion"><a href="index.php?action=logout">Déconnexion</a></li>

            <?php } ?>

            <?php if (!isset($_SESSION['login'])) {
                ?>

                <li id="mConnexion"><a href="index.php?action=login">Connexion</a></li>

            <?php } ?>
        </ul>
    </nav>

    <!-- Copyright -->
    <ul id="copyright">
        <li>&copy; Untitled.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
    </ul>

</div>



<!-- Scripts -->
<script src="contenu/assets/js/jquery.min.js"></script>
<script src="contenu/assets/js/skel.min.js"></script>
<script src="contenu/assets/js/util.js"></script>
<!--[if lte IE 8]><script src="contenu/assets/js/ie/respond.min.js"></script><![endif]-->
<script src="contenu/assets/js/main.js"></script>

</body>
</html>