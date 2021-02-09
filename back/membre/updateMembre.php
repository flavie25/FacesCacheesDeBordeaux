<?php
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : updateMembre.php  (ETUD)   -   BLOGART21
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

            header("Location: ./updateMembre.php");
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création
        if ((isset($_POST['id'])) AND !empty($_POST['id'])
        AND (!empty($_POST['Submit'])) AND ($Submit === "Valider")
        AND (isset($_POST['prenomMemb'])) AND !empty($_POST['prenomMemb'])
        AND (isset($_POST['nomMemb'])) AND !empty($_POST['nomMemb'])
        AND (isset($_POST['pseudoMemb'])) AND !empty($_POST['pseudoMemb'])
        AND (isset($_POST['passMemb'])) AND !empty($_POST['passMemb'])
        AND (isset($_POST['eMailMemb'])) AND !empty($_POST['eMailMemb'])
        AND (isset($_POST['souvenirMemb'])) AND !empty($_POST['souvenirMemb'])
        AND (isset($_POST['accordMemb'])) AND !empty($_POST['accordMemb'])){

            $erreur = false;

            $numMembre = ctrlSaisies($_POST['id']);
            $prenomMembre = ctrlSaisies($_POST['prenomMemb']);
            $nomMembre = ctrlSaisies($_POST['nomMemb']);
            $pseudoMembre = ctrlSaisies($_POST['pseudoMemb']);
            $passMembre = ctrlSaisies($_POST['passMemb']);
            $emailMembre = ctrlSaisies($_POST['eMailMemb']);
            $dtCreaMembre = getdate()
            $souvenirMembre = ctrlSaisies($_POST['souvenirMemb']);
            $accordMembre = ctrlSaisies($_POST['accordMemb']);

            $membre->update($numMembre, $prenomMembre, $nomMembre,$pseudoMembre,$passMembre,$emailMembre,$dtCreaMembre,$souvenirMembre,$accordMembre);
            header("Location: ./membre.php");
              

        } 
        
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
    <title>Admin - Gestion du CRUD Membre</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Membre</h1>
    <h2>Modification d'un membre</h2>
<?
    // Modif : récup id à modifier
    if (isset($_GET['id']) and $_GET['id'] > 0) {

        $id = ctrlSaisies(($_GET['id']));

        $query = (array)$membre->get_1Membre($id);

        if ($query) {
            $numMembre = $query['numMemb'];
            $prenomMembre = $query['prenomMemb'];
            $nomMembre = $query['nomMemb'];
            $pseudoMembre = $query['pseudoMemb'];
            $passMembre = $query['passMemb'];
            $emailMembre = $query['eMailMemb'];
            $dtCreaMembre = $query['dtCreaMemb'];
            $souvenirMembre = $query['souvenirMemb'];
            $accordMembre = $query['accordMemb'];
        }   // Fin if ($query)
    }   // Fin if (isset($_GET['id'])...)


?>
    <form method="post" action="./updateMembre.php" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire Membre...</legend>

        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />

        <div class="control-group">
            <label class="control-label" for="libStat"><b>Nouveau prenom du membre :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libStat" id="libStat" size="80" maxlength="80" value="<?= $libStat; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="libStat"><b>Nouveau nom du membre :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libStat" id="libStat" size="80" maxlength="80" value="<?= $libStat; ?>"  />
        </div>
        <div class="control-group">
            <label class="control-label" for="libStat"><b>Nouveau pseudo du membre :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libStat" id="libStat" size="80" maxlength="80" value="<?= $libStat; ?>"  />
        </div>
        <div class="control-group">
            <label class="control-label" for="libStat"><b>Nouveau mot de passe du membre :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libStat" id="libStat" size="80" maxlength="80" value="<?= $libStat; ?>" />
        </div>
        <div class="control-group">
            <label class="control-label" for="libStat"><b>Nouveau email du membre :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libStat" id="libStat" size="80" maxlength="80" value="<?= $libStat; ?>" />
        </div>
        <div class="control-group">
            <label class="control-label" for="libStat"><b>Se souvenir de moi :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libStat" id="libStat" size="80" maxlength="80" value="<?= $libStat; ?>"  />

        </div>
        <div class="control-group">
            <label for="souvenirmembre">Num Pays :</label>  
            <select id="souvenirmembre" name="souvenirmembre"  onchange="select()">
                <option value=""></option>
            <?php
            }
            ?>
            </select>
        </div>
        <div class="control-group">
            <label class="control-label" for="libStat"><b> J'accepte l'utilisation de mes données :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libStat" id="libStat" size="80" maxlength="80" value="<?= $libStat; ?>" />
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
require_once __DIR__ . '/footerStatut.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
