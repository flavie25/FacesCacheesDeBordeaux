<?php
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : createAngle.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // insertion classe STATUT
    require_once __DIR__ . '/../../util/ctrlSaisies.php';
    require_once __DIR__ . '/../../CLASS_CRUD/getNextNumAngl.php';
    require_once __DIR__ . '/../../CLASS_CRUD/angle.class.php';
    global $db;
    $monAngle = new ANGLE;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif du statut
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Initialiser")) {

            header("Location: ./createAngle.php");
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création
        if (((isset($_POST['libAngl'])) AND !empty($_POST['libAngl']))
            AND (!empty($_POST['Submit']) AND ($Submit === "Valider"))
            AND ((isset($_POST['numLang'])) AND !empty($_POST['numLang']))) {
            // Saisies valides
            $erreur = false;

            $libAngl = ctrlSaisies(($_POST['libAngl']));
            $numLang = ctrlSaisies($_POST['numLang']);
            $numAngl = getNextNumAngl($numLang);
            echo $numAngl;

            $monAngle->create($numAngl, $libAngl, $numLang);

            header("Location: ./angle.php");
        }   // Fin if ((isset($_POST['libStat'])) ...
        else {
            $erreur = true;
            $errSaisies =  "Erreur, la saisie est obligatoire !";
        }   // End of else erreur saisies

    }   // Fin if ($_SERVER["REQUEST_METHOD"] == "POST")

    // Init variables form
    include __DIR__ . '/initAngle.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Angle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Angle</h1>
    <h2>Ajout d'un angle</h2>

    <form method="post" action="./createAngle.php" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire Angle...</legend>

        <!--<input type="hidden" id="id" name="id" value=": /*$_GET['id']; */-->

        <div class="control-group">
            <label class="control-label" for="libAngl"><b>Nom de l'angle :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libAngl" id="libAngl" size="80" maxlength="80" value="<?= $libAngl; ?>" autofocus="autofocus" />
        </div>

        <div class="control-group">
            <label for="numLang">Langue :</label>  
            <select id="numLang" name="numLang"  onchange="select()">
                <?php 
                global $db;
                $requete = 'SELECT numLang, lib1Lang FROM LANGUE ;';
                $result = $db->query($requete);
                $allLangue = $result->fetchAll();
                foreach ($allLangue AS $langue)
                {
                ?>
                <option value="<?php echo $langue['numLang'];?>"><?php echo $langue['lib1Lang'];?></option>
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
require_once __DIR__ . '/footerAngle.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
