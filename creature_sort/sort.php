<?php
include("../general/function.php");

$requestSortElement=$bdd->prepare("SELECT s.*, e.nom AS nom_element, u.name AS username
                FROM sort AS s
                LEFT JOIN element AS e
                ON s.id_element = e.id_element
                LEFT JOIN user AS u
                ON s.id_user = u.id_user
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
	if(array_key_exists($_GET["actionok"],$messages)){
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
			<?php 
				
			if($tableSort['image_sort']==NULL):?>
				<img src="../img/no_image.png" alt="Aucune image">
			<?php else:?>
				<img src="<?="../img/".$tableSort['image_sort']?>" alt="<?=$tableSort["nom"] ?>">
			<?php endif;?>
			<p><?php echo $tableSort["nom"]; ?></p>
			<p><?php echo $tableSort["nom_element"];?></p>
			<p>Ajouté par : <?php echo $tableSort["username"]; ?></p>
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