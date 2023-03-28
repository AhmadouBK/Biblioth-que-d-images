<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Suppression</title>
</head>
<body>
	<?php 
		try{
		$bdd = new PDO('mysql:host=localhost;dbname=image', 'root', '');
		}
		catch(Exception $e){
			die('Erreur : '.$e->getMessage());
		}

		$id = $_GET['id'];

		$reponse = $bdd->prepare('DELETE FROM t_image WHERE id = :id');
		$reponse->execute(array(
			'id' => $id
			));
		if ($reponse) {
			header("Location:index.php");
		}
	?>
</body>
</html>