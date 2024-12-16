<?php
include("../general/function.php");

if(isset($_GET["id_user"])){
	$id=htmlspecialchars($_GET["id_user"]);

$requestRead=$bdd->prepare("SELECT *
						FROM creature
						WHERE id_creature=:id_creature
						");
$requestRead->execute([
	"id_creature"=>$id_creature,
	]);

$tableCreature=$requestRead->fetch();

if($_SESSION["iduser"]==$tableUser["id_user"]){
	unlink("../img/".$tableCreature["image_creature"]);
	
	$request=$bdd->prepare("DELETE FROM creature
						WHERE id_creature=:id_creature
						");
	$request->execute([
		"id_creature"=>$id_creature,
		]);
	header("location:/projet_academie/creature_sort/creature.php?actionok=3");
	exit();
	}else{
		header("location:/projet_academie/creature_sort/creature.php");
	}
}else{
	header("location:/projet_academie/creature_sort/creature.php");
}

?>
