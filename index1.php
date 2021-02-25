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
			<a class="button" href="./BACK/angle/angle.php">Angle </a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./BACK/article/article.php">Article </a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./BACK/comment/comment.php">Commentaire </a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./BACK/commentplus/commentplus.php">Réponse sur Commentaire </a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./BACK/langue/langue.php">Langue </a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./BACK/likeart/likeart.php">Like Article </a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./BACK/likecom/likecom.php">Like Commentaire </a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./BACK/membre/membre.php">Membre </a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./BACK/motcle/motcle.php">Mot-clé </a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./BACK/motclearticle/motclearticle.php">Mot-clé Article </a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./BACK/statut/statut.php">Statut</a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./BACK/thematique/thematique.php">Thématique </a>
		</div>
		<div class="crudAlign">
			<p> Gestion de</p>
			<a class="button" href="./BACK/user/user.php">User </a>
		</div>
	</div>

<?php
require_once __DIR__ . '/footer.php';
?>
</body>
</html>
