<?
	// CRUD USER (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class MEMBRE{
		function get_1Membre($idMembre){
            global $db;
            $query = 'SELECT * FROM MEMBRE WHERE numMemb = ?;';
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
		

		function get_NbAllMembreByLikeCom($numMembre){
            global $db;
            $query = 'SELECT * FROM MEMBRE INNER JOIN LIKECOM ON membre.numMemb = likecom.numMemb WHERE membre.numMemb= ?;';
            $result = $db->prepare($query);
            $result->execute([$numMembre]);
            $allNbMembreByLikeC = $result->fetchAll();
			$allNbMembreByLikeCom = 0;
			foreach ( $allNbMembreByLikeC as $row){
				$allNbMembreByLikeCom = $allNbMembreByLikeCom + 1;
			}
            return($allNbMembreByLikeCome);
        }

		function get_NbAllMembreByLikeArt($numMembre){
            global $db;
            $query = 'SELECT * FROM MEMBRE INNER JOIN LIKEART ON membre.numMemb = likeart.numMemb WHERE membre.numMemb= ?;';
            $result = $db->prepare($query);
            $result->execute([$numMembre]);
            $allNbMembreByLikeA = $result->fetchAll();
			$allNbMembreByLikeArt = 0;
			foreach ( $allNbMembreByLikeA as $row){
				$allNbMembreByLikeArt = $allNbMembreByLikeArt + 1;
			}
            return($allNbMembreByLikeArt);

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
					die('Erreur insert Membre : ' . $e->getMessage());
					$db->rollBack();
					$result->closeCursor();
			}
		}
		

		function update($numMembre,$prenomMembre, $nomMembre,$pseudoMembre,$passMembre,$emailMembre,$dtCreaMembre, $souvenirMembre){
			global $db;
			try {
				$db->beginTransaction();
				$requete="UPDATE MEMBRE SET prenomMemb = ?, nomMemb = ?, pseudoMemb = ?, passMemb = ?, eMailMemb = ?, dtCreaMemb = ?, souvenirMemb = ? WHERE numMemb = ?";
				$result = $db->prepare($requete);
				$result->execute(array($prenomMembre, $nomMembre,$pseudoMembre,$passMembre,$emailMembre,$dtCreaMembre, $souvenirMembre, $numMembre));
				$db->commit();
				$result->closeCursor();
	
				}
				catch (PDOException $e) {
						die('Erreur update MEMBRE : ' . $e->getMessage());
						$db->rollBack();
						$result->closeCursor();
				}
			}


		// Ctrl FK sur THEMATIQUE, ANGLE, MOTCLE avec del
		function delete($numMembre){
			global $db;
			try {
				$db->beginTransaction();
				$requete= "DELETE FROM  MEMBRE WHERE numMemb = ?; ";
				$result = $db->prepare($requete);
				$result->execute([$numMembre]);
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
