<?
	// CRUD USER (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class MEMBRE{
		function get_1Membre($idMembre){
            global $db;
            $query = 'SELECT * FROM Membre WHERE numMembre = ?;';
            $result = $db->prepare($query);
            $result->execute([$idMembre]);
            return($result->fetch());
        }
		function get_AllMembre(){
			global $db;
            $requete = 'SELECT * FROM MEMBRE ;';
            $result = $db->prepare($requete);
            $result->execute();
            return($result->fetchAll());
		}
		
		function get_NbAllMotCleByidLangue($id){
            global $db;
            $query = 'SELECT * FROM MOTCLE INNER JOIN LANGUE ON motcle.numLang = langue.numLang WHERE motcle.numLang= ?;';
            $result = $db->prepare($query);
            $result->execute([$id]);
            $allNbMotCleByLangue = $result->fetchAll();
			$allNbMotCleByAllLangue = 0;
			foreach ( $allNbMotCleByLangue  as $row){
				$allNbMotCleByAllLangue = $allNbMotCleByAllLangue + 1;
			}
            return($allNbMotCleByAllLangue);
        }

		function get_NbAllMotCleByMotCleArticle($id){
            global $db;
            $query = 'SELECT * FROM MOTCLE INNER JOIN MOTCLEARTICLE ON motcle.numMotCle = motclearticle.numMotCle WHERE motcle.numMotCle= ?;';
            $result = $db->prepare($query);
            $result->execute([$id]);
            $allNbMotCleByArticle = $result->fetchAll();
			$allNbMotCleByCleArticle = 0;
			foreach ( $allNbMotCleByArticle as $row){
				$allNbMotCleByCleArticle = $allNbMotCleByCleArticle + 1;
			}
            return($allNbMotCleByCleArticle);
        }
		
		function create($prenomMembre, $nomMembre,$pseudoMembre,$passMembre,$emailMembre,$dtCreaMembre,$souvenirMembre,$accordMembre){
			global $db;
			try {
			  $db->beginTransaction();
			  $requete= 'INSERT INTO MEMBRE (prenomMemb, nomMemb,pseudoMemb,passMemb,eMailMemb,dtCreaMemb,souvenirMemb,accordMemb) VALUES (?,?,?,?,?,?,?,?);';
			  $result = $db->prepare($requete);
			  $result->execute(array($prenomMembre, $nomMembre,$pseudoMembre,$passMembre,$emailMembre,$dtCreaMembre,$souvenirMembre,$accordMembre));

					$db->commit();
					$result->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert STATUT : ' . $e->getMessage());
					$db->rollBack();
					$result->closeCursor();
			}
		}
		

		function update($numMotCle, $libMotCle, $numLang){
			global $db;
			try {
				$db->beginTransaction();
				$requete="UPDATE MOTCLE SET libMotCle = ?, numLang = ? WHERE numMotCle = ?";
				$result = $db->prepare($requete);
				$result->execute(array($libMotCle, $numLang, $numMotCle));
				$db->commit();
				$result->closeCursor();
	
				}
				catch (PDOException $e) {
						die('Erreur delete STATUT : ' . $e->getMessage());
						$db->rollBack();
						$result->closeCursor();
				}
			}


		// Ctrl FK sur THEMATIQUE, ANGLE, MOTCLE avec del
		function delete($numMotCle){
			global $db;
			try {
				$db->beginTransaction();
				$requete= "DELETE FROM  MOTCLE WHERE numMotCle = ?; ";
				$result = $db->prepare($requete);
				$result->execute([$numMotCle]);
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
