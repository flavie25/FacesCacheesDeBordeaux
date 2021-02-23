<?
// Mode DEV
require_once __DIR__ . '/util/utilErrOn.php';

	require_once __DIR__ . '/pdo/connectDB.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
		<title>Listbox Ajax</title>
		<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
</head>
<body>
	<h1>Listbox liées - PHP & AJAX</h1>
  <form method="POST" name="formulaire" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">
			<fieldset style="width: 550px">
			<legend>Listbox liées... </legend>
			<br/>
			&nbsp;&nbsp;&nbsp;&nbsp;
<!-- -------------------------------------------------------------- -->
			&nbsp;&nbsp;&nbsp;&nbsp;
			<label>Auteurs :&nbsp;&nbsp;</label>
			<select name='auteur' id='auteur' onchange='change()'>
				<option value='-1'>- - - Choisir un auteur - - -</option>
<?
					$requete = "SELECT * FROM AUTEUR ORDER BY nom;";
					$result = $db->query($requete);
					if ($result) {
						while ($tuple = $result->fetch()) {
?>
              <option value="<?= $tuple["id"]; ?>" >
                  <?= $tuple["prenom"] . " " . $tuple["nom"]; ?>
              </option>
<?
						} // End of while
					}   // if ($result)
?>
				</select>
				&nbsp;&nbsp;&nbsp;
<!-- -------------------------------------------------------------- -->
				&nbsp;&nbsp;&nbsp;
				<label>Livres :&nbsp;&nbsp;</label>
				<div id='livre' style='display:inline'>
					<select name='livre'>
						<option value='-1'>- - - Aucun - - -</option>
					</select>
				</div>
			</fieldset>
			<br/><br/>
  </form>
<!-- -------------------------------------------------------------- -->
  <script type='text/javascript'>
		function getXhr() {
      var xhr = null;
			if (window.XMLHttpRequest) { // Firefox et autres
			   xhr = new XMLHttpRequest();
			}
			else
				if (window.ActiveXObject) { // Internet Explorer
				   try {
						xhr = new ActiveXObject("Msxml2.XMLHTTP");
					} catch (e) {
						xhr = new ActiveXObject("Microsoft.XMLHTTP");
					}
				}
				else { // XMLHttpRequest non supporté par le navigateur
				   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
				   xhr = false;
				}
        return xhr;
		}

		/**
		* Méthode appelée sur le click du bouton
		*/
		function change() {
			var xhr = getXhr();
			// On définit ce qu'on va faire quand on aura la réponse
			xhr.onreadystatechange = function() {
				//alert(xhr.readyState);	// Affiche 1 popup à chq FK/PK lue
				// test si tout est reçu et si serveur est ok
				if (xhr.readyState == 4 && xhr.status == 200) {
					di = document.getElementById('livre');
					di.innerHTML = xhr.responseText;
				}
			}

			// Traitement POST
			xhr.open("POST","./ajaxLivre.php",true);
			// pour le post
			xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			// poster les arguments : ici, l'id de l'auteur
			idauteur = document.getElementById('auteur').options[document.getElementById('auteur').selectedIndex].value;
			//alert(idauteur);
			xhr.send("idAuteur="+idauteur);	// Recup PK auteur à passer en "m" à livre (FK)
		}	// End of function
  </script>
</body>
</html>
