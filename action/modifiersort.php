<?php

include("../general/function.php");

if(isset($_GET["id_user"])){
	$id=htmlspecialchars($_GET["id_user"]);
}
$requestRead=$bdd->prepare("SELECT *
						FROM sort
						WHERE id_sort=:id_sort
						");
$requestRead->execute([
	"id_sort"=>$id_sort,
	]);

$tableSort=$requestRead->fetch();

if($_SESSION["userid"]!=$tableUser["id_user"]){
	header("location:/projet_academie/index.php");
}else{
	header("location:/projet_academie/creature-sort/sort.php");
}

// je vérifie si les champs ont été saisis
if(isset($_POST["nom"])&&isset($_POST["id_element"])&&isset($_POST["id_user"])){
	$nom=$_POST["nom"];
	$id_element=$_POST["id_element"];
	$id_user=$_POST["id_user"];

$request=$bdd->prepare('SELECT id_sort, image_sort, id_user,id_element
					FROM sort
					WHERE id_sort=?
					');
$request->execute([
				"id_sort"=>$id_sort
]);

$tableSort=$request->fetch();

if($_SESSION["userid"]==$tableUser["id_user"]){
	if($_FILES["image_sort"]["error"]===UPLOAD_ERR_NO_FILE){

		$request=$bdd->prepare('UPDATE sort
							SET nom=:nom,
							 id_element=:id_element,
							 id_user=:id_user,
							 WHERE id_sort=:id_sort
							');
$request->execute([
	"nom"=> $nom,
	"id_element"= > $id_element,
	"id_user"=> $id_user,
	"id_sort"=> $id_sort
]);

header("location:/projet_acsort_sort/creature.php?actionok=2");
	}else{
		$imageName=clean($_FILES["image_sort"]["name"]);
		$imageInfo= pathinfo($imageName);
		$imageExtension=$imageInfo["extension"];
		$autoriseExtension=["png", "jpeg", "jpg", "webp", "bmp", "svg"];
		if(in_array($imageExtension,$autoriseExtension)){
			$imagesort=time() .rand(1,1000); ".".$imageExtension;
			move_uploaded_file($_FILES["image_sort"]["tmp_name"],"/projet_academie/img/sorts".$imagesort);
		unlink("/projet_academie/img/sorts";$tableSort["image_sort"]);
		}else{
			// header ("location:/projet_academie/creature.php?actionok=1");
		}
			$request=$bdd->prepare('UPDATE sort
								SET image_sort=:image_sort,
								nom=:nom,
								id_element=:id_element,
								id_user=:id_user,
								WHERE id_sort=:id_sort
								');
			$request->execute([
					"image_sort"=> $image_sort,
					"nom"=> $nom,
					"id_element"= > $id_element,
					"id_user"=> $id_user,
					"id_sort"=> $id_sort
					]);
			// header ("location:/projet_academie/sort.php?actionok=2");
			}
		}else{
			header("location:/projet_academie/creature-sort/sort.php");
		}
	}

include("../general/head.php");
?>
<body>
	<?php include("../general/nav.php");?>

	<form action="modifiercreature.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id_sort" id="id_sort" value="<?php echo $tableSort["id_sort"];?>">
		<label for="image_sort">Image du sort</label>
		<input type="file" name="image_sort" id="image_sort">
		<label for="nom">Nom du sort</label>
		<input type="text" name="nom" id="nom" value="<?php echo $tableSort["nom"];?>">
		<label for="id_element">Elément du sort</label>
		<select name="id_element" id="id_element" value="<?php echo $tableSort["id_type"];?>">
			<option value="lumiere">Lumière</option>
			<option value="eau">Eau</option>
			<option value="air">Air</option>
			<option value="feu">Feu</option>
		</select>
		<button>Modifier</button>
	</form>
</body>
</html>