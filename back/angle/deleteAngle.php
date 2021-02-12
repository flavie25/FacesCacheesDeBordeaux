<?php
///////////////////////////////////////////////////////////////
//
//  CRUD ANGLE (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : deleteAngle.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // insertion classe ANGLE
    require_once __DIR__ . '/../../util/ctrlSaisies.php';
    require_once __DIR__ . '/../../CLASS_CRUD/angle.class.php';
    global $db;
    $monAngle = new ANGLE;


   // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
   // suppression effective du angle
   if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Opérateur ternaire
    $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

    if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Annuler")) {

        header("Location: ./angle.php");
    }   // End of if ((isset($_POST["submit"])) ...

    if ((isset($_POST['id']) AND !empty($_POST['id']))
    AND (!empty($_POST['Submit']) AND ($Submit === "Supprimer"))) {
            
            $numAngl = ctrlSaisies($_POST['id']); 
              
            $monAngle->delete($numAngl);
            header("Location: ./angle.php");

    }   // End of if ((isset($_POST['id'])
}   // End of if ($_SERVER["REQUEST_METHOD"] === "POST")
// Init variables form
include __DIR__ . '/initAngle.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD ANGLE</title>
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
    <h1>BLOGART21 Admin - Gestion du CRUD ANGLE</h1>
    <h2>Suppression d'un angle</h2>
<? 
// Modif : récup id à modifier
    if (isset($_GET['id']) and !empty($_GET['id'])){

        $id = ctrlSaisies(($_GET['id']));

        $query = (array)$monAngle->get_1AngleByLangue($id);

        if ($query) {
            $libAngl = $query['libAngl'];
            $lib1Lang = $query['lib1Lang'];
        }   // Fin if ($query)
    }   // Fin if (isset($_GET['id'])...)


?>    
    <form method="post" action="./deleteAngle.php" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire Angle...</legend>

        <input type="hidden" id="id" name="id" value="<?= $_GET['id'];?>"/>

        <div class="control-group">
            <label class="control-label" for="libAngl"><b>Nom de l'angle :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libAngl" id="libAngl" size="80" maxlength="80" value="<?= $libAngl; ?>" disabled="disabled" />
        </div>
        <div class="control-group">
            <label class="control-label" for="lib1Lang"><b>Langue :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="lib1Lang" id="lib1Lang" size="80" maxlength="80" value="<?= $lib1Lang; ?>" disabled="disabled" />
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
require_once __DIR__ . '/footerAngle.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
