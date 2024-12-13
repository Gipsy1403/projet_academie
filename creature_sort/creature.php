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
	<h1>Les créatures</h1>
	<h3><a href="/projet_academie/action/ajoutercreature.php">Créer une nouvelle créature</a></h3>
	<Section id="creature">
		<?php while($tableCreature=$requestCreatureType->fetch()):?>
		<article class="creature">
			<img src="" alt="">
			<p>Titre</p>
			<p>Type</p>
			<p>Description</p>
			<p>Fait par : </p>
		</article>
		<?php endwhile ?>	
	</Section>
</body>

</html>