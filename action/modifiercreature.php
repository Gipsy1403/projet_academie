<?php

include("../general/function.php");

if(isset($_GET["id_user"])){
	$id=htmlspecialchars($_GET["id_user"]);
}
$requestRead=$bdd->prepare("SELECT *
						FROM creature
						WHERE id_creature=:id_creature
						");
$requestRead->execute([
	"id_creature"=>$id_creature,
	]);

$tableCreature=$requestRead->fetch();

if($_SESSION["userid"]!=$tableUser["id_user"]){
	header("location:/projet_academie/index.php");
}else{
	header("location:/projet_academie/creature-sort/sort.php");
}

// je vérifie si les champs ont été saisis
if(isset($_POST["nom"])&&isset($_POST["description"])&&isset($_POST["id_type"])){
	$nom=$_POST["nom"];
	$description=$_POST["description"];
	$id_type=$_POST["id_type"];

$request=$bdd->prepare('SELECT id_creature, image_creature, description, id_user
					FROM creature
					WHERE id_creature=?
					');
$request->execute([
				"id_creature"=>$id_creature
]);

$tableCreature=$request->fetch();

if($_SESSION["userid"]==$tableUser["id_user"]){
	if($_FILES["image_creature"]["error"]===UPLOAD_ERR_NO_FILE){

		$request=$bdd->prepare('UPDATE creature
							SET nom=:nom,
							 description= :description
							 id_user=:id_user,
							 WHERE id_creature=:id_creature
							');
$request->execute([
	"nom"=> $nom,
	"description"= > $description,
	"id_user"=> $id_user,
	"id_creature"=> $id_creature
]);

header("location:/projet_academie/creature_sort/creature.php?actionok=2");
	}else{
		$imageName=clean($_FILES["image_creature"]["name"]);
		$imageInfo= pathinfo($imageName);
		$imageExtension=$imageInfo["extension"];
		$autoriseExtension=["png", "jpeg", "jpg", "webp", "bmp", "svg"];
		if(in_array($imageExtension,$autoriseExtension)){
			$imagecreature=time() .rand(1,1000); ".".$imageExtension;
			move_uploaded_file($_FILES["image_creature"]["tmp_name"],"/projet_academie/img/creatures".$imagecreature);
		unlink("/projet_academie/img/creatures";$tableCreature["image_creature"]);
		}else{
			// header ("location:/projet_academie/creature.php?actionok=1");
		}
			$request=$bdd->prepare('UPDATE creature
								SET image_creature=:image_creature,
								nom=:nom,
								description= :description
								id_user=:id_user,
								WHERE id_creature=:id_creature
								');
			$request->execute([
					"image_creature"=> $image_creature,
					"nom"=> $nom,
					"description"= > $description,
					"id_user"=> $id_user,
					"id_creature"=> $id_creature
					]);
			// header ("location:/projet_academie/creature.php?actionok=2");
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
		<input type="hidden" name="id_creature" id="id_creature" value="<?php echo $tableCreature["id_creature"];?>">
		<label for="image_creature">Image de la Créature</label>
		<input type="file" name="image_creature" id="image_creature">
		<label for="nom">Nom de la créature</label>
		<input type="text" name="nom" id="nom" value="<?php echo $tableCreature["nom"];?>">
		<label for="id_type">Type de la créature</label>
		<select name="id_type" id="id_type" value="<?php echo $tableCreature["id_type"];?>">
			<option value="aquatique">Aquatique</option>
			<option value="demoniaque">Démoniaque</option>
			<option value="mort-vivant">Mort-vivant</option>
			<option value="mi-bete">Mi-bête</option>
		</select>
		<label for="description">Description de la Créature</label>
		<input type="text" name="description" id="description" value="<?php echo $tableCreature["description"];?>">
		<button>Modifier</button>
	</form>
</body>
</html>