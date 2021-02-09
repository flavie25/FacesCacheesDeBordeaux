<?
	// CRUD USER (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class MOTCLE{
		

		function get_NbAllMotCleByidLangue($id){
            global $db;
            $query = 'SELECT * FROM MOTCLE INNER JOIN LANGUE ON motcle.numLang = langue.numLang WHERE motcle.numLang = ?;';
            $result = $db->prepare($query);
            $result->execute([$id]);
            $allNbMotCleById = $result->fetchAll();
			$allNbMotCleByLangue = 0;
			foreach ($allNbMotCleById as $row){
				$allNbMotCleByLangue = $allNbMotCleByLangue + 1;
			}
            return($allNbMotCleByLangue);
        }

		

	}	// End of class
