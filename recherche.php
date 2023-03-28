<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Recherche</title>
	<link rel="stylesheet" type="text/css" href="index.css????????">
</head>
<body>
	<header>
		<ul>
			<li><a href="index.php">Afficher</a></li>
			<li><a href="ajout.php">Ajout image</a></li>
			<li><a href="pagination.php">Pagination</a></li>
		</ul>
	</header>
	<?php 
	try{
	$bdd = new PDO('mysql:host=localhost;dbname=image', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e){
		die('Erreur : '.$e->getMessage());
	}
	$recherche = $_POST['recherche'];
	$req = $bdd->prepare('SELECT lien, titre FROM t_image WHERE description LIKE "%":recherche"%"');
	$req->execute(array(
		'recherche' => $recherche
	));?>
	<div class="container">
	<?php 
	foreach ($req as $reponse) {?>
		<figure>
			<div>
			<figcaption><h3><?= $reponse['titre'] ?></h3></figcaption>
			<img src="<?= $reponse['lien']?>"><br>
			</div>
		</figure>
	<?php }?>
	</div>
</body>
</html>