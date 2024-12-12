<?php

include("../general/function.php");

// je vérifie si les champs ont été saisis
if(isset($_POST["nom"])&&isset($_POST["type"])&&isset($_POST["create_fiche"])){
	$nom=$_POST["nom"];
	$type=$_POST["type"];
	$create_fiche=$_POST["create_fiche"];

 $requestSortElement=$bdd->prepare("INSERT INTO sort
 						(nom,create_fiche, image_sort,id_element)
						VALUE (:nom, :create_fiche, :image :id_element");
$requestSortElement->execute([
		"nom"=> $nom,
		"create_fiche"=> $create_fiche,
		"image"=> $image,
		"id_element"=> $id_element,
		]);

include("../general/head.php");
	}
?>
<body>
	<?php include("../general/nav.php");?>

	<form action="ajoutersort.php" method="post" enctype="multipart/form-data">
		<label for="image_sort">Image du sort</label>
		<input type="file" name="image_sort" id="image_sort">
		<label for="nom">Nom du sort</label>
		<input type="text" name="nom" id="nom">
		<label for="element">Type du sort</label>
		<input type="text" name="element" id="element">
		<button>Ajouter</button>
	</form>
</body>
</html>