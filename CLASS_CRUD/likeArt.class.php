<?php
	// CRUD STATUT (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class LIKEART{
		function get_1LikeArt($numMemb, $numArt){
            global $db;
            $query = 'SELECT * FROM LIKEART INNER JOIN ARTICLE ON likeart.numArt = article.numArt INNER JOIN MEMBRE ON likeart.numMemb = membre.numMemb WHERE likeart.numMemb = ? AND likeart.numArt = ? ;';
            $result = $db->prepare($query);
            $result->execute([$numMemb,$numArt]);
			$likeart = $result->fetch();
            return($likeart);
        }

		function get_AllLikeArt(){
			global $db;
			$query = 'SELECT * FROM LIKEART INNER JOIN ARTICLE ON likeart.numArt = article.numArt INNER JOIN MEMBRE ON likeart.numMemb = membre.numMemb ;';
			$result = $db->query($query);
			$allLikeArt = $result->fetchAll();
			return($allLikeArt);

		}

		function create( $numArt, $numMemb, $likeArt){
			global $db;
			try {
				$db->beginTransaction();
				$requete= "INSERT INTO LIKEART (numArt,numMemb, likeA) VALUES (?,?,?);";
				$result = $db->prepare($requete);
				$result->execute([ $numArt, $numMemb, $likeArt]);

					$db->commit();
					$result->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert LIKEART: ' . $e->getMessage());
					$db->rollBack();
					$result->closeCursor();
			}
		}

		function update( $numArt,$numMemb, $likeArt){
			global $db;
			try {
				$db->beginTransaction();
				$requete="UPDATE LIKEART SET likeA = ? WHERE  numArt = ? AND  numMemb = ? ;";
				$result = $db->prepare($requete);
				$result->execute([$likeArt,$numArt,$numMemb]);
				$db->commit();
				$result->closeCursor();
	
				}
				catch (PDOException $e) {
						die('Erreur update LIKEART : ' . $e->getMessage());
						$db->rollBack();
						$result->closeCursor();
				}
			}

		
	}	// End of class
