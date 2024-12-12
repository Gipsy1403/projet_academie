<?php
include("general/function.php");




include("general/head.php");
include("general/nav.php");

?>
<body>
	<h1>Académie de Magie</h1>

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