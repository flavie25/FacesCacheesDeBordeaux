<?
	// CRUD USER (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class USER{
		function get_1User($pseudoUser, $passUser){


		}

		function get_AllUsers(){


		}

		function get_ExistPseudo($pseudoUser) {


		}

		function get_AllUsersByStat(){


		}


		function get_NbAllUsersByidStat($idStat){
            global $db;
            $query = 'SELECT * FROM USER US INNER JOIN STATUT ST ON US.idStat = ST.idStat WHERE ST.idStat = ?;';
            $result = $db->prepare($query);
            $result->execute([$idStat]);
            $allNbUsersByStat = $result->fetchAll();
            return($allNbUsersByStat);
        }

		function create($pseudoUser, $passUser, $nomUser, $prenomUser, $emailUser, $idStat){
			global $db;
			try {
          $db->beginTransaction();



					$db->commit();
					$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert USER : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

		function update($pseudoUser, $passUser, $nomUser, $prenomUser, $emailUser, $idStat){
			global $db;
      try {
          $db->beginTransaction();



					$db->commit();
					$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur update USER : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

		function delete($pseudoUser, $passUser){
			global $db;
      try {
          $db->beginTransaction();


					$db->commit();
					$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur delete USER : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

	}	// End of class
