<?php
///////////////////////////////////////////////////////////////
//
//  CRUD LANGUE (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : deleteLangue.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // insertion classe LANGUE
    require_once __DIR__ . '/../../util/ctrlSaisies.php';
    require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';
    global $db;
    $maLangue = new LANGUE;


    // Ctrl CIR
    require_once __DIR__ . '/../../CLASS_CRUD/motCle.class.php';
    require_once __DIR__ . '/../../CLASS_CRUD/angle.class.php';
    require_once __DIR__ . '/../../CLASS_CRUD/thematique.class.php';
    global $db;
    $monMotCle = new MOTCLE;
    $monAngle = new ANGLE;
    $maThematique = new THEMATIQUE;
    $errCIR = 0;


   // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
   // suppression effective de la LANGUE
   if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Opérateur ternaire
    $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

    if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Annuler")) {

        header("Location: ./langue.php");
    }   // End of if ((isset($_POST["submit"])) ...

    if ((isset($_POST['id']) AND !empty($_POST['id']))
        AND (!empty($_POST['Submit']) AND ($Submit === "Supprimer"))) {
        
            $idLangue = ctrlSaisies($_POST['id']);

            //Comptage MOTCLE
            $nbMotCle = $monMotCle -> get_NbAllMotCleByidLangue($idLangue);

            //Comptage ANGLE
            $nbAngle = $monAngle -> get_NbAllAngleByidLangue($idLangue);

            //Comptage THEMATIQUE
            $nbThematique = $maThematique -> get_NbAllThematiqueByidLangue($idLangue);

            //Controle CIR

            if (($nbMotCle < 1) AND ($nbAngle <1) AND ($nbThematique < 1)){
                $maLangue -> delete($idLangue);
                header("Location: ./langue.php");
            }
            else{
                $errCIR = 1;
                header("Location: ./langue.php?errCIR=".$errCIR);
            }

    }   // End of if ((isset($_POST['id'])
}   // End of if ($_SERVER["REQUEST_METHOD"] === "POST")
// Init variables form
include __DIR__ . '/initLangue.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Langue</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        #p1 {
            max-width: 600px;
            width: 600px;
            max-height: 200px;
            height: 200px;
            border: 1px solid #000000;
            background-color: whitesmoke;
            /* Coins arrondis et couleur du cadre */
            border: 2px solid grey;
            -moz-border-radius: 8px;
            -webkit-border-radius: 8px;
            border-radius: 8px;
        }
        .error {
            padding: 2px;
            border: solid 0px black;
            color: red;
            font-style: italic;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Langue</h1>
    <h2>Suppression d'une langue</h2>
<?
     if (isset($_GET['id']) AND !empty($_GET['id'])) {

        $id = ctrlSaisies(($_GET['id']));

        $query = (array)$maLangue->get_1LangueByPays($id);
      
        
        if ($query) {
            $lib1Lang = $query['lib1Lang'];
            $lib2Lang = $query['lib2Lang'];
            $numPays = $query['numPays'];
            $numLang = $query['numLang'];
            $frPays = $query['frPays'];
        }   // Fin if ($query)
    }   // Fin if (isset($_GET['id'])...)
   

?>    <form method="post" action="./deleteLangue.php" enctype="multipart/form-data">

      <fieldset>
      <legend class="legend1">Suppression Langue...</legend>

        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />

        <div class="control-group">
            <label class="control-label" for="lib1Lang"><b>Langue libellé court&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="lib1Lang" id="lib1Lang" size="80" maxlength="80" value="<?= $lib1Lang; ?>" autofocus="autofocus" disabled="disabled" />
        </div>

        <div class="control-group">
            <label class="control-label" for="lib2Lang"><b>Langue libellé long&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="lib2Lang" id="lib2Lang" size="80" maxlength="80" value="<?= $lib2Lang; ?>" disabled="disabled" />
        </div>

        <div class="control-group">
            <label for="pays">Num Pays :</label>  
            <input type="text" name="frPays" id="frPays" size="80" maxlength="80" value="<?= $frPays; ?>" disabled="disabled" />
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
    <br>
<?php
require_once __DIR__ . '/footerLangue.php';
require_once __DIR__ . '/footer.php';
?>
</body>
</html>
