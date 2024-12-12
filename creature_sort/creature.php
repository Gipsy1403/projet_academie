<?php
include("../general/function.php");

$requestCreature=$bdd->prepare("SELECT *
						FROM creature");
$requestCreature->execute([]);


include("../general/head.php");
include("../general/nav.php");

?>
<body>
	<h2>Les créatures</h2>
	<?php while($tableCreature=$requestCreature->fetch()):?>
	<Section id="creature">
		<article class="creature">
			<img src="" alt="">
			<p>Titre</p>
			<p>Description</p>
			<p>Fait par : </p>
		</article>
	</Section>
<?php endwhile ?>	
</body>

</html>