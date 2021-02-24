<?php
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : updateArticle.php  (ETUD)   -   BLOGART21
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
    
    require_once __DIR__ .'./initVar.php';
    require_once __DIR__ .'./initConst.php';
    $TargetDir = TARGET;

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
            AND (!empty($_POST['Submit']) AND ($Submit === "Valider"))
            AND ((isset($_POST['libTitrArt'])) AND !empty($_POST['libTitrArt']))
            AND (isset($_POST['libChapoArt'])) AND !empty($_POST['libChapoArt'])
            AND (isset($_POST['libAccrochArt'])) AND !empty($_POST['libAccrochArt'])
            AND (isset($_POST['parag1Art'])) AND !empty($_POST['parag1Art'])
            AND (isset($_POST['libSsTitr1Art'])) AND !empty($_POST['libSsTitr1Art'])
            AND (isset($_POST['parag2Art'])) AND !empty($_POST['parag2Art'])
            AND (isset($_POST['libSsTitr2Art'])) AND !empty($_POST['libSsTitr2Art'])
            AND (isset($_POST['parag3Art'])) AND !empty($_POST['parag3Art'])
            AND (isset($_POST['libConclArt'])) AND !empty($_POST['libConclArt'])
            AND (isset($_POST['numAngl'])) AND !empty($_POST['numAngl'])
            AND (isset($_POST['numThem'])) AND !empty($_POST['numThem'])) {
            // Saisies valides
            $erreur = false;

            if((isset($_FILES['monfichier']['tmp_name'])) AND !empty($_FILES['monfichier']['tmp_name'])){
                
                require_once __DIR__ . '/ctrlerUploadImage.php';
                $urlPhotArt = $nomImage;
            }
            else{
                
                $urlPhotArt =-1;
            }

            $numArt = ctrlSaisies($_POST['numArt']);
            $libTitrArt = ctrlSaisies($_POST['libTitrArt']);
            $libChapoArt = ctrlSaisies($_POST['libChapoArt']);
            $libAccrochArt = ctrlSaisies($_POST['libAccrochArt']);
            $parag1Art = ctrlSaisies($_POST['parag1Art']);
            $libSsTitr1Art = ctrlSaisies($_POST['libSsTitr1Art']);
            $parag2Art = ctrlSaisies($_POST['parag2Art']);
            $libSsTitr2Art= ctrlSaisies($_POST['libSsTitr2Art']);
            $parag3Art = ctrlSaisies($_POST['parag3Art']);
            $libConclArt = ctrlSaisies($_POST['libConclArt']);
            $numAngl = ctrlSaisies($_POST['numAngl']);
            $numThem = ctrlSaisies($_POST['numThem']);
            

           
            $monArticle->update($numArt, $libTitrArt, $libChapoArt, $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art, $libSsTitr2Art, $parag3Art, $libConclArt,$urlPhotArt, $numAngl, $numThem);
            

            header("Location: ./article.php");
                
        }
        else{

            header("Location: ./updateArticle.php?id=");
            
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

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Article</h1>
    <h2>Modification d'un article</h2>

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
            $numAngl = $query['numAngl'];
            $libAngl = $query['libAngl'];
            $numLang = $query['numLang'];
            $numThem = $query['numThem'];
            $libThem = $query['libThem'];
        }   // Fin if ($query)
    }   // Fin if (isset($_GET['id'])...)

