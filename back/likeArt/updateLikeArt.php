<?
///////////////////////////////////////////////////////////////
//
//  CRUD LIKEART (PDO) - Code Modifié - 30 Janvier 2021
//
//  Script  : createLikeArticle.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
    require_once __DIR__ . '/../../util/utilErrOn.php';
    
    
    // controle des saisies du formulaire
    require_once __DIR__ . '/../../util/ctrlSaisies.php';
    require_once __DIR__ . '/../../CLASS_CRUD/likeArt.class.php';
    

    
    global $db;
    $monLikeArt= new LIKEART;
    // insertion classe LIKEART

    $erreur = false;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';
        //Submit = "";
        if ((isset($_POST["Submit"])) AND ($Submit === "Initialiser")) {

            $sameId1 = $_POST['id1'];
            $sameId2 = $_POST['id2'];
            header("Location: ./updateLikeart.php?id1=".$sameId1."&id2=".$sameId2);
        }
        // Mode création
        if (((isset($_POST['id1'])) AND !empty($_POST['id1']))
        AND ((isset($_POST['id2'])) AND !empty($_POST['id2']))
        AND (!empty($_POST['Submit']) AND ($Submit === "Valider"))) {
            // Saisies valides
            $erreur = false;
            $numMemb = ctrlSaisies(($_POST['id1']));
            $numArt = ctrlSaisies(($_POST['id2']));
            $valLikeA = ctrlSaisies($_POST['likeA']);
            $likeA = ($valLikeA == "on") ? 1 : 0;
            var_dump($numMemb);
            var_dump($numArt);
            var_dump($likeA);
            $monLikeArt->update($numArt, $numMemb, $likeA);

            header("Location: ./likeArt.php");

        }   // Fin if
        else {
            $erreur = true;
            $errSaisies = "Erreur, la saisie est obligatoire !";
        }
            
    }
    
    include __DIR__ . '/initLikeArt.php';
    
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Like Article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Like Article</h1>
    <h2>Modification d'un like</h2>
    <?
    global $db;
     if (isset($_GET['id1']) and $_GET['id1'] AND isset($_GET['id2']) and $_GET['id2']) {
  
        $id1= ctrlSaisies(($_GET['id1']));
        $id2 = ctrlSaisies(($_GET['id2']));
        
        $query = (array)$monLikeArt->get_1LikeArt($id1, $id2);

        if ($query) {
            $likeA = $query['likeA'];
            $numMemb = $query['numMemb'];
            $pseudoMemb = $query['pseudoMemb'];
            $numArt = $query['numArt'];
            $libTitrArt = $query['libTitrArt'];
            
        }   // Fin if ($query)
    }   // Fin if (isset($_GET['id'])...)
?>

    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

        <fieldset>
            <legend class="legend1">Formulaire Like Article...</legend>

            <input type="hidden" id="id1" name="id1" value="<?= isset($_GET['id1']) ? $_GET['id1'] : '' ?>" />
            <input type="hidden" id="id2" name="id2" value="<?= isset($_GET['id2']) ? $_GET['id2'] : '' ?>" />
            <div class="control-group">
                <label class="control-label" for="numMemb"><b>Titre de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="numMemb" id="numMemb" size="80" maxlength="80" value="<?= $pseudoMemb; ?>" disabled />
            </div>
            <div class="control-group">
                <label class="control-label" for="numArt"><b>Chapô de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="numArt" id="numArt" size="80" maxlength="80" value="<?= $libTitrArt; ?>"disabled  />
            </div>
            <div class="control-group">
                
                </select>
                <br><br>
                <label class="control-label" for=""><b> Voulez vous liker cet article? :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label><br>
                
                <input type="checkbox" name="likeA" id="likeA" <?=  ($likeA == 1)  ? 'checked="checked" "value="on" ' : 'value="on"' ?> />

            </div>

            <?
            if ($erreur)
            {
                echo ($errSaisies);
            }
            else {
                $errSaisies= "";
                echo ($errSaisies);
    
            }
?>
            <div class="control-group">

                <div class="controls">
                    <br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" value="Annuler"  name="Submit" />
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" value="Valider"  name="Submit" />
                    <br>
                </div>
            </div>
        </fieldset>
    </form>
    <?
require_once __DIR__ . '/footerLikeArt.php';

require_once __DIR__ . '/../../footer.php';
?>
</body>

</html>