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

    <link rel="stylesheet" href="../../front/assets/css/normalize.css">
    <link rel="stylesheet" href="../css/gestionCRUD.css" >
  

</head>
<body>
<div class="hautpage">
    <div class="Titre">
        <h1>BLOGART21 Admin - Gestion du CRUD Commentaire</h1>

        <h2>Tous les commentaires</h2>

    </div>

    <div class="creerBt">
        <button class="button" onclick="location.href='./createComment.php'">
            Créer un commentaire
        </button>
    </div>
</div>


<div class="tableau">
        <table>
        
    <div class="entete"> 
        <thead>
            <tr>
                <th>NumSeqCom</th>
                <th>NumArticle</th>
                <th>DtCreCom</th>
                <th>LibCom</th>
                <th>AttModOK</th>
                <th>AffComOK</th>
                <th>NotifComKOAff</th>
                <th>delLogiq</th>
                <th>numMemb</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
    </div>   

    <div class="body">
        <tbody>
            <?
            $allComment = $comment->get_AllComment();
            foreach($allComment as $row){
            // Appel méthode : tous les commentaires en BDD

            // Boucle pour afficher
            //foreach($all as $row) {
            ?>
                <tr>
                <td><h4> <?php echo $row["numSeqCom"]; ?> </h4></td>
                <td> <?php echo $row["numArt"]; ?> </td>
                <td> <?php echo $row["dtCreCom"]; ?> </td>
                <td> <?php echo $row["libCom"]; ?> </td>
                <td> <?php echo $row["attModOK"]; ?> </td>
                <td> <?php echo $row["affComOK"]; ?> </td>
                <td> <?php echo $row["notifComKOAff"]; ?> </td>
                <td> <?php echo $row["delLogiq"]; ?> </td>
                <td> <?php echo $row["numMemb"]; ?> </td>
                <?
                    $numSeqCom = $row["numSeqCom"];
                    $numArt = $row["numArt"];
                ?>
            <div class="supValBt">
                <td><button class="button" onclick="location.href='./updateComment.php?id=<?=$numSeqCom."&id2=".$numArt;?>'">Valider
                </button><br/></td>
            
                <td><button class="button"onclick="location.href='./deleteComment.php?id=<?=$numSeqCom."&id2=".$numArt;?>'">Supprimer
                </button><br/></td>
                </tr>
            </div> 
            <?
            }// End of foreach
            ?>
        </tbody>
    </div>

    </table>
</div>


    <?
    require_once __DIR__ . '/footerComment.php';
    require_once __DIR__ . '/footer.php';
    ?>
</body>
</html>
