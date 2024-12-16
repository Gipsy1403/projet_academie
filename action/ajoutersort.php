<?php

include("../general/function.php");
if(isset($_POST["nom"])&&isset($_POST["id_element"])&&isset($_SESSION["iduser"])){
	$nom=$_POST["nom"];
	$id_element=$_POST["id_element"];
	$iduser=$_SESSION["iduser"];

	if(isset($_FILES["image_sort"])){
	
		$imageName=clean($_FILES["image_sort"]["name"]);
		$imageInfo= pathinfo($imageName);
		$imageExtension=$imageInfo["extension"];
		$autoriseExtension=["png", "jpeg", "jpg", "webp", "bmp", "svg"];
		if(in_array($imageExtension,$autoriseExtension)){
			$imagesort=time() .rand(1,1000). ".".$imageExtension;
		
			move_uploaded_file($_FILES["image_sort"]["tmp_name"],"../img/".$imagesort);
		}else{
			header("location:../creature_sort/sort.php?actionok=1");
		}
	}


$requestSortElement=$bdd->prepare("SELECT s.*, e.nom AS nom_element, u.name AS username
								FROM sort AS s
								LEFT JOIN element AS e
								ON s.id_element = e.id_element
								LEFT JOIN user AS u
								ON s.id_user = u.id_user
								");
$requestSortElement->execute([]);

$requestSortEl=$bdd->prepare("INSERT INTO sort(nom, image_sort,id_element, id_user)
						VALUES (:nom, :image_sort, :id_element, :id_user)");
$requestSortEl->execute([
		"nom"=> $nom,
		"image_sort"=> $imagesort,
		"id_element"=> $id_element,
		"id_user"=> $iduser
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
		<label for="id_element">Elément du sort</label>
		<select name="id_element" id="id_element">
			<option value="lumiere">Lumière</option>
			<option value="eau">Eau</option>
			<option value="air">Air</option>
			<option value="feu">Feu</option>
		</select>
		<button>Ajouter</button>
	</form>
</body>
</html>