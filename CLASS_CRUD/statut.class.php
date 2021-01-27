<?php
	// CRUD STATUT (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class STATUT{
		function get_1Statut($idStat){


		}

		function get_AllStatuts(){
			global $db;
			$query = 'SELECT * FROM STATUT;';
			$result = $db->query($query);
			$allstatuts = $result->fetchAll();
			return($allstatuts);

		}

		function create($libStat){

			try {
			  $db->beginTransaction();
			  $requete= 'INSERT INTO STATUT (libStat) VALUES ($libStat);';
			  $result = $db->prepare($requete);
			  $result->execute();




					$db->commit();
					$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert STATUT : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

		function update($idStat, $libStat){

      try {
          $db->beginTransaction();



					$db->commit();
					$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur update STATUT : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

		function delete($idStat){

		try {
			$db->beginTransaction();
			$requete= "DELETE FROM STATUT WHERE idStat = $idStat; ";
			$result = $db->prepare($requete);
			$result->execute();
			$db->commit();
			$request->closeCursor();

			}
			catch (PDOException $e) {
					die('Erreur delete STATUT : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

	}	// End of class
