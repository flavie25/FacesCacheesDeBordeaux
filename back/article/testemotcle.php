<?
global $db;
$requete = 'SELECT * FROM MOTCLEARTICLE WHERE numArt = ?;';
$result = $db->prepare($requete);
$result->execute([$numArt]);
$motCleArticle = $result->fetchAll();
$nbMotCleSelec = $result->rowCount();

$requete1 = 'SELECT * FROM MOTCLE WHERE numLang = ?;';
$result1 = $db->prepare($requete1);
$result1->execute([$numLang]);
$motCle = $result1->fetchAll();
$nbMotCle = $result1->rowCount();

$i = 0;
$j = 0;
while($i<$nbMotCle){
    $bool = 1;
    while ($i<$nbMotCleSelec OR $bool){
        $numMotCle = $motCle[$i][0];
        $libMotCle = $motCle[$i][1];
        if($motCleArticle[$j][0] == $motCle[$i][0]){     
        ?>
            <option value="<?= $numMotCle ?>"  selected="selected" >
                <?= $libMotCle ?>
            </option>
        <?
        $bool=0;    
        }
        else{
        ?>
            <option value="<?= $numMotCle ?>"  >
                <?= $libMotCle ?>
            </option>
        <?
        }
        $j = $j + 1 ;
    }

    $i = $i + 1 ;
}