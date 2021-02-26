<?
/////////////////////////////////////////////////////
//
//  CRUD THEMATIQUE (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : thematique.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

    // insertion classe STATUT
    require_once __DIR__ . '/../../CLASS_CRUD/thematique.class.php';
    global $db;
    $maThematique = new THEMATIQUE;


    $errCIR=0;
    if (isset($_GET['errCIR']) AND !empty($_GET['errCIR'])) {
        $errCIR = ($_GET['errCIR']);
    }  

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Thématique</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="stylesheet" href="../../front/assets/css/normalize.css">
    <link rel="stylesheet" href="../css/footer.css">

</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Thématique</h1>

    <hr /><br />
	<h2>Nouvelle thématique :&nbsp;<a href="./createThem.php"><i>Créer une thématique</i></a></h2>
	<br /><hr />
	<h2>Toutes les thématiques</h2>

    <table border="3" bgcolor="aliceblue">
    <thead>
        <tr>
            <th>&nbsp;numThem&nbsp;</th>
            <th>&nbsp;libThem&nbsp;</th>
            <th>&nbsp;numLang&nbsp;</th>
            <th colspan="2">&nbsp;Action&nbsp;</th>
        </tr>
    </thead>
    <tbody>
<?
    $allThem = $maThematique->get_AllThem();
    foreach($allThem as $row){
	// Appel méthode : tous les statuts en BDD

    // Boucle pour afficher
	//foreach($all as $row) {
?>
        <tr>
		<td><h4>&nbsp; <?php echo $row["numThem"]; ?> &nbsp;</h4></td>

        <td>&nbsp; <?php echo $row["libThem"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["numLang"]; ?> &nbsp;</td>

		<td>&nbsp;<a href="./updateThem.php?id=<?=$row["numThem"];?>"><i>Modifier</i></a>&nbsp;
		<br /></td>
		<td>&nbsp;<a href="./deleteThem.php?id=<?=$row["numThem"];?>"><i>Supprimer</i></a>&nbsp;
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
    echo 'Vous ne pouvez pas supprimer cet utilisateur. Veuillez d\'abord supprimer cet utilisateur dans les autres tables';
}
require_once __DIR__ . '/footer.php';
?>
</body>
</html>

