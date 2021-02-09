<?
/////////////////////////////////////////////////////
//
//  CRUD MOTCLE (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : motCle.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

require_once __DIR__ . '/../../CLASS_CRUD/motCle.class.php';
global $db;
$monMotCle = new MOTCLE;

$errCIR=0;
    if (isset($_GET['errCIR']) AND !empty($_GET['errCIR'])) {
        $errCIR = ($_GET['errCIR']);
    } 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Mot-Clé</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Mot Clé</h1>

    <h2>Tous les Mots Clés</h2>
    <hr /><br />
    <h2>Nouveau mot clé :&nbsp;<a href="./createMotCle.php"><i>Créer un mot clé</i></a></h2>
    <br /><hr />
    <h2>Tous les mots clés</h2>

    <br><br>

    <table border="3" bgcolor="aliceblue">
    <thead>
        <tr>
            <th>&nbsp;Id&nbsp;</th>
            <th>&nbsp;Mot clé&nbsp;</th>
            <th>&nbsp;NumLang&nbsp;</th>
            <th colspan="2">&nbsp;Action&nbsp;</th>
        </tr>
    </thead>
    <tbody>
    <?
    $allMotCle = $monMotCle->get_AllMotCleByLangue();
    foreach($allMotCle as $row){
    // Appel méthode : toutes les langues en BDD

    // Boucle pour afficher
    //foreach($all as $row) {
    ?>
        <tr>
        <td><h4>&nbsp; <?php echo $row["numMotCle"]; ?> &nbsp;</h4></td>
        <td>&nbsp; <?php echo $row["libMotCle"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["numLang"]; ?> &nbsp;</td>

        <td>&nbsp;<a href="./updateMotCle.php?id=<?=$row["numMotCle"];?>"><i>Modifier</i></a>&nbsp;
        <br /></td>
        <td>&nbsp;<a href="./deleteMotCle.php?id=<?=$row["numMotCle"];?>"><i>Supprimer</i></a>&nbsp;
        <br /></td>
        </tr>
    <?
    }	// End of foreach
    ?>
    </tbody>
    </table>

    <br><br>

    <?
    if ($errCIR == 1){
    echo 'Vous ne pouvez pas supprimer cet utilisateur. Veuillez d\'abord supprimer cet utilisateur dans les autres tables';
    } 
    require_once __DIR__ . '/footer.php';
    ?>
</body>
</html>