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
	<?php while($tableSort=$requestSortElement->fetch()):?>
	<Section id="sort">
		<article class="sort">
			<img src="" alt="">
			<p><?php ?>Nom</p>
			<p>Element</p>
			<p>Fait par : </p>
			<p>Spécialistes</p>
		</article>
	</Section>
<?php endwhile ?>

</body>

</html>