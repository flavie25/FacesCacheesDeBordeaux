<?
// CRUD COMMENT

require_once __DIR__ . '../../CONNECT/database.php';

	class COMMENT{      

        function get_AllComment(){
            global $db;
            $requete = 'SELECT * FROM COMMENT;';
            $result = $db->prepare($requete);
            $result->execute();
            return($result->fetchAll());
        }

        function get_1CommentByArt($numSeqCom,$numArt){
            global $db;
            $query = 'SELECT * FROM COMMENT INNER JOIN ARTICLE ON comment.numArt = article.numArt WHERE comment.numSeqCom = ? AND comment.numArt = ?;';
            $result = $db->prepare($query);
            $result->execute([$numSeqCom,$numArt]);
            return($result->fetch());
        }
        
        function create($numSeqCom, $numArt, $dtCreaCom, $libCom){
            global $db;
            try {
                $db->beginTransaction();
                $requete = 'INSERT INTO COMMENT (numSeqCom, numArt, dtCreCom, libCom) VALUES (?,?,?,?);';
                $result = $db->prepare($requete);
                $result->execute([$numSeqCom, $numArt, $dtCreaCom, $libCom]);
                $db->commit();
                $result->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur ajout commentaire : ' . $e->getMessage());
					$db->rollBack();
					$result->closeCursor();
			}
        }
        
        function update($numSeqCom, $numArt, $attModOK, $affComOK, $notifComKOAff) {
            global $db;
            try {
                $db->beginTransaction();
                $requete = 'UPDATE COMMENT SET attModOK = ?, affComOK = ?, notifComKOAff = ? WHERE numSeqCom = ? AND numArt = ?';
                $result = $db->prepare($requete);
                $result->execute([$attModOK, $affComOK,$notifComKOAff,$numSeqCom, $numArt]);
                $db->commit();
                $result->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur ajout commentaire : ' . $e->getMessage());
					$db->rollBack();
					$result->closeCursor();
			}
        }
        
    } // End of class