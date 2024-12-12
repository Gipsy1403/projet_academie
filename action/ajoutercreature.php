<?php

include("../general/function.php");

// je vérifie si les champs ont été saisis
if(isset($_POST["nom"])&&isset($_POST["description"])&&isset($_POST["create_fiche"])){
	$nom=$_POST["nom"];
	$description=$_POST["description"];
	$create_fiche=$_POST["create_fiche"];

 $requestCreatureType=$bdd->prepare("INSERT INTO creature
 						(nom,create_fiche, image_creature,description)
						VALUE (:nom, :create_fiche, :image_creature :description");
$requestCreatureType->execute([
		"nom"=> $nom,
		"create_fiche"=> $create_fiche,
		"image_creature"=> $image_creature,
		"description"=> $description,
		]);

include("../general/head.php");
	}
if(isset($_FILES["image_creature"])){
	$imageName=$clean($_FILES["image_creature"]["name"]);
	$imageInfo= pathinfo($imageName);
	$imageExtension=$imageInfo["extension"];
	$autoriseExtension=["png", "jpeg", "jpg", "webp", "bmp", "svg"];
	if(in_array($imageExtension,$autoriseExtension)){
		$img=time() .rand(1,1000); ".".$imageExtension;
		move_uploaded_file($_FILES["image_creature"]["tmp_name"],"/projet_academie/img".$img);
	}else{
		echo "location:/projet_academie/index.php?actionok=1";
	}
}
?>
<body>
	<?php include("../general/nav.php");?>

	<form action="ajoutercreature.php" method="post" enctype="multipart/form-data">
		<label for="image_creature">Image de la Créature</label>
		<input type="file" name="image_creature" id="image_creature">
		<label for="nom">Nom de la créature</label>
		<input type="text" name="nom" id="nom">
		<label for="type">Type de la Créature</label>
		<input type="text" name="type" id="type">
		<label for="description">Description de la Créature</label>
		<input type="text" name="description" id="description">
		<button>Ajouter</button>
	</form>
</body>
</html>