<?
// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

require_once __DIR__ . '/../../CONNECT/database.php';

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
			<label>Langues :&nbsp;&nbsp;</label>
			<select name='langue' id='langue' onchange='change()'>
				<option value='-1'>- - - Choisir une langue - - -</option>
<?
					$requete = "SELECT * FROM LANGUE ;";
					$result = $db->query($requete);
					if ($result) {
						while ($tuple = $result->fetch()) {
?>
              <option value="<?= $tuple["numLang"]; ?>" >
                  <?= $tuple["numLang"] . " " . $tuple["lib1Lang"]; ?>
              </option>
<?
						} // End of while
					}   // if ($result)
?>
				</select>
				&nbsp;&nbsp;&nbsp;
<!-- -------------------------------------------------------------- -->
				&nbsp;&nbsp;&nbsp;
				<label>Angle :&nbsp;&nbsp;</label>
				<div id='angle' style='display:inline'>
					<select name='angle' id='numAngl'>
						<option value='-1'>- - - Choisir un angle - - -</option>
					</select>
				</div>
			<br/><br/>
<!-- -------------------------------------------------------------- -->
            &nbsp;&nbsp;&nbsp;
				<label>Thématique :&nbsp;&nbsp;</label>
				<div id='them' style='display:inline'>
					<select name='them' id='numThem'>
						<option value='-1'>- - - Choisir une thématique - - -</option>
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
            var xhr1 = getXhr();
			// On définit ce qu'on va faire quand on aura la réponse
			xhr.onreadystatechange = function() {
				//alert(xhr.readyState);	// Affiche 1 popup à chq FK/PK lue
				// test si tout est reçu et si serveur est ok
				if (xhr.readyState == 4 && xhr.status == 200) {
					di = document.getElementById('angle');
					di.innerHTML = xhr.responseText;
				}
			}

            xhr1.onreadystatechange = function() {
				//alert(xhr.readyState);	// Affiche 1 popup à chq FK/PK lue
				// test si tout est reçu et si serveur est ok
				if (xhr1.readyState == 4 && xhr1.status == 200) {
					di = document.getElementById('them');
					di.innerHTML = xhr1.responseText;
				}
			}

			// Traitement POST
			xhr.open("POST","./ajaxAngle.php",true);
			// pour le post
			xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			// poster les arguments : ici, l'id de l'auteur
			langue = document.getElementById('langue').options[document.getElementById('langue').selectedIndex].value;
			//alert(idauteur);
			xhr.send("langue="+langue);	// Recup PK auteur à passer en "m" à livre (FK)

            // Traitement POST
			xhr1.open("POST","./ajaxThem.php",true);
			// pour le post
			xhr1.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			// poster les arguments : ici, l'id de l'auteur
			langue1 = document.getElementById('langue').options[document.getElementById('langue').selectedIndex].value;
			//alert(idauteur);
			xhr1.send("langue="+langue1);	// Recup PK auteur à passer en "m" à livre (FK)
		}	// End of function
  </script>
</body>
</html>
