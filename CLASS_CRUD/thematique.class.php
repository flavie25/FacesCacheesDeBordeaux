<?
	// CRUD USER (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class THEMATIQUE{
		
		function get_NbAllThematiqueByidLangue($id){
            global $db;
            $query = 'SELECT * FROM THEMATIQUE INNER JOIN LANGUE ON thematique.numLang = langue.numLang WHERE thematique.numLang = ?;';
            $result = $db->prepare($query);
            $result->execute([$id]);
            $allNbThematiqueById = $result->fetchAll();
			$allNbThematiqueByLangue = 0;
			foreach ($allNbThematiqueById as $row){
				$allNbThematiqueByLangue = $allNbThematiqueByLangue + 1;
			}
            return($allNbThematiqueByLangue);
        }

		

	}	// End of class
