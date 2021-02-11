<?
// CRUD USER (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class MOTCLEARTICLE{
        function get_AllMotCleArticle(){
			global $db;
            $requete = 'SELECT * FROM MOTCLEARTICLE;';
            $result = $db->prepare($requete);
            $result->execute();
            return($result->fetchAll());
		}
    }