?>

    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire Article...</legend>

        <input type="hidden" id="numArt" name="numArt" value="<?= $_GET['id']; ?>" />

        <div class="control-group">
            <label class="control-label" for="libTitrArt"><b>Titre de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libTitrArt" id="libTitrArt" size="80" maxlength="80" value="<?= $libTitrArt; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="libChapoArt"><b>Chapô de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libChapoArt" id="libChapoArt" size="80" maxlength="80" value="<?= $libChapoArt; ?>"  />
        </div>
        <div class="control-group">
            <label class="control-label" for="libAccrochArt"><b>Accroche de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libAccrochArt" id="libAccrochArt" size="80" maxlength="80" value="<?= $libAccrochArt; ?>"  />
        </div>
        <div class="control-group">
            <label class="control-label" for="parag1Art"><b>Paragraphe 1 de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="parag1Art" id="parag1Art" size="80" maxlength="1400" value="<?= $parag1Art; ?>"  />
        </div>
        <div class="control-group">
            <label class="control-label" for="libSsTitr1Art"><b>Sous-titre 1 de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libSsTitr1Art" id="libSsTitr1Art" size="80" maxlength="80" value="<?= $libSsTitr1Art; ?>"  />
        </div>
        <div class="control-group">
            <label class="control-label" for="parag2Art"><b>Paragraphe 2 de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="parag2Art" id="parag2Art" size="80" maxlength="1400" value="<?= $parag2Art; ?>"  />
        </div>
        <div class="control-group">
            <label class="control-label" for="libSsTitr2Art"><b>Sous-titre 2 de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libSsTitr2Art" id="libSsTitr2Art" size="80" maxlength="80" value="<?= $libSsTitr2Art; ?>"  />
        </div>
        <div class="control-group">
            <label class="control-label" for="parag3Art"><b>Paragraphe 3 de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="parag3Art" id="parag3Art" size="80" maxlength="1400" value="<?= $parag3Art; ?>"  />
        </div>
        <div class="control-group">
            <label class="control-label" for="libConclArt"><b>Conclusion de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libConclArt" id="libConclArt" size="80" maxlength="80" value="<?= $libConclArt; ?>"  />
        </div>
       
        <div class="control-group">
            <label for="numAngl">Angle:</label>  
            <select id="numAngl" name="numAngl"  >
                <?php 
                global $db;
                $requete = 'SELECT numAngl, libAngl FROM ANGLE WHERE numLang = ? ORDER BY libAngl ASC;';
                $result = $db->prepare($requete);
                $result->execute([$numLang]);
                $allAngle = $result->fetchAll();
                foreach ($allAngle AS $angle)
                {
                ?>
                <option value="<?= ($angle['numAngl']); ?>" <?= (isset($numAngl) && $numAngl == $angle['numAngl'] ) ? " selected=\"selected\"" : null; ?> >
                    <?= $angle['libAngl']; ?>
                </option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="control-group">
            <label for="numThem">Thématiques:</label>  
            <select id="numThem" name="numThem"  >
                <?php 
                global $db;
                $requete = 'SELECT numThem, libThem FROM THEMATIQUE WHERE numLang = ?;';
                $result = $db->prepare($requete);
                $result->execute([$numLang]);
                $allThem = $result->fetchAll();
                foreach ($allThem AS $them)
                {
                ?>
                <option value="<?= ($them['numThem']); ?>" <?= (isset($numThem) && $numThem == $them['numThem'] ) ? " selected=\"selected\"" : null; ?> >
                        <?= $them['libThem']; ?>
                </option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="control-group">
            <label for="motCle">Mots Clés:</label>  
            <select id="motCle" name="motCle"  multiple="multiple" size="10">
                
            </select>
        </div>

        <div class="control-group">
            <label class="control-label" for="monfichier"><b>Importez l'illustration :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <div class="controls">
                <input type="file" name="monfichier" id="monfichier"  accept=".jpg,.gif,.png,.jpeg" size="70" maxlength="70" value="<?  echo $urlPhotArt;  ?>" tabindex="110" placeholder="Sur 70 car." title="Recherchez l'image à uploader !" />
                <p>
                <? // Gestion extension images acceptées
                  $msgImagesOK = "&nbsp;&nbsp;>> Extension des images acceptées : .jpg, .gif, .png, .jpeg" . "<br>" .
                    "(lageur, hauteur, taille max : 80000px, 80000px, 200 000 Go)";
                  echo "<i>" . $msgImagesOK . "</i>";
                ?>
                </p>
                <img alt="photo" scr="../../uploads/<?= $urlPhotArt;?>"/>
                <? echo $urlPhotArt;?>
            </div>
            <img src="<?= $TargetDir.htmlspecialchars($urlPhotArt);?>"/>
        </div>

        <div class="control-group">
            <div class="controls">
                <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Annuler" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Valider" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
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
