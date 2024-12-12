<?php
include("../general/function.php");

$requestCreatureType=$bdd->prepare("SELECT *
				FROM creature as c
				LEFT JOIN type as t
				ON c.id_type= t.id_type
				");
$requestCreatureType->execute([]);


include("../general/head.php");
include("../general/nav.php");

?>
<body>
	<h2>Les créatures</h2>
	<?php while($tableCreature=$requestCreatureType->fetch()):?>
	<Section id="creature">
		<article class="creature">
			<img src="" alt="">
			<p>Titre</p>
			<p>Type</p>
			<p>Description</p>
			<p>Fait par : </p>
		</article>
	</Section>
<?php endwhile ?>	
</body>

</html>