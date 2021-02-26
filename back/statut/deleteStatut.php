<?php
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : deleteStatut.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // insertion classe STATUT
    require_once __DIR__ . '/../../util/ctrlSaisies.php';
    require_once __DIR__ . '/../../CLASS_CRUD/statut.class.php';
    global $db;
    $monStatut = new STATUT;


    // Ctrl CIR
    require_once __DIR__ . '/../../CLASS_CRUD/user.class.php';
    global $db;
    $monUser = new USER;
    $errCIR = 0;


   // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
   // suppression effective du statut
   if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Opérateur ternaire
    $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

    if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Annuler")) {

        header("Location: ./statut.php");
    }   // End of if ((isset($_POST["submit"])) ...

    if ((isset($_POST['id']) AND $_POST['id'] > 0)
        AND (!empty($_POST['Submit']) AND ($Submit === "Supprimer"))) {
            
            $idStat = ctrlSaisies($_POST['id']);

            $allUser = $monUser->get_NbAllUsersByidStat($idStat);
            
            if($allUser < 1){
                
                $monStatut->delete($idStat);
                header("Location: ./statut.php");

            }
            else{
                $errCIR = 1;
                header("Location: ./statut.php?errCIR=".$errCIR);
            }        

    }   // End of if ((isset($_POST['id'])
}   // End of if ($_SERVER["REQUEST_METHOD"] === "POST")
// Init variables form
include __DIR__ . '/initStatut.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Statut</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="stylesheet" href="../../front/assets/css/normalize.css">
    <link rel="stylesheet" href="../css/footer.css">

</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Statut</h1>
    <h2>Suppression d'un statut</h2>
<?
    if (isset($_GET['id']) and $_GET['id'] > 0) {

        $id = ctrlSaisies(($_GET['id']));

        $query = (array)$monStatut->get_1Statut($id);

        if ($query) {
            $libStat = $query['libStat'];
            $idStat = $query['idStat'];
        }   // Fin if ($query)
    }   // Fin if (isset($_GET['id'])...)
   

?>    <form method="post" action="./deleteStatut.php" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire Statut...</legend>

        <input type="hidden" id="id" name="id" value="<?= $_GET['id'];?>"/>

        <div class="control-group">
            <label class="control-label" for="libStat">Nom du statut :&nbsp;</label>
            <input type="text" name="libStat" id="libStat" size="25" maxlength="25" value="<?= $libStat; ?>" disabled="disabled"/>
        </div>

        <div class="control-group">
            <div class="controls">
                <input class="button" type="submit" value="Annuler" name="Submit" formnovalidate/>
                <input class="button" type="submit" value="Supprimer" name="Submit" />
            </div>
        </div>
      </fieldset>
    </form>
    <br>
<?php
require_once __DIR__ . '/footerStatut.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
