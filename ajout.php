<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ajout image</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<header>
		<ul>
			<li><a href="index.php">Afficher</a></li>
			<li><a href="ajout.php">Ajout image</a></li>
			<li><a href="pagination.php">Pagination</a></li>
		</ul>
	</header>
	<h1>Ce formulaire permet d'ajouter une image</h1>
	<?php 
		if (empty($_POST['titre'])) {?>
			<form method="POST" action="ajout.php" enctype="multipart/form-data" class="ajouter">
				<table>
					<tr>
						<td><label for="titre">Titre de l'image</label></td>
						<td><input type="text" name="titre" id="titre"><br></td>
					</tr>
					<tr>
						<td><label>Description</label></td>
						<td><input type="text" name="description"></td>
					</tr>
					<tr>
						<td><label>Choisir photo</label></td>
						<td><input type="file" name="photo"><br></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="AJOUTER"></td>
					</tr>
				</table>
			</form>
	<?php	}
	else{
		$titre = $_POST['titre'];
		$description = $_POST['description'];
		$lien = 'images/' . $_FILES['photo']['name'] ;
		move_uploaded_file($_FILES['photo']['tmp_name'], $lien);
		
		try{
		$bdd = new PDO('mysql:host=localhost;dbname=image', 'root', '');
		}
		catch(Exception $e){
			die('Erreur : '.$e->getMessage());
		}

		$req = $bdd->prepare('INSERT INTO t_image(titre, lien, description) VALUES (:titre, :lien, :description)');
		$req->execute(array(
			'titre' => $titre,
			'lien' => $lien,
			'description' => $description
			));
		if ($req) {
			header("Location:index.php");
		}	
	}
	?>
</body>
</html>