<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upload</title>
	<link rel="stylesheet" type="text/css" href="index.css?????????">
	<style type="text/css">
		#recherche{
		height: 100px;
		width: 100px;
		margin: auto;
		padding-top: 20px;
	}
	</style>
</head>
<body>
	<header>
		<ul>
			<li><a href="index.php">Afficher</a></li>
			<li><a href="ajout.php">Ajout image</a></li>
			<li><a href="pagination.php">Pagination</a></li>
		</ul>
	</header>
	<form id="recherche" method="POST" action="recherche.php">
		<input type="text" name="recherche" placeholder="Recherche">
		<input type="submit" value="rechercher">
	</form>
	<h2>Découvrez plus d'un million d'images gratuites et de haute qualitées partagées par notre talentueuse communauté</h2>		
	<?php 
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=image', 'root', '');
	}
	catch(Exception $e){
		die('Erreur : '.$e->getMessage());
	}
	$reponse = $bdd->query('SELECT * FROM t_image');?>
	<div class="container">
	<?php 
	foreach ($reponse as $rep) {?>
		<figure>
			<div>
			<figcaption><h3><?= $rep['titre'] ?></h3></figcaption>
			<img src="<?= $rep['lien']?>"><br>
			<button><a href="supprimer.php?id=<?=$rep['id']?>">SUPPRIMER</a></button>
			</div>
		</figure>
	<?php }?>
	</div>
</body>
</html>