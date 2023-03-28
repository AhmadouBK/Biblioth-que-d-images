<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pagination</title>
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
	<h2>Découvrez plus d'un million d'images gratuites et de haute qualitées partagées par notre talentueuse communauté</h2>		
	<?php 
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=image', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e){
		die('Erreur : '.$e->getMessage());
	}

	$total=0;
	$count=$bdd->query("SELECT *from t_image");
	while($row = $count->fetch(PDO::FETCH_ASSOC))
	$total++;
	//pagination 
		if(isset($_GET['id'])){
	$page =$_GET['id'];
	}else{
		$page =1;
	}
		$limite = 5;
		$depart = ($page-1)*$limite;
		$data =['depart'=>$depart,'limite'=>$limite];
		$req = $bdd->prepare("SELECT * FROM t_image LIMIT :depart,:limite");
		$req->bindParam(':depart', $depart, PDO::PARAM_INT);
		$req->bindParam(':limite', $limite, PDO::PARAM_INT);
		$req->execute();

	//$reponse = $bdd->query('SELECT * FROM t_image');?>
	<div class="container">
	<?php 
	foreach ($req as $reponse) {?>
		<figure>
			<div>
			<figcaption><h3><?= $reponse['titre'] ?></h3></figcaption>
			<img src="<?= $reponse['lien']?>"><br>
			<button><a href="supprimer.php?id=<?=$reponse['id']?>">SUPPRIMER</a></button>
			</div>
		</figure>
	<?php }?>
	</div>
	<div class="divBouton">
	<?php
	$total_pages = ceil($total/$limite);
		for ($j=1; $j <=$total_pages ; $j++) {?> 
			<button class="bouton"><a href="pagination.php?id=<?= $j ?>"><?= $j ?></a></button>
		<?php }
	?>
	</div>
</body>
</html>