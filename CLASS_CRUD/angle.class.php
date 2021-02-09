<?
	// CRUD USER (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class ANGLE{
		
		function get_NbAllAngleByidLangue($id){
            global $db;
            $query = 'SELECT * FROM ANGLE INNER JOIN LANGUE ON angle.numLang = langue.numLang WHERE angle.numLang = ?;';
            $result = $db->prepare($query);
            $result->execute([$id]);
            $allNbAngleById = $result->fetchAll();
			$allNbAngleByLangue = 0;
			foreach ( $allNbAngleById as $row){
				$allNbAngleByLangue = $allNbAngleByLangue + 1;
			}
            return($allNbAngleByLangue);
        }

		

	}	// End of class
