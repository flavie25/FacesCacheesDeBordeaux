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

            header("Location: ./createMembre.php");
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
            $dtCreaMembre = date("y-m-d h:m:s");
            $souvenirMembre = ctrlSaisies($_POST['souvenirMemb']);
            $accordMembre = ctrlSaisies($_POST['accordMemb']);

            $membre->create($numMembre, $prenomMembre, $nomMembre,$pseudoMembre,$passMembre,$emailMembre,$dtCreaMembre,$souvenirMembre,$accordMembre);
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
            <label class="control-label" for="prenomMemb"><b>Prénom&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="prenomMemb" id="prenomMemb" size="80" maxlength="80" value="<?= $prenomMembre; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="nomMemb"><b>Nom&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="nomMemb" id="nomMemb" size="80" maxlength="80" value="<?= $nomMembre; ?>" />
        </div>
        <div class="control-group">
            <label class="control-label" for="pseudoMemb"><b>Pseudo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="pseudoMemb" id="pseudoMemb" size="80" maxlength="80" value="<?= $pseudoMembre; ?>"  />
        </div>
        <div class="control-group">
            <label class="control-label" for="passMemb"><b>Mot de passe&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="password" name="passMemb" id="passMemb" size="80" maxlength="80" value="<?= $passMembre; ?>"  />
        </div>
        <div class="control-group">
            <label class="control-label" for="eMailMemb"><b>e-Mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="eMailMemb" id="eMailMemb" size="80" maxlength="80" value="<?= $emailMembre; ?>" />
        </div>
        <div class="control-group">
            <label for="souvenirMemb">Se souvenir de moi :</label>  
            <input type="radio" name="eMailMemb" id="Oui" size="80" maxlength="80" value="Oui" checked />  
            <label for="Oui">Oui</label>
            <input type="radio" name="eMailMemb" id="Non" size="80" maxlength="80" value="Non" checked />  
            <label for="Non">Non</label>      
        </div>
        <div class="control-group">
            <label for="accordMemb">J'accepte l'utilisation de mes données :</label>  
            <select id="accordMemb" name="accordMemb" onchange="select()">
                <option value="">Oui</option>
                <option value="">Non</option>
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
require_once __DIR__ . '/footerMembre.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
