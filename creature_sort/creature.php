<?php
include("../general/function.php");

$requestCreatureType=$bdd->prepare("SELECT *
				FROM creature as c
				LEFT JOIN type as t
				ON c.id_type= t.id_type
				");
$requestCreatureType->execute([]);

if(isset($_GET["actionok"])){
	switch($_GET["actionok"]){
	case 1:
		echo "<p class='actionok'>La fiche a bien été ajoutée</p>";
		break;
	case 2:
		echo "<p class='actionok'>La fiche a bien été modifiée</p>";
		break;
	case 3:
		echo "<p class='actionok'>La fiche a bien été supprimée</p>";
		break;
	case 4:
		echo "<p class='actionok'>Super !! Vous êtes inscrit</p>";
		break;
	case 5:
		echo "<p class='actionok'>Bienvenue</p>";
		break;
}
}

include("../general/head.php");

?>
<body>
<?php include("../general/nav.php");?>
	<h1>Les créatures</h1>
	<h3><a href="/projet_academie/action/ajoutercreature.php">Créer une nouvelle créature</a></h3>

	<Section id="creature">
		<?php while($tableCreature=$requestCreatureType->fetch()):?>
		<article class="creature">
		<?php if($tableCreature['image_creature']==NULL):?>
				<img src="../img/no_image.png" alt="">
			<?php else:?>
				<img src="../img/sorts/ <?php echo $tableCreature["image_creature"];?>"alt="<?php echo $tableCreature["image_creature"]["name"];?>">
			<?php endif?>	
			
			<p><?php $tableCreature["nom"] ?>Titre</p>
			<p><?php $tableCreature["id_type"] ?>Type</p>
			<p><?php $tableCreature["description"] ?>Description</p>
			<p><?php $tableCreature["id_user"] ?>Fait par : </p>
			<?php if(isset($_SESSION["userid"])):?>
	<?php if($_SESSION["userid"]==$tableCreature["id_user"]):?>
			<a href="/projet-academie/action/modifiercreature.php<?php echo $tableCreature["id_creature"]?>">Modifier</a>
			<a href="/projet-academie/action/supprimercreature.php<?php echo $tableCreature["id_creature"]?>">Supprimer</a>
			<?php endif?>
			<?php endif?>

		</article>
		<?php endwhile ?>	
	</Section>
</body>

</html>