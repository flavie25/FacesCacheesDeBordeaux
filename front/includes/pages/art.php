<?
setcookie('page', 'article.php', 3600*24, null, null, false, true);
?>
<html>
    <header>
        <meta charset="utf8">
        <title>Article</title>
        <link rel="stylesheet" href="./../../assets/css/art.css">
        <link rel="stylesheet" href="../../assets/css/nav.css">
        <link rel="stylesheet" href="../../assets/css/footer.css">
    </header>
    <body>

<? 

 include __DIR__."./../commons/navbar.php";
// require_once __DIR__."/../../../util/utilErrOn.php";
// require_once __DIR__."/../../../util/ctrlSaisies.php";
// require_once __DIR__."/../../../CLASS_CRUD/article.class.php";
// global $db;
// $article = new ARTICLE;

// if(isset($_GET['id']) AND !empty($_GET['id'])){

//     $numArt = ctrlSaisies($_GET['id']);
//     $contenu = $article->get_1ArticleByThemAngl($numArt);
//     $titreArt = $contenu['libTitrArt'];
//     $sousTitr1 = $contenu['libSsTitr1Art'];
//     $sousTitr2 = $contenu['libSsTitr2Art'];

// }
?>
        
        <div class="articleContainer">
            <br>
            <br>
            <div class="articleImage">
                <img src="../../../uploads/imgArt2c6532515214fb71bf13036cc26fcc06.jpg" style="display: block;margin-left: auto;margin-right: auto; transform:translate(-2%)">
                <div class="articleOverlay">
                    <h1>coucou</h1>
                </div>
            </div>
            <br>
            <p>coucou</P>
            <p style="font-weight: bold;">coucou</p>
            <h2>coucou</h2>
            <p>coucou</p>
            <h2>coucou</h2>
            <p>coucou</p>
            <p>coucou</p>
            <h2> Conclusion : </h2>
            <p>coucou</p>
        </div>
        <br>
        <br>
        <br>
        <br>
        </div>


        <? 
        include __DIR__."./../commons/footer.php";
        ?>
    </body>
</html>
