<?php
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : createArticle.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // insertion classe STATUT
    require_once __DIR__ . '/../../util/ctrlSaisies.php';
    require_once __DIR__ . '/../../CLASS_CRUD/article.class.php';
    global $db;
    $monArticle = new ARTICLE;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif du statut
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Initialiser")) {

            header("Location: ./createArticle.php");
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création
        if (((isset($_POST['libTitrArt'])) AND !empty($_POST['libTitrArt']))
            AND (!empty($_POST['Submit']) AND ($Submit === "Valider"))
            AND (isset($_POST['libChapoArt'])) AND !empty($_POST['libChapoArt'])
            AND (isset($_POST['libAccrochArt'])) AND !empty($_POST['libAccrochArt'])
            AND (isset($_POST['parag1Art'])) AND !empty($_POST['parag1Art'])
            AND (isset($_POST['libSsTitr1Art'])) AND !empty($_POST['libSsTitr1Art'])
            AND (isset($_POST['parag2Art'])) AND !empty($_POST['parag2Art'])
            AND (isset($_POST['libSsTitr2Art'])) AND !empty($_POST['libSsTitr2Art'])
            AND (isset($_POST['parag3Art'])) AND !empty($_POST['parag3Art'])
            AND (isset($_POST['libConclArt'])) AND !empty($_POST['libConclArt'])
            AND ((isset($_FILES['monfichier']['tmp_name'])) AND !empty($_FILES['monfichier']['tmp_name']))
            AND (isset($_POST['idAngl'])) AND !empty($_POST['idAngl'])
            AND (isset($_POST['idThem'])) AND !empty($_POST['idThem'])) {
            // Saisies valides
            $erreur = false;

            $libTitrArt = ctrlSaisies($_POST['libTitrArt']);
            $libChapoArt = ctrlSaisies($_POST['libChapoArt']);
            $libAccrochArt = ctrlSaisies($_POST['libAccrochArt']);
            $parag1Art = ctrlSaisies($_POST['parag1Art']);
            $libSsTitr1Art = ctrlSaisies($_POST['libSsTitr1Art']);
            $parag2Art = ctrlSaisies($_POST['parag2Art']);
            $libSsTitr2Art= ctrlSaisies($_POST['libSsTitr2Art']);
            $parag3Art = ctrlSaisies($_POST['parag3Art']);
            $libConclArt = ctrlSaisies($_POST['libConclArt']);
            $numAngl = ctrlSaisies($_POST['idAngl']);
            $numThem = ctrlSaisies($_POST['idThem']);
            $dtCreArt = date("Y-m-d h:i:s");

            require_once __DIR__ . '/ctrlerUploadImage.php';

            $urlPhotArt = $nomImage;
            echo $urlPhotArt;

           
            $monArticle->create($dtCreArt, $libTitrArt, $libChapoArt, $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art, $libSsTitr2Art, $parag3Art, $libConclArt,$urlPhotArt, $numAngl, $numThem);
            
            header("Location: ./article.php");
                
        }
        else{
            header("Location: ./createArticle.php?idAngl=".$_POST['idAngl']."&idThem=".$_POST['idThem']);
            
        }
    
    }   
    // Init variables form
    include __DIR__ . '/initArticle.php';
    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../../front/assets/css/draganddrop.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Article</h1>
    <h2>Ajout d'un article</h2>

    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" id="chgLang">

      <fieldset>
        <legend class="legend1">Formulaire Article...</legend>

        <!--<input type="hidden" id="id" name="id" value=": /*$_GET['id']; */-->

        <div class="control-group">
            <label class="control-label" for="libTitrArt"><b>Titre de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libTitrArt" id="libTitrArt" size="80" maxlength="80" value="<?= $libTitrArt; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="libChapoArt"><b>Chapô de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libChapoArt" id="libChapoArt" size="80" maxlength="80" value="<?= $libChapoArt; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="libAccrochArt"><b>Accroche de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libAccrochArt" id="libAccrochArt" size="80" maxlength="80" value="<?= $libAccrochArt; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="parag1Art"><b>Paragraphe 1 de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="parag1Art" id="parag1Art" size="80" maxlength="1400" value="<?= $parag1Art; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="libSsTitr1Art"><b>Sous-titre 1 de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libSsTitr1Art" id="libSsTitr1Art" size="80" maxlength="80" value="<?= $libSsTitr1Art; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="parag2Art"><b>Paragraphe 2 de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="parag2Art" id="parag2Art" size="80" maxlength="1400" value="<?= $parag2Art; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="libSsTitr2Art"><b>Sous-titre 2 de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libSsTitr2Art" id="libSsTitr2Art" size="80" maxlength="80" value="<?= $libSsTitr2Art; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="parag3Art"><b>Paragraphe 3 de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="parag3Art" id="parag3Art" size="80" maxlength="1400" value="<?= $parag3Art; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="libConclArt"><b>Conclusion de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libConclArt" id="libConclArt" size="80" maxlength="80" value="<?= $libConclArt; ?>" autofocus="autofocus" />
        </div>

        <div class="control-group">
