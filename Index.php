<?php
include("general/function.php");


include("general/head.php");
?>
<body>
<?php include("general/nav.php")?>;
	<h1>Académie de Magie</h1>

	<p>
		Plongez dans un monde où la magie prend vie et où chaque créature mythique cache un secret.
		À l’Académie Mystique des Arcanes, nous vous offrons un voyage unique à travers les arts magiques, les sciences des sortilèges, et la découverte des créatures fantastiques qui peuplent nos royaumes enchantés.
	</p>

<p>Découvrez nos disciplines : maîtrisez les sorts élémentaires, apprenez les arcanes perdus, ou devenez un expert en alchimie mystique.</p>
<p>Rencontrez des créatures extraordinaires : des dragons flamboyants aux fées scintillantes, apprenez à comprendre et à cohabiter avec ces merveilles.</p>
<p>
	Rejoignez une communauté d'aspirants magiciens : ateliers, défis enchantés et aventures collaboratives vous attendent.
	Entrez, apprenti magicien, et laissez la magie opérer. Votre légende commence ici.
</p>

<!-- afficher un message par rapport aux actions de l'utilisaterur -->

<?php 
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
?>

</body>

</html>