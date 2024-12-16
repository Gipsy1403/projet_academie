<?php
include("../general/function.php");

if(isset($_GET["id_user"])){
	$id=htmlspecialchars($_GET["id_user"]);

$requestRead=$bdd->prepare("SELECT *
						FROM sort
						WHERE id_sort=:id_sort
						");
$requestRead->execute([
	"id_sort"=>$id_sort,
	]);

$tableSort=$requestRead->fetch();

if($_SESSION["iduser"]==$tableUser["id_user"]){
	unlink("../img/".$tableSort["image_sort"]);
	$request=$bdd->prepare("DELETE FROM sort
						WHERE id_sort=:id_sort
						");
	$request->execute([
		"id_sort"=>$id_sort,
		]);
	header("location:/projet_academie/creature_sort/sort.php?actionok=3");
	exit();
	}else{
		header("location:/projet_academie/creature_sort/sort.php");
	}
}else{
	header("location:/projet_academie/creature_sort/sort.php");
}

?>
