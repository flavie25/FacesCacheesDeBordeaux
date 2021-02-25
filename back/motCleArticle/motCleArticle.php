<?
/////////////////////////////////////////////////////
//
//  CRUD MOTCLEARTICLE (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : motCleArticle.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

require_once __DIR__ . '/../../CLASS_CRUD/motCleArticle.class.php';
global $db;
$monMotCleArticle = new MOTCLEARTICLE;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Mots-Clés / Article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="stylesheet" href="../../front/assets/css/normalize.css">
    <link rel="stylesheet" href="../css/footer.css">

</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Mots-Clés / Article</h1>

    <h2>Tous les Mots Clés / Article</h2>
    <hr /><br />
    <h2>Nouvelle jointure mot clé / article :&nbsp;<a href="./createMotCleArticle.php"><i>Créer une jointure mot clé / article</i></a></h2>
    <br /><hr />
    <h2>Toutes les jointures mots clés / articles</h2>

    <br><br>

    <table border="3" bgcolor="aliceblue">
    <thead>
        <tr>
            <th>&nbsp;NumArt&nbsp;</th>
            <th>&nbsp;NumMotCle&nbsp;</th>
            <th>&nbsp;Action&nbsp;</th>
        </tr>
    </thead>
    <tbody>
    <?
    $allMotCleArticle = $monMotCleArticle->get_AllMotCleArticle();
    foreach($allMotCleArticle as $row){
    // Appel méthode : toutes les langues en BDD

    // Boucle pour afficher
    //foreach($all as $row) {
    ?>
        <tr>
        <td><h4>&nbsp; <?php echo $row["numArt"]; ?> &nbsp;</h4></td>
        <td>&nbsp; <?php echo $row["numMotCle"]; ?> &nbsp;</td>

        <td>&nbsp;<a href="./deleteMotCleArticle.php?id=<?=$row["numMotCle"];?>"><i>Supprimer</i></a>&nbsp;
        <br /></td>
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