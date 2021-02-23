<?php
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : deleteUser.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // insertion classe STATUT
    require_once __DIR__ . '/../../util/ctrlSaisies.php';
    require_once __DIR__ . '/../../CLASS_CRUD/user.class.php';
    global $db;
    $user = new USER;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif du statut
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Annuler")) {

            header("Location: ./updateUser.php");
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création
        if ((isset($_POST['pseudoUser']) AND !empty($_POST['pseudoUser']))
        AND (isset($_POST['idStat']) AND !empty($_POST['idStat']))
        AND (isset($_POST['passUser']) AND !empty($_POST['passUser']))
        AND (!empty($_POST['Submit'])) AND ($Submit === "Supprimer"))
        {

            $erreur = false;
            $pseudoUser = ctrlSaisies($_POST['pseudoUser']);
            $idStat = ctrlSaisies($_POST['idStat']);
            $passUser = ctrlSaisies($_POST['passUser']);

            if ( $idStat != 9){
                $user->delete($pseudoUser, $passUser);
                header("Location: ./user.php");
            }
            else{
                $errCIR = 1;
                header("Location: ./user.php?errCIR=".$errCIR);
            }     
        }

    }   // Fin if ($_SERVER["REQUEST_METHOD"] == "POST")

    // Init variables form
    include __DIR__ . '/initUser.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD User</h1>
    <h2>Suppression d'un User</h2>
<?
    // Modif : récup id à modifier
    if (isset($_GET['id']) and !empty($_GET['id'])) {

        $id = ctrlSaisies(($_GET['id']));

        $query = (array)$user->get_1UserByStatut($id);

        if ($query) {
            $pseudoUser = $query['pseudoUser'];
            $passUser = $query['passUser'];
            $nomUser = $query['nomUser'];
            $prenomUser = $query['prenomUser'];
            $eMailUser = $query['eMailUser'];
            $idStat = $query['idStat'];
            $libStat = $query['libStat'];
        }   // Fin if ($query)
    }   // Fin if (isset($_GET['id'])...)


?>
<form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">

    <fieldset>
        <legend class="legend1">Formulaire User...</legend>

        <div class="control-group">
            <label class="control-label" for="pseudoUser"><b>Pseudo :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="pseudoUser" id="pseudoUser" size="80" maxlength="80" value="<?= $pseudoUser; ?>" readonly />
        </div>
        <div class="control-group">
            <label class="control-label" for="passUser"><b>Mot de passe :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="password" name="passUser" id="passUser" size="80" maxlength="80" value="<?= $passUser; ?>" readonly/>
        </div>
        <div class="control-group">
            <label class="control-label" for="nomUser"><b>Nom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="nomUser" id="nomUser" size="80" maxlength="80" value="<?= $nomUser; ?>" disabled/>
        </div>
        <div class="control-group">
            <label class="control-label" for="prenomUser"><b>Prénom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="prenomUser" id="prenomUser" size="80" maxlength="80" value="<?= $prenomUser; ?>" disabled/>
        </div>
        <div class="control-group">
            <label class="control-label" for="eMailUser"><b>eMail :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="eMailUser" id="eMailUser" size="80" maxlength="80" value="<?= $eMailUser; ?>" disabled/>
        </div>
        <div class="control-group">
            <label for="idStat">Statut:</label>  
            <select id="idStat" name="idStat"  onchange="select()" readonly>
                <option value="<?php echo $idStat;?>"><?php echo $libStat;?></option>
            </select>
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
<?php

require_once __DIR__ . '/footerUser.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>