<!-- -------------------------------------------------------------- -->
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
			</select><br/>
<!-- -------------------------------------------------------------- -->
            <label>Angle :&nbsp;&nbsp;</label>
            <div id='angle' style='display:inline'>
                <select name='idAngl' id="idAngl">
                    <option value='-1'>- - - Choisir un angle - - -</option>
                </select>
            </div>
			<br/>
<!-- -------------------------------------------------------------- -->
            <label>Thématique :&nbsp;&nbsp;</label>
			<div id='them' style='display:inline'>
				<select name='idThem' id="idThem">
					<option value='-1'>- - - Choisir une thématique - - -</option>
				</select>
			</div> 
            </br>
<!-- -------------------------------------------------------------- -->
            <label>Mots clés :&nbsp;&nbsp;</label>
            <div id="motCle" ondrop="drop(event)" ondragover="allowDrop(event)">
                <ul name="idMotCle" id="idMotCle">
                </ul>
            </div>
            <div id="selecMotCle" ondrop="drop(event)" ondragover="allowDrop(event)">
                <ul>
                </ul>
            </div>
        </div>
<!-- -------------------------------------------------------------- -->

        <div class="control-group">
            <label class="control-label" for="urlPhotArt"><b>Importez l'illustration :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <div class="controls"> 
                <input type="file" name="monfichier" required="required" id="monfichier" accept=".jpg,.gif,.png,.jpeg" size="70" maxlength="70" value="<? if(isset($_GET['id'])) echo $_POST['urlPhotArt']; else echo $urlPhotArt; ?>" tabindex="110" placeholder="Sur 70 car." title="Recherchez l'image à uploader !" />
                <p>
                <? // Gestion extension images acceptées
                $msgImagesOK = "&nbsp;&nbsp;>> Extension des images acceptées : .jpg, .gif, .png, .jpeg" . "<br>" .
                    "(lageur, hauteur, taille max : 80000px, 80000px, 200 000 Go)";
                echo "<i>" . $msgImagesOK . "</i>";
                ?>
                </p>
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Initialiser" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Valider" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                <br>
            </div>
        </div>
      </fieldset>
    </form>
    <script type='text/javascript' href="../../front/assets/js/draganddrop.js"></script>
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
            var xhr2 = getXhr();
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
            
            xhr2.onreadystatechange = function() {
				//alert(xhr.readyState);	// Affiche 1 popup à chq FK/PK lue
				// test si tout est reçu et si serveur est ok
				if (xhr2.readyState == 4 && xhr2.status == 200) {
					di = document.getElementById('motCle');
					di.innerHTML = xhr2.responseText;
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

             // Traitement POST
			xhr2.open("POST","./ajaxMotCle.php",true);
			// pour le post
			xhr2.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			// poster les arguments : ici, l'id de l'auteur
			langue2 = document.getElementById('langue').options[document.getElementById('langue').selectedIndex].value;
			//alert(idauteur);
			xhr2.send("langue="+langue2);	// Recup PK auteur à passer en "m" à livre (FK)
		}	// End of function
  </script>
<?php
require_once __DIR__ . '/footerArticle.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
