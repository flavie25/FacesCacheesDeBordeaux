<?php
	// CRUD STATUT (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class ARTICLE{
		function get_1Article($numArt){
            global $db;
            $requete = 'SELECT * FROM ARTICLE WHERE numArt = ?;';
            $result = $db->prepare($requete);
            $result->execute([$numArtt]);
            return($result->fetch());
        }

		function get_AllArticle(){
			global $db;
			$requete = 'SELECT * FROM ARTICLE;';
			$result = $db->query($requete);
			$allArticle = $result->fetchAll();
			return($allArticle);

		}

		function create($dtCreArt, $libTitrArt, $libChapoArt, $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art, $libSsTitr2Art, $parag3Art, $libConclArt, $numAngl, $numThem){
			global $db;
			try {
			  $db->beginTransaction();
			  $requete= 'INSERT INTO ARTICLE (dtCreArt, libTitrArt, libChapoArt, libAccrochArt, parag1Art, libSsTitr1Art, parag2Art, libSsTitr2Art, parag3Art, libConclArt, numAngl, numThem) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);';
			  $result = $db->prepare($requete);
			  $result->execute([$dtCreArt, $libTitrArt, $libChapoArt, $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art, $libSsTitr2Art, $parag3Art, $libConclArt, $numAngl, $numThem]);
              $dernier_id = $db->lastInsertId();
              return($dernier_id);
					$db->commit();
					$result->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert Article : ' . $e->getMessage());
					$db->rollBack();
					$result->closeCursor();
			}
		}

		function update($idStat, $libStat){
			global $db;

			try {
				$db->beginTransaction();
				$requete="UPDATE STATUT SET libStat = ? WHERE idStat = ? ";
				$result = $db->prepare($requete);
				$result->execute(array($libStat, $idStat));
               
				$db->commit();
				$result->closeCursor();
	
				}
				catch (PDOException $e) {
						die('Erreur delete STATUT : ' . $e->getMessage());
						$db->rollBack();
						$result->closeCursor();
				}
			}

		function delete($idStat){
		global $db;

		try {
			$db->beginTransaction();
			$requete= "DELETE FROM STATUT WHERE idStat = ?; ";
			$result = $db->prepare($requete);
			$result->execute([$idStat]);
			$db->commit();
			$result->closeCursor();

			}
			catch (PDOException $e) {
					die('Erreur delete STATUT : ' . $e->getMessage());
					$db->rollBack();
					$result->closeCursor();
			}
		}

	}	// End of class
