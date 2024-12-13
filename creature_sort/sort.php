<?php
include("../general/function.php");

$requestSortElement=$bdd->prepare("SELECT *
				FROM sort as s
				LEFT JOIN element as e
				ON s.id_element= e.id_element
				");
$requestSortElement->execute([]);

include("../general/head.php");


?>
<body>
<?php include("../general/nav.php");?>
	<h1>Les sorts</h1>
	<h3><a href="/projet_academie/action/ajoutersort.php">Créer un nouveau Sort</a></h3>
	
	
	<Section id="sort">
		<?php while($tableSort=$requestSortElement->fetch()):?>
		<article class="sort">
			<img src="" alt="">
			<p><?php $tableSort["nom"] ?>Nom</p>
			<p><?php $tableSort["nom"] ?>Element</p>
			<p><?php ?>Fait par : </p>
			<p>Spécialistes</p>

			<a href="">Modifier</a>
			<a href="">Supprimer</a>
		</article>
		<?php endwhile ?>
	</Section>

</body>

</html>