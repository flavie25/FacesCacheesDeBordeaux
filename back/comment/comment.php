<?
/////////////////////////////////////////////////////
//
//  CRUD COMMENT (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : comment.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

require_once __DIR__ . '/../../CLASS_CRUD/comment.class.php';
global $db;
$comment = new COMMENT;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Commentaire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Commentaire</h1>

    <h2>Tous les commentaires</h2>
    <hr /><br />
    <h2>Nouveau commentaire:&nbsp;<a href="./createComment.php"><i>Créer un commentaire</i></a></h2>
    <br /><hr />
    <h2>Tous les commentaires</h2>

    <br><br>

    <table border="3" bgcolor="aliceblue">
    <thead>
        <tr>
            <th>&nbsp;NumSeqCom&nbsp;</th>
            <th>&nbsp;NumArticle&nbsp;</th>
            <th>&nbsp;DtCreCom&nbsp;</th>
            <th>&nbsp;LibCom&nbsp;</th>
            <th>&nbsp;AttModOK&nbsp;</th>
            <th>&nbsp;AffComOK&nbsp;</th>
            <th>&nbsp;NotifComKOAff&nbsp;</th>
            <th colspan="2">&nbsp;Action&nbsp;</th>
        </tr>
    </thead>
    <tbody>
    <?
    $allComment = $comment->get_AllComment();
    foreach($allComment as $row){
    // Appel méthode : tous les commentaires en BDD

    // Boucle pour afficher
    //foreach($all as $row) {
    ?>
        <tr>
        <td><h4>&nbsp; <?php echo $row["numSeqCom"]; ?> &nbsp;</h4></td>
        <td>&nbsp; <?php echo $row["numArt"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["dtCreCom"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["libCom"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["attModOK"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["affComOK"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["notifComKOAff"]; ?> &nbsp;</td>
        <?
            $numSeqCom = $row["numSeqCom"];
            $numArt = $row["numArt"];
        ?>
        <td>&nbsp;<a href="./updateComment.php?id=<?=$numSeqCom."&id2=".$numArt;?>"><i>Valider</i></a>&nbsp;
        <br /></td>
        <td>&nbsp;<a href="./deleteComment.php?id=<?=$numSeqCom."&id2=".$numArt;?>"><i>Supprimer</i></a>&nbsp;
        <br /></td>
        </tr>
    <?
    }	// End of foreach
    ?>
    </tbody>
    </table>

    <br><br>

    <?
    require_once __DIR__ . '/footerComment.php';
    require_once __DIR__ . '/footer.php';
    ?>
</body>
</html>
