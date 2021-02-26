<?
/////////////////////////////////////////////////////
//
//  CRUD LIKEART (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : likeArt.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

    // insertion classe STATUT
    require_once __DIR__ . '/../../CLASS_CRUD/likeArt.class.php';
    global $db;
    $likeArt = new LIKEART;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Like sur Article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Like sur Artcile</h1>

    <hr /><br />
	<h2>Nouveau like sur article :&nbsp;<a href="./createLikeArt.php"><i>Liker un article</i></a></h2>
	<br /><hr />
	<h2>Tous les likes</h2>

	<table border="3" bgcolor="aliceblue">
    <thead>
        <tr>
            <th>&nbsp;Membre&nbsp;</th>
            <th>&nbsp;Article&nbsp;</th>
            <th>&nbsp;Like&nbsp;</th>
            <th colspan="2">&nbsp;Action&nbsp;</th>
        </tr>
    </thead>
    <tbody>
<?
    $allLikeArt = $likeArt->get_AllLikeArt();
    foreach($allLikeArt as $row){
	// Appel méthode : tous les statuts en BDD

    // Boucle pour afficher
	//foreach($all as $row) {
?>
        <tr>
		<td><h4>&nbsp; <?php echo $row["pseudoMemb"]; ?> &nbsp;</h4></td>
        <td>&nbsp; <?php echo $row["libTitrArt"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["likeA"]; ?> &nbsp;</td>

		<td>&nbsp;<a href="./updateLikeArt.php?id1=<?=$row["numMemb"];?>&id2=<?=$row["numArt"];?>"><i>Modifier</i></a>&nbsp;
		<br/></td>
        </tr>
<?
	}	// End of foreach
?>
    </tbody>
    </table>
    <br><br>

<?
require_once __DIR__ . '/footer.php';
?>
</body>
</html>
