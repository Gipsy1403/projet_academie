<?php
include("../general/function.php");

$requestSortElement=$bdd->prepare("SELECT *
				FROM sort as s
				LEFT JOIN element as e
				ON s.id_element= e.id_element
				");
$requestSortElement->execute([]);

if(isset($_GET["actionok"])){
	$messages=[
		1=>"La fiche a bien été ajoutée",
		2=>"La fiche a bien été modifiée",
		3=>"La fiche a bien été supprimée",
		4=>"Super !! Vous êtes inscrit",
		5=>"Bienvenue",
	];
	if(array_key_exists($_GET["actionok"],$messsages)){
		echo"<p class='actionok'>".($messages[$_GET["actionok"]])."<p>";
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
			<?php if($tableSort['image_sort']==NULL){
				echo '<img src="../img/no_image.png" alt="Aucune image">';
			}else{
				echo '<img src="../img/'.$tableSort["image_sort"].'" alt="' .$tableSort["nom"] . '">';
			};
				?>
			<p><?php echo $tableSort["nom"]; ?>Nom</p>
			<p><?php echo $tableSort["id_element"];?>Element</p>
			<p><?php echo $tableSort["id_user"]; ?>Fait par : </p>
			<p>Spécialistes</p>
			<?php if(isset($_SESSION["userid"])):?>
				<?php if($_SESSION["userid"]==$tableSort["id_user"]):?>
					<a href="/projet-academie/action/modifiersort.php?id=<?php echo $tableSort["id_sort"];?>">Modifier</a>
					<a href="/projet-academie/action/supprimersort.php?id=<?php echo $tableSort["id_sort"];?>">Supprimer</a>
				<?php endif;?>
			<?php endif;?>
		</article>
		<?php endwhile ;?>
	</Section>

</body>

</html>