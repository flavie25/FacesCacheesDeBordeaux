<?php
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : createUser.php  (ETUD)   -   BLOGART21
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

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Initialiser")) {

            header("Location: ./createUser.php");
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création
        if (((isset($_POST['pseudoUser'])) AND !empty($_POST['pseudoUser']))
            AND (!empty($_POST['Submit']) AND ($Submit === "Valider"))
            AND (isset($_POST['passUser1'])) AND !empty($_POST['passUser1'])
            AND (isset($_POST['passUser2'])) AND !empty($_POST['passUser2'])
            AND (isset($_POST['nomUser'])) AND !empty($_POST['nomUser'])
            AND (isset($_POST['prenomUser'])) AND !empty($_POST['prenomUser'])
            AND (isset($_POST['eMailUser1'])) AND !empty($_POST['eMailUser1'])
            AND (isset($_POST['eMailUser2'])) AND !empty($_POST['eMailUser2'])) {
            // Saisies valides
            $erreur = false;

            $pseudoUser = ctrlSaisies($_POST['pseudoUser']);
            $passUser1 = ctrlSaisies($_POST['passUser1']);
            $passUser2 = ctrlSaisies($_POST['passUser2']);
            $nomUser = ctrlSaisies($_POST['nomUser']);
            $prenomUser = ctrlSaisies($_POST['prenomUser']);
            $eMailUser1 = ctrlSaisies($_POST['eMailUser1']);
            $eMailUser2 = ctrlSaisies($_POST['eMailUser2']);
            echo  $pseudoUser." ".$passUser1." ".$passUser2." ".$nomUser." ".$prenomUser." ".$eMailUser1." ".$eMailUser2;

            if (filter_var($eMailUser1, FILTER_VALIDATE_EMAIL) AND filter_var($eMailUser2, FILTER_VALIDATE_EMAIL)) {
                if ($eMailUser1 == $eMailUser2) {
                    $eMailOk = 1;
                }
                else{
                    $eMailOk = 0;
                    echo "Les adresses mails entrées ne correspondent pas."
                }
            }
            else {

                echo "L'adresse mail entrée n'est pas valide";
            }
            


            if($passUser1 == $passUser2){
                $passwordOk = 1;
            }
            else{
                $passwordOk = 0;
                echo "Le mot de passe et la confirmation de mot de passe ne sont pas identiques";
            }

            if($pseudoUser !="" AND $nomUser!="" AND $prenomUser!="")
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
    <h2>Ajout d'un user</h2>

    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire User...</legend>

        <!--<input type="hidden" id="id" name="id" value=": /*$_GET['id']; */-->

        <div class="control-group">
            <label class="control-label" for="pseudoUser"><b>Pseudo :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="pseudoUser" id="pseudoUser" size="80" maxlength="80" value="<?= $pseudoUser; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="passUser1"><b>Mot de passe :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="password" name="passUser1" id="passUser1" size="80" maxlength="80" value="<?= $passUser1; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="passUser2"><b>Confirmation mot de passe :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="password" name="passUser2" id="passUser2" size="80" maxlength="80" value="<?= $passUser2; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="nomUser"><b>Nom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="nomUser" id="nomUser" size="80" maxlength="80" value="<?= $nomUser; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="prenomUser"><b>Prénom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="prenomUser" id="prenomUser" size="80" maxlength="80" value="<?= $prenomUser; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="eMailUser1"><b>eMail :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="eMailUser1" id="eMailUser1" size="80" maxlength="80" value="<?= $eMailUser1; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="eMailUser2"><b>Confirmation eMail :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="eMailUser2" id="eMailUser2" size="80" maxlength="80" value="<?= $eMailUser2; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label for="idStat">Statut:</label>  
            <select id="numLang" name="numLang"  onchange="select()">
                <?php 
                global $db;
                $requete = 'SELECT idStat, libStat FROM STATUT ;';
                $result = $db->query($requete);
                $allStatut = $result->fetchAll();
                foreach ($allStatut AS $statut)
                {
                ?>
                <option value="<?php echo $statut['idStat'];?>"><?php echo $statut['libStat'];?></option>
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
require_once __DIR__ . '/footerUser.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
