<?php
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : createMembre.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // insertion classe STATUT
    require_once __DIR__ . '/../../util/ctrlSaisies.php';
    require_once __DIR__ . '/../../CLASS_CRUD/membre.class.php';
    global $db;
    $membre = new MEMBRE;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif du statut
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Initialiser")) {

            header("Location: ./createStatut.php");
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création
        if (((isset($_POST['libStat'])) AND !empty($_POST['libStat']))
            AND (!empty($_POST['Submit']) AND ($Submit === "Valider"))) {
            // Saisies valides
            $erreur = false;

            $libStat = ctrlSaisies(($_POST['libStat']));

            $monStatut->create($libStat);

            header("Location: ./statut.php");
        }   // Fin if ((isset($_POST['libStat'])) ...
        else {
            $erreur = true;
            $errSaisies =  "Erreur, la saisie est obligatoire !";
        }   // End of else erreur saisies

    }   // Fin if ($_SERVER["REQUEST_METHOD"] == "POST")

    // Init variables form
    include __DIR__ . '/initMembre.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Statut</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Membre</h1>
    <h2>Ajout d'un membre</h2>

    <form method="post" action="./createMembre.php" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire Membre...</legend>

        <!--<input type="hidden" id="id" name="id" value=": /*$_GET['id']; */-->

        <div class="control-group">
            <label class="control-label" for="prenomMembre"><b>Prénom&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="prenomMembre" id="prenomMembre" size="80" maxlength="80" value="<?= $libStat; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="nomMembre"><b>Nom&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="nomMembre" id="nomMembre" size="80" maxlength="80" value="<?= $libStat; ?>" />
        </div>
        <div class="control-group">
            <label class="control-label" for="pseudoMembre"><b>Pseudo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="pseudoMembre" id="pseudoMembre" size="80" maxlength="80" value="<?= $libStat; ?>"  />
        </div>
        <div class="control-group">
            <label class="control-label" for="passMembre"><b>Mot de passe&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="password" name="passMembre" id="passMembre" size="80" maxlength="80" value="<?= $libStat; ?>"  />
        </div>
        <div class="control-group">
            <label class="control-label" for="eMailMembre"><b>e-Mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="eMailMembre" id="eMailMembre" size="80" maxlength="80" value="<?= $libStat; ?>" />
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
require_once __DIR__ . '/footerMembre.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
