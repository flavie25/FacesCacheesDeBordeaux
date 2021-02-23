<?
/////////////////////////////////////////////////////
//
//  CRUD ARTICLE (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : article.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../util/dateChangeFormat.php';

    // insertion classe STATUT
    require_once __DIR__ . '/../../CLASS_CRUD/article.class.php';
    global $db;
    $monArticle = new ARTICLE;


    $errCIR=0;
    if (isset($_GET['errCIR']) AND !empty($_GET['errCIR'])) {
        $errCIR = ($_GET['errCIR']);
    }  



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Article</h1>

    <hr /><br />
	<h2>Nouveau statut :&nbsp;<a href="./createArticle.php"><i>Créer un article</i></a></h2>
	<br /><hr />
	<h2>Tous les statuts</h2>

	<table border="3" bgcolor="aliceblue">
    <thead>
        <tr>
            <th>&nbsp;Numéro Article&nbsp;</th>
            <th>&nbsp;Date de création&nbsp;</th>
            <th>&nbsp;Titre&nbsp;</th>
            <th>&nbsp;Chapô&nbsp;</th>
            <th>&nbsp;Accroche&nbsp;</th>
            <th>&nbsp;Paragraphe1&nbsp;</th>
            <th>&nbsp;Sous-titre1&nbsp;</th>
            <th>&nbsp;Paragraphe2&nbsp;</th>
            <th>&nbsp;Sous-titre2&nbsp;</th>
            <th>&nbsp;Paragraphe3&nbsp;</th>
            <th>&nbsp;Conclusion&nbsp;</th>
            <th>&nbsp;URL Photo&nbsp;</th>
            <th>&nbsp;Angle&nbsp;</th>
            <th>&nbsp;Thème&nbsp;</th>
            <th colspan="2">&nbsp;Action&nbsp;</th>
        </tr>
    </thead>
    <tbody>
<?
    $allArticle = $monArticle->get_AllArticle();
    foreach($allArticle as $row){
        $dateIn = $row["dtCreArt"];
        $from='Y-m-d H:i:s';
        $to = 'd-m-Y H:i:s';
        $dateOut = dateChangeFormat($dateIn, $from, $to);
	// Appel méthode : tous les statuts en BDD

    // Boucle pour afficher
	//foreach($all as $row) {
?>
        <tr>
		<td><h4>&nbsp; <?php echo $row["numArt"]; ?> &nbsp;</h4></td>

        <td>&nbsp; <?php echo $dateOut; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["libTitrArt"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["libChapoArt"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["libAccrochArt"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["parag1Art"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["libSsTitr1Art"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["parag2Art"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["libSsTitr2Art"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["parag3Art"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["libConclArt"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["urlPhotArt"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["numAngl"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["numThem"]; ?> &nbsp;</td>
        

		<td>&nbsp;<a href="./updateArticle.php?id=<?=$row["numArt"];?>"><i>Modifier</i></a>&nbsp;
		<br /></td>
		<td>&nbsp;<a href="./deleteArticle.php?id=<?=$row["numArt"];?>"><i>Supprimer</i></a>&nbsp;
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
