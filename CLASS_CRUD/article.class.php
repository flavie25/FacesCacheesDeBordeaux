<?php
	// CRUD STATUT (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class ARTICLE{
		function get_1ArticleByThemAngl($numArt){
            global $db;
            $requete = 'SELECT * FROM ARTICLE INNER JOIN THEMATIQUE ON article.numThem = thematique.numThem INNER JOIN ANGLE  ON article.numAngl = angle.numAngl WHERE numArt = ?;';
            $result = $db->prepare($requete);
            $result->execute([$numArt]);
            return($result->fetch());
        }

		function get_AllArticle(){
			global $db;
			$requete = 'SELECT * FROM ARTICLE;';
			$result = $db->query($requete);
			$allArticle = $result->fetchAll();
			return($allArticle);

		}

		function create($dtCreArt, $libTitrArt, $libChapoArt, $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art, $libSsTitr2Art, $parag3Art, $libConclArt, $urlPhotArt, $numAngl, $numThem){
			global $db;
			try {
			  $db->beginTransaction();
			  $requete= 'INSERT INTO ARTICLE (dtCreArt, libTitrArt, libChapoArt, libAccrochArt, parag1Art, libSsTitr1Art, parag2Art, libSsTitr2Art, parag3Art, libConclArt, urlPhotArt, numAngl, numThem) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);';
			  $result = $db->prepare($requete);
			  $result->execute([$dtCreArt, $libTitrArt, $libChapoArt, $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art, $libSsTitr2Art, $parag3Art, $libConclArt, $urlPhotArt, $numAngl, $numThem]);
              //$dernier_id = $db->lastInsertId();
              //return($dernier_id);
					$db->commit();
					$result->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert Article : ' . $e->getMessage());
					$db->rollBack();
					$result->closeCursor();
			}
		}

		function update($numArt, $libTitrArt, $libChapoArt, $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art, $libSsTitr2Art, $parag3Art, $libConclArt, $urlPhotArt, $numAngl, $numThem){
			global $db;
			try {
				$db->beginTransaction();
				if ( $urlPhotArt != -1){
				$requete="UPDATE ARTICLE SET libTitrArt = ?, libChapoArt = ?, libAccrochArt = ?, parag1Art = ?, libSsTitr1Art = ?, parag2Art = ?, libSsTitr2Art = ?, parag3Art = ?, libConclArt = ?, urlPhotArt = ?, numAngl = ?, numThem = ? WHERE numArt = ? ;";
				$result = $db->prepare($requete);
				$result->execute([$libTitrArt, $libChapoArt, $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art, $libSsTitr2Art, $parag3Art, $libConclArt, $urlPhotArt, $numAngl, $numThem, $numArt]);
				}
				else{
					$requete="UPDATE ARTICLE SET libTitrArt = ?, libChapoArt = ?, libAccrochArt = ?, parag1Art = ?, libSsTitr1Art = ?, parag2Art = ?, libSsTitr2Art = ?, parag3Art = ?, libConclArt = ?, numAngl = ?, numThem = ? WHERE numArt = ? ;";
					$result = $db->prepare($requete);
					$result->execute([$libTitrArt, $libChapoArt, $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art, $libSsTitr2Art, $parag3Art, $libConclArt, $numAngl, $numThem, $numArt]);
				}
				$db->commit();
				$result->closeCursor();
	
				}
				catch (PDOException $e) {
						die('Erreur update ARTICLE : ' . $e->getMessage());
						$db->rollBack();
						$result->closeCursor();
				}
		}

		
		function delete($numArt){
		global $db;

		try {
			$db->beginTransaction();
			$requete= "DELETE FROM ARTICLE WHERE numArt = ?; ";
			$result = $db->prepare($requete);
			$result->execute([$numArt]);
			$db->commit();
			$result->closeCursor();

			}
			catch (PDOException $e) {
					die('Erreur delete Article : ' . $e->getMessage());
					$db->rollBack();
					$result->closeCursor();
			}
		}

	}	// End of class
