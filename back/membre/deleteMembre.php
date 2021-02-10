<?php
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : deleteMembre.php  (ETUD)   -   BLOGART21
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
        if ((isset($_POST['id']) AND $_POST['id'] > 0)
        AND(!empty($_POST['Submit'])) AND ($Submit === "Valider"))
        {

            $erreur = false;
            $numMembre = ctrlSaisies($_POST['id']);
            $nbMembreByLikeCom = $membre->get_NbAllMembreByLikeCom($numMembre);
            
            
            $nbMembreByLikeArt = $membre->get_NbAllMembreByLikeArt($numMembre);

            if (($nbMembreByLikeCom <1) AND ($nbMembreByLikeArt<1)){
                $membre->delete($numMembre);
                header("Location: ./membre.php");
            }
            else{
                $errCIR = 1;
                header("Location: ./membre.php?errCIR=".$errCIR);
            }     
        }

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
    <h2>Suppression d'un membre</h2>
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
    <form method="post" action="./deleteMembre.php" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire Membre...</legend>

        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />

        <div class="control-group">
            <label class="control-label" for="prenomMemb"><b>Prénom&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="prenomMemb" id="prenomMemb" size="80" maxlength="80" value="<?= $prenomMembre; ?>" disabled/>
        </div>
        <div class="control-group">
            <label class="control-label" for="nomMemb"><b>Nom&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="nomMemb" id="nomMemb" size="80" maxlength="80" value="<?= $nomMembre; ?>" disabled/>
        </div>
        <div class="control-group">
            <label class="control-label" for="pseudoMemb"><b>Pseudo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="pseudoMemb" id="pseudoMemb" size="80" maxlength="80" value="<?= $pseudoMembre; ?>" disabled/>
        </div>
        <div class="control-group">
            <label class="control-label" for="passMemb"><b>Mot de passe&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="password" name="passMemb" id="passMemb" size="80" maxlength="80" value="<?= $passMembre; ?>" disabled/>
        </div>
        <div class="control-group">
            <label class="control-label" for="eMailMemb"><b>e-Mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="eMailMemb" id="eMailMemb" size="80" maxlength="80" value="<?= $emailMembre; ?>" disabled/>
        </div>
    
        <div class="control-group">
            <label class="control-label" for="souvenirMemb"><b>Se souvenir de moi :</b></label>
            <div class="controls">
                <fieldset>
                    <input type="radio" name="souvenirMemb"
                    <? if ($souvenirMembre == 1) echo 'checked="checked" ';?>
                    value = 'on' disabled/>
                    &nbsp;&nbsp;Oui&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    <input type="radio" name="souvenirMemb"
                    <? if ($souvenirMembre == 0) echo 'checked="checked" ';?>
                    value = 'off' disabled/>
                    &nbsp;&nbsp;Non&nbsp;&nbsp;&nbsp;&nbsp;
                
                </fieldset>
            </div>
        </div>
      
        <div class="control-group">
            <label class="control-label" for="accordMemb"><b>J'accepte que mes données soient conservées :</b></label>
            <div class="controls">
               <fieldset>
               <input type="radio" name="accordMembe"
                    <?if ($accordMembre == 1) echo 'checked="checked" ';?>
                    value = 'on' disabled/>
                    &nbsp;&nbsp;Oui&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    <input type="radio" name="accordMemb"
                    <?if ($accordMembre == 0) echo 'checked="checked" ';?> 
                    value = 'off' disabled/>
                    &nbsp;&nbsp;Non&nbsp;&nbsp;&nbsp;&nbsp;
                
               </fieldset>
            </div>
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
