<?php
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : createArticle.php  (ETUD)   -   BLOGART21
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

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Initialiser")) {

            header("Location: ./createArticle.php");
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création
        if (((isset($_POST['libTitrArt'])) AND !empty($_POST['libTitrArt']))
            AND (!empty($_POST['Submit']) AND ($Submit === "Valider"))
            AND (isset($_POST['libChapoArt'])) AND !empty($_POST['libChapoArt'])
            AND (isset($_POST['libAccrochArt'])) AND !empty($_POST['libAccrochArt'])
            AND (isset($_POST['parag1Art'])) AND !empty($_POST['parag1Art'])
            AND (isset($_POST['libSsTitr1Art'])) AND !empty($_POST['libSsTitr1Art'])
            AND (isset($_POST['parag2Art'])) AND !empty($_POST['parag2Art'])
            AND (isset($_POST['libSsTitr2Art'])) AND !empty($_POST['libSsTitr2Art'])
            AND (isset($_POST['parag3Art'])) AND !empty($_POST['parag3Art'])
            AND (isset($_POST['libConclArt'])) AND !empty($_POST['libConclArt'])
            //AND (isset($_POST['urlPhotArt'])) AND !empty($_POST['urlPhotArt'])
            AND (isset($_POST['numAngl'])) AND !empty($_POST['numAngl'])
            AND (isset($_POST['numThem'])) AND !empty($_POST['numThem'])) {
            // Saisies valides
            $erreur = false;

            $libTitrArt = ctrlSaisies($_POST['libTitrArt']);
            $libChapoArt = ctrlSaisies($_POST['libChapoArt']);
            $libAccrochArt = ctrlSaisies($_POST['libAccrochArt']);
            $parag1Art = ctrlSaisies($_POST['parag1Art']);
            $libSsTitr1Art = ctrlSaisies($_POST['libSsTitr1Art']);
            $parag2Art = ctrlSaisies($_POST['parag2Art']);
            $libSsTitr2Art= ctrlSaisies($_POST['libSsTitr2Art']);
            $parag3Art = ctrlSaisies($_POST['parag3Art']);
            $libConclArt = ctrlSaisies($_POST['libConclArt']);
            $urlPhotArt = ctrlSaisies($_POST['urlPhotArt']);
            $numAngl = ctrlSaisies($_POST['numAngl']);
            $numThem = ctrlSaisies($_POST['numThem']);
            $dtCreArt = date("Y-m-d h:i:s");

           
            $dernier_id = $monArticle->create($dtCreArt, $libTitrArt, $libChapoArt, $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art, $libSsTitr2Art, $parag3Art, $libConclArt, $numAngl, $numThem);
            
            if(!empty($_FILES['urlPhotArt']['name']))
            {
              $file_name = $_FILES['urlPhotArt']['name'];
              $file_size =$_FILES['urlPhotArt']['size']; // taille de l'image
      
              $temp = explode('.',$file_name);
              $file_ext = strtolower(end($temp)); // extension de l'image
      
              $extensions= array("jpeg","jpg","png"); // extensions autorisées
      
              if (in_array($file_ext,$extensions) == true)
              {
                if($file_size != 0) {
                  //si la taille du fichier est trop grande elle passe à 0
                  // donc si l'image à un "name" mais que ça taille est 0 c'est qu'elle est trop grande
      
      
                  // $uploaddir = "./images_uploads/";
                  $uploaddir = "./upload/";
                  // avec ce chemin, peut importe où le site est utilisé on est sûr que ça s'enregistrera au même endroit
                  $uploadfile = "membre-".$dernier_id.".png";
      
      
                  if (move_uploaded_file($_FILES['urlPhotArt']['tmp_name'], $uploaddir.$uploadfile))
                  {
                      echo "Succes !";
      
                      ///////////////// ajout de l'image et du reste dans la bd ///////////////////
                      global $db;
                      $requete="UPDATE ARTICLE SET urlPhotArt = ? WHERE numArt = ? ";
                      $reponse=$db->prepare($requete);
                      $reponse->execute([$uploadfile, $dernier_id]);
                  }
                  else
                  {
                      echo "Probleme sur le serveur.";
                      $file_name='';
                  }
                } else {
                  echo "Fichier trop gros";
                  $file_name='';
                }
              }
             else
              {
              echo "Pas le bon type de fichier";
              $file_name='';
              }
            }
            else
            {
              echo "pas de fichier spécifié";
              $file_name='';
            }


            header("Location: ./article.php");
                
        }
        else{

            header("Location: ./createArticle.php?id=");
            
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
    <h2>Ajout d'un article</h2>

    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire Article...</legend>

        <!--<input type="hidden" id="id" name="id" value=": /*$_GET['id']; */-->

        <div class="control-group">
            <label class="control-label" for="libTitrArt"><b>Titre de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libTitrArt" id="libTitrArt" size="80" maxlength="80" value="<?= $libTitrArt; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="libChapoArt"><b>Chapô de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libChapoArt" id="libChapoArt" size="80" maxlength="80" value="<?= $libChapoArt; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="libAccrochArt"><b>Accroche de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libAccrochArt" id="libAccrochArt" size="80" maxlength="80" value="<?= $libAccrochArt; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="parag1Art"><b>Paragraphe 1 de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="parag1Art" id="parag1Art" size="80" maxlength="1400" value="<?= $parag1Art; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="libSsTitr1Art"><b>Sous-titre 1 de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libSsTitr1Art" id="libSsTitr1Art" size="80" maxlength="80" value="<?= $libSsTitr1Art; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="parag2Art"><b>Paragraphe 2 de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="parag2Art" id="parag2Art" size="80" maxlength="1400" value="<?= $parag2Art; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="libSsTitr2Art"><b>Sous-titre 2 de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libSsTitr2Art" id="libSsTitr2Art" size="80" maxlength="80" value="<?= $libSsTitr2Art; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="parag3Art"><b>Paragraphe 3 de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="parag3Art" id="parag3Art" size="80" maxlength="1400" value="<?= $parag3Art; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="libConclArt"><b>Conclusion de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libConclArt" id="libConclArt" size="80" maxlength="80" value="<?= $libConclArt; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label for="urlPhotArt"> Photo Article:</label>
            <input type="file" name="urlPhotArt" />
        </div>
        <div class="control-group">
            <label for="numAngl">Angle:</label>  
            <select id="numAngl" name="numAngl"  onchange="select()">
                <?php 
                global $db;
                $requete = 'SELECT numAngl, libAngl FROM ANGLE ;';
                $result = $db->query($requete);
                $allAngle = $result->fetchAll();
                foreach ($allAngle AS $angle)
                {
                ?>
                <option value="<?php echo $angle['numAngl'];?>"><?php echo $angle['libAngl'];?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="control-group">
            <label for="numThem">Thèmatiques:</label>  
            <select id="numThem" name="numThem"  onchange="select()">
                <?php 
                global $db;
                $requete = 'SELECT numThem, libThem FROM THEMATIQUE ;';
                $result = $db->query($requete);
                $allThem = $result->fetchAll();
                foreach ($allThem AS $them)
                {
                ?>
                <option value="<?php echo $them['numThem'];?>"><?php echo $them['libThem'];?></option>
                <?php
                }
                ?>
            </select>
        </div>

        <div class="control-group">
            <div class="controls">
                <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Initialiser" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
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
