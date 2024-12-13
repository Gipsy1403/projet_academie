<?php

include("../general/function.php");
$requestSortElement=$bdd->prepare("SELECT *
							FROM sort as s
							LEFT JOIN element as e
							ON s.id_element= e.id_element
							");
$requestSortElement->execute([]);	
// je vérifie si les champs ont été saisis
if(isset($_POST["nom"])&&isset($_POST["id_element"])&&isset($_FILES["image_sort"])){
	$nom=$_POST["nom"];
	$element=$_POST["id_element"];
	$image_sort=$_FILES["image_sort"];
var_dump($_POST);


	if(isset($_FILES["image_sort"])){
		$imageName=$clean($_FILES["image_sort"]["name"]);
		$imageInfo= pathinfo($imageName);
		$imageExtension=$imageInfo["extension"];
		$autoriseExtension=["png", "jpeg", "jpg", "webp", "bmp", "svg"];
		if(in_array($imageExtension,$autoriseExtension)){
			$image_sort=time() .rand(1,1000); ".".$imageExtension;
			move_uploaded_file($_FILES["image_sort"]["tmp_name"],"/projet_academie/img".$img);
		}else{
			header("location:/projet_academie/index.php?actionok=1");
		}
	}



 $requestSortElement=$bdd->prepare("INSERT INTO sort
 						(nom,create_fiche, image_sort,id_element)
						VALUE (:nom, :create_fiche, :image :id_element");
$requestSortElement->execute([
		"nom"=> $nom,
		"create_fiche"=> $create_fiche,
		"image_sort"=> $image_sort,
		"id_element"=> $id_element,
		]);

		
	}
	include("../general/head.php");
?>
<body>
	<?php include("../general/nav.php");?>

	<form action="ajoutersort.php" method="post" enctype="multipart/form-data">
		<label for="image_sort">Image du sort</label>
		<input type="file" name="image_sort" id="image_sort">
		<label for="nom">Nom du sort</label>
		<input type="text" name="nom" id="nom">
		<label for="element">Elément du sort</label>
		<select name="element" id="element">
			<option value="lumiere">Lumière</option>
			<option value="eau">Eau</option>
			<option value="air">Air</option>
			<option value="feu">Feu</option>
		</select>
		<button>Ajouter</button>
	</form>
</body>
</html>