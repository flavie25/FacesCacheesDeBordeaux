<?php
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : user.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

    // controle des saisies du formulaire

    

    // insertion classe STATUT
    require_once __DIR__ . '/../../CLASS_CRUD/user.class.php';
    global $db;
    $user = new USER;


    $errCIR=0;
    if (isset($_GET['errCIR']) AND !empty($_GET['errCIR'])) {
        $errCIR = ($_GET['errCIR']);
    }  


?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Gestion du User</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <style type="text/css">
        .error {
            padding: 2px;
            border: solid 0px black;
            color: red;
            font-style: italic;
            border-radius: 5px;
        }
    </style>

<link rel="stylesheet" href="../../front/assets/css/normalize.css">
<link rel="stylesheet" href="../css/footer.css">

</head>
<body>
	<h1>BLOGART21 Admin - Gestion du CRUD USER</h1>

	<hr /><br />
	<h2>Nouveau user :&nbsp;<a href="./createUser.php"><i>Créer un user</i></a></h2>
	<br /><hr />
	<h2>Tous les user</h2>

	<table border="3" bgcolor="aliceblue">
    <thead>
        <tr>
            <th>&nbsp;pseudoUser&nbsp;</th>
            <th>&nbsp;passUser&nbsp;</th>
            <th>&nbsp;nomUser&nbsp;</th>
            <th>&nbsp;prenomUser&nbsp;</th>
            <th>&nbsp;eMailUser&nbsp;</th>
            <th>&nbsp;idStat&nbsp;</th>
            <th colspan="2">&nbsp;Action&nbsp;</th>
        </tr>
    </thead>
    <tbody>
<?
    $allUser = $user->get_AllUser();
    foreach($allUser as $row){
	// Appel méthode : tous les statuts en BDD

    // Boucle pour afficher
	//foreach($all as $row) {
?>
        <tr>
		<td><h4>&nbsp; <?php echo $row["pseudoUser"]; ?> &nbsp;</h4></td>
        <td>&nbsp; <?php echo $row["passUser"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["nomUser"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["prenomUser"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["eMailUser"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["idStat"]; ?> &nbsp;</td>

		<td>&nbsp;<a href="./updateUser.php?id=<?=$row["pseudoUser"];?>"><i>Modifier</i></a>&nbsp;
		<br /></td>
		<td>&nbsp;<a href="./deleteUser.php?id=<?=$row["pseudoUser"];?>"><i>Supprimer</i></a>&nbsp;
		<br /></td>
        </tr>
<?
	}	// End of foreach
?>
    </tbody>
    </table>
    <br><br>
<?php
if ($errCIR == 1){
    echo 'Vous ne pouvez pas supprimer le super administrateur';
}
require_once __DIR__ . '/footer.php';
?>
</body>
</html>
