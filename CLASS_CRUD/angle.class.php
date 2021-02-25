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

		function get_AllAngle(){
            global $db;
            $query = 'SELECT * FROM ANGLE ;';
            $result = $db->prepare($query);
            $result->execute();
            return($result->fetchAll());
			
        }
        function get_1AngleByLangue($numAngl){
            global $db;
            $query = 'SELECT * FROM ANGLE INNER JOIN LANGUE ON angle.numLang = langue.numLang WHERE angle.numAngl = ? ;';
            $result = $db->prepare($query);
            $result->execute([$numAngl]);
            return($result->fetch());
			
        }

        function get_AllAngleByLangue(){
            global $db;
            $query = 'SELECT numAngl, libAngl, lib1Lang FROM ANGLE INNER JOIN LANGUE ON angle.numLang = langue.numLang ORDER BY numAngl ASC;';
            $result = $db->prepare($query);
            $result->execute();
            return($result->fetchAll());
			
        }

		function create($numAngl, $libAngl, $numLang){ 
            global $db;
            try {
				$db->beginTransaction();
                $query = 'INSERT INTO ANGLE (numAngl, libAngl, numLang) VALUES (?, ?, ?);';
                $result = $db->prepare($query);
                $result->execute([$numAngl, $libAngl, $numLang]);
				$db->commit();
				$result->closeCursor();
	
				}
				catch (PDOException $e) {
						die('Erreur insert Angle : ' . $e->getMessage());
						$db->rollBack();
						$result->closeCursor();
				}
				
        }

        function update($numAngl, $libAngl, $numLang){ 
            global $db;
            try {
				$db->beginTransaction();
                $query = 'UPDATE ANGLE SET libAngl = ?, numLang = ? WHERE numAngl = ?;';
                $result = $db->prepare($query);
                $result->execute([$libAngl, $numLang, $numAngl]);
				$db->commit();
				$result->closeCursor();
	
				}
				catch (PDOException $e) {
						die('Erreur insert Angle : ' . $e->getMessage());
						$db->rollBack();
						$result->closeCursor();
				}
				
        }

        function delete($numAngl){ 
            global $db;
            try {
				$db->beginTransaction();
                $query = 'DELETE FROM ANGLE WHERE numAngl = ?;';
                $result = $db->prepare($query);
                $result->execute([$numAngl]);
				$db->commit();
				$result->closeCursor();
	
				}
				catch (PDOException $e) {
						die('Erreur delete Angle : ' . $e->getMessage());
						$db->rollBack();
						$result->closeCursor();
				}
				
        }


		

	}	// End of class
