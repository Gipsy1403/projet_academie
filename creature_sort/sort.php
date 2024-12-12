<?php
include("../general/function.php");

$requestSortElement=$bdd->prepare("SELECT *
				FROM sort as s
				LEFT JOIN element as e
				ON s.id_element= e.id_element
				");
$requestSortElement->execute([]);

include("../general/head.php");
include("../general/nav.php");

?>
<body>
	<h2>Les sorts</h2>
	<h3><a href="/projet_academie/action/ajoutersort.php">Créer une nouveau Sort</a></h3>
	
	<?php while($tableSort=$requestSortElement->fetch()):?>
	<Section id="sort">
		<article class="sort">
			<img src="" alt="">
			<p><?php $tableSort["nom"] ?>Nom</p>
			<p><?php $tableSort["nom"] ?>Element</p>
			<p><?php ?>Fait par : </p>
			<p>Spécialistes</p>

			<a href="">Modifier</a>
			<a href="">Supprimer</a>
		</article>
	</Section>
<?php endwhile ?>

</body>

</html>