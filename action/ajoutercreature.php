<?php

include("../general/function.php");

// je vérifie si les champs ont été saisis
if(isset($_POST["nom"])&&isset($_POST["description"])&&isset($_POST["id_type"])&&isset($_SESSION["iduser"])){
	$nom=$_POST["nom"];
	$description=$_POST["description"];
	$id_type=$_POST["id_type"];
	$iduser=$_SESSION["iduser"];

	if(isset($_FILES["image_creature"])){
		$imageName=clean($_FILES["image_creature"]["name"]);
		$imageInfo= pathinfo($imageName);
		$imageExtension=$imageInfo["extension"];
		$autoriseExtension=["png", "jpeg", "jpg", "webp", "bmp", "svg"];
		if(in_array($imageExtension,$autoriseExtension)){
			$imagecreature=time() .rand(1,1000); ".".$imageExtension;
			move_uploaded_file($_FILES["image_creature"]["tmp_name"],"../img/".$imagecreature);
		}else{
			header ("location:/projet_academie/creature.php?actionok=1");
		}
	}

$requestCreatureType=$bdd->prepare("SELECT c.*, t.nom AS nom_type, u.name AS username
							FROM creature as c
							LEFT JOIN type as t
							ON c.id_type= t.id_type
							LEFT JOIN user AS u
							ON c.id_user = u.id_user
							");
$requestCreatureType->execute([]);

$requestCreatureType=$bdd->prepare("INSERT INTO creature
 						(nom,id_type, image_creature,description, id_user)
						VALUE (:nom, :id_type, :image_creature, :description, :id_user)");
$requestCreatureType->execute([
		"nom"=> $nom,
		"id_type"=> $id_type,
		"image_creature"=> $imagecreature,
		"description"=> $description,
		"id_user"=> $iduser
		]);

	}
	include("../general/head.php");
?>
<body>
	<?php include("../general/nav.php");?>

	<form action="ajoutercreature.php" method="post" enctype="multipart/form-data">
		<label for="image_creature">Image de la Créature</label>
		<input type="file" name="image_creature" id="image_creature">
		<label for="nom">Nom de la créature</label>
		<input type="text" name="nom" id="nom">
		<label for="id_type">Type de la créature</label>
		<select name="id_type" id="id_type">
			<option value="aquatique">Aquatique</option>
			<option value="demoniaque">Démoniaque</option>
			<option value="mort-vivant">Mort-vivant</option>
			<option value="mi-bete">Mi-bête</option>
		</select>
		<label for="description">Description de la Créature</label>
		<input type="text" name="description" id="description">
		<button>Ajouter</button>
	</form>
</body>
</html>