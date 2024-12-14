<?php
include("../general/function.php");

$requestSortElement=$bdd->prepare("SELECT *
				FROM sort as s
				LEFT JOIN element as e
				ON s.id_element= e.id_element
				");
$requestSortElement->execute([]);

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
	<h1>Les sorts</h1>
	<h3><a href="/projet_academie/action/ajoutersort.php">Créer un nouveau Sort</a></h3>
	
	
	<Section id="sort">
		<?php while($tableSort=$requestSortElement->fetch()):?>
		<article class="sort">
			<?php if($tableSort['image_sort']==NULL):?>
				<img src="../img/no_image.png" alt="">
			<?php else:?>
				<img src="../img/sorts/ <?php echo $tableSort["image_sort"];?>"alt="<?php echo $tableSort["image_sort"]["name"];?>">
			<?php endif?>
			<p><?php $tableSort["nom"] ?>Nom</p>
			<p><?php $tableSort["id_element"] ?>Element</p>
			<p><?php $tableSort["id_user"] ?>Fait par : </p>
			<p>Spécialistes</p>
<?php if(isset($_SESSION["userid"])):?>
	<?php if($_SESSION["userid"]==$tableSort["id_user"]):?>
			<a href="/projet-academie/action/modifiersort.php<?php echo $tablesort["id_sort"]?>">Modifier</a>
			<a href="/projet-academie/action/supprimersort.php<?php echo $tablesort["id_sort"]?>">Supprimer</a>
			<?php endif?>
			<?php endif?>
		</article>
		<?php endwhile ;?>
	</Section>

</body>

</html>