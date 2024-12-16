<?php
include("../general/function.php");

$requestCreatureType=$bdd->prepare("SELECT c.*,t.nom AS nom_type, u.name AS username
				FROM creature as c
				LEFT JOIN type as t
				ON c.id_type= t.id_type
				LEFT JOIN user AS u
                	ON c.id_user = u.id_user
				");
$requestCreatureType->execute([]);

if(isset($_GET["actionok"])){
	$messages=[
		1=>"La fiche a bien été ajoutée",
		2=>"La fiche a bien été modifiée",
		3=>"La fiche a bien été supprimée",
		4=>"Super !! Vous êtes inscrit",
		5=>"Bienvenue",
	];
	if(array_key_exists($_GET["actionok"],$messages)){
		echo"<p class='actionok'>".($messages[$_GET["actionok"]])."<p>";
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
				<img src="../img/creatures/ <?php echo $tableCreature["image_creature"];?>">
			<?php endif;?>	
			
			<p><?php $tableCreature["nom"];?>Titre</p>
			<p><?php $tableCreature["nom_type"];?>Type</p>
			<p><?php $tableCreature["description"];?>Description</p>
			<p><?php $tableCreature["username"];?>Fait par : </p>
			<?php if(isset($_SESSION["userid"])):?>
	<?php if($_SESSION["userid"]==$tableCreature["id_user"]):?>
			<a href="/projet-academie/action/modifiercreature.php?id=<?php echo $tableCreature["id_creature"];?>">Modifier</a>
			<a href="/projet-academie/action/supprimercreature.php?id=<?php echo $tableCreature["id_creature"];?>">Supprimer</a>
			<?php endif;?>
			<?php endif;?>

		</article>
		<?php endwhile;?>	
	</Section>
</body>

</html>