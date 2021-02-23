<?
// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

require_once __DIR__ . '/../../CONNECT/database.php';

	echo "<ul id=\"motCle\" >";
	$langue2 = $_REQUEST["langue"];

    if (isset($langue2)) {
        global $db;
        $requete = "SELECT * FROM MOTCLE WHERE numLang = ?;";
        $result = $db->prepare($requete);
        $result -> execute([$langue2]);
        $allMotCle = $result->fetchAll();
        foreach($allMotCle as $motCle){
            echo "<li draggable="true" ondragstart="drag(event)" id=".$motCle['numMotCle'].">".$motCle['libMotCle']."</li>";
        }
    echo "</ul>";

    
    