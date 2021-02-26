<?php
///////////////////////////////////////////////////////////////
//
//  Gestion des CRUD (PDO) - 23 Janvier 2021
//
//  Script  : index1.php 	-		BLOGART21 (Etud)
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/util/utilErrOn.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Gestion des CRUD</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

	<link rel="stylesheet" href="front/assets/css/normalize.css">
	<link rel="stylesheet" href="back/css/footer.css">
	<link rel="stylesheet" href="back/css/allCrud.css">

</head>
<body>

	<div class="container">
		<h1> Panneau administrateur</h1>
		<h2>Gestion de tous les CRUD</h2>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./back/angle/angle.php">Angle </a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./back/article/article.php">Article </a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./back/comment/comment.php">Commentaire </a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./back/commentplus/commentplus.php">Réponse sur Commentaire </a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./back/langue/langue.php">Langue </a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./back/likeart/likeart.php">Like Article </a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./back/likecom/likecom.php">Like Commentaire </a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./back/membre/membre.php">Membre </a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./back/motcle/motcle.php">Mot-clé </a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./back/motclearticle/motclearticle.php">Mot-clé Article </a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./back/statut/statut.php">Statut</a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./back/thematique/thematique.php">Thématique </a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./back/user/user.php">User </a>
		</div>
	</div>

<?php
require_once __DIR__ . '/footer.php';
?>
</body>
</html>
