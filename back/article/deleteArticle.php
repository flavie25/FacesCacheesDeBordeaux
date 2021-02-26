<?php
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : deleteArticle.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // insertion classe STATUT
    require_once __DIR__ . '/../../util/ctrlSaisies.php';
    require_once __DIR__ . '/../../CLASS_CRUD/article.class.php';
    global $db;
    $monArticle = new ARTICLE;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif du statut
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Annuler")) {

            header("Location: ./article.php");
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création
        if (((isset($_POST['numArt'])) AND !empty($_POST['numArt']))
            AND (!empty($_POST['Submit']) AND ($Submit === "Supprimer"))) {
            // Saisies valides
            $erreur = false;

            $numArt = ctrlSaisies($_POST['numArt']);

           
            $monArticle->delete($numArt);

            header("Location: ./article.php");
                
        }
        else{

            header("Location: ./deleteArticle.php?id=");
            
        }
    
    }   
    // Init variables form
    include __DIR__ . '/initArticle.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="stylesheet" href="../../front/assets/css/normalize.css">
    <link rel="stylesheet" href="../css/footer.css">

</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Article</h1>
    <h2>Suupression d'un article</h2>

<?
    // Modif : récup id à modifier
    if (isset($_GET['id']) AND !empty($_GET['id'])) {

        $id = ctrlSaisies(($_GET['id']));
    
        $query = (array)$monArticle->get_1ArticleByThemAngl($id);
        
        if ($query) {
            $numArt = $query['numArt'];
            $libTitrArt = $query['libTitrArt'];
            $libChapoArt = $query['libChapoArt'];
            $libAccrochArt = $query['libAccrochArt'];
            $parag1Art = $query['parag1Art'];
            $libSsTitr1Art = $query['libSsTitr1Art'];
            $parag2Art = $query['parag2Art'];
            $libSsTitr2Art= $query['libSsTitr2Art'];
            $parag3Art = $query['parag3Art'];
            $libConclArt = $query['libConclArt'];
            $urlPhotArt = $query['urlPhotArt'];
            $libAngl = $query['libAngl'];
            $libThem = $query['libThem'];
        }   // Fin if ($query)
    }   // Fin if (isset($_GET['id'])...)

?>

    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Suppression Article...</legend>

        <input type="hidden" id="numArt" name="numArt" value="<?= $_GET['id']; ?>" />

        <div class="control-group">
            <label class="control-label" for="libTitrArt"><b>Titre de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libTitrArt" id="libTitrArt" size="80" maxlength="80" value="<?= $libTitrArt; ?>" autofocus="autofocus" disabled/>
        </div>
        <div class="control-group">
            <label class="control-label" for="libChapoArt"><b>Chapô de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libChapoArt" id="libChapoArt" size="80" maxlength="80" value="<?= $libChapoArt; ?>" autofocus="autofocus" disabled/>
        </div>
        <div class="control-group">
            <label class="control-label" for="libAccrochArt"><b>Accroche de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libAccrochArt" id="libAccrochArt" size="80" maxlength="80" value="<?= $libAccrochArt; ?>" autofocus="autofocus" disabled/>
        </div>
        <div class="control-group">
            <label class="control-label" for="parag1Art"><b>Paragraphe 1 de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="parag1Art" id="parag1Art" size="80" maxlength="1400" value="<?= $parag1Art; ?>" autofocus="autofocus" disabled/>
        </div>
        <div class="control-group">
            <label class="control-label" for="libSsTitr1Art"><b>Sous-titre 1 de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libSsTitr1Art" id="libSsTitr1Art" size="80" maxlength="80" value="<?= $libSsTitr1Art; ?>" autofocus="autofocus" disabled/>
        </div>
        <div class="control-group">
            <label class="control-label" for="parag2Art"><b>Paragraphe 2 de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="parag2Art" id="parag2Art" size="80" maxlength="1400" value="<?= $parag2Art; ?>" autofocus="autofocus" disabled/>
        </div>
        <div class="control-group">
            <label class="control-label" for="libSsTitr2Art"><b>Sous-titre 2 de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libSsTitr2Art" id="libSsTitr2Art" size="80" maxlength="80" value="<?= $libSsTitr2Art; ?>" autofocus="autofocus" disabled/>
        </div>
        <div class="control-group">
            <label class="control-label" for="parag3Art"><b>Paragraphe 3 de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="parag3Art" id="parag3Art" size="80" maxlength="1400" value="<?= $parag3Art; ?>" autofocus="autofocus" disabled/>
        </div>
        <div class="control-group">
            <label class="control-label" for="libConclArt"><b>Conclusion de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libConclArt" id="libConclArt" size="80" maxlength="80" value="<?= $libConclArt; ?>" autofocus="autofocus" disabled/>
        </div>
        <div class="control-group">
            <label for="urlPhotArt"> Photo Article:</label>
            <input type="file" name="urlPhotArt" />
        </div>
        <div class="control-group">
            <label for="libAngl">Angle:</label>  
            <input type="text" name="libAngl" id="libAngl" value="<?php echo $libAngl;?>" disabled/>
        </div>
        <div class="control-group">
            <label for="libThem">Thématiques:</label>  
            <input type="text" name="libThem" id="libThem" value="<?php echo $libThem;?>" disabled/>
        </div>

        <div class="control-group">
            <div class="controls">
                <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Annuler" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Supprimer" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                <br>
            </div>
        </div>
      </fieldset>
    </form>
<?php
require_once __DIR__ . '/footerArticle.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
