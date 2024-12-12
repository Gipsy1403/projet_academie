<?php

include("../general/function.php");
// je vérifie si les champs ont été saisis
if(isset($_POST["name"])&&isset($_POST["password"])){
	$name=$_POST["name"];
	$password=$_POST["password"];

 $requestUser=$bdd->prepare("SELECT *
 						FROM user
						WHERE name=:name");
$requestUser->execute([
		"name"=> $name
		]);

$tableUser=$requestUser->fetch();

if(verif_mdp($password,$tableUser["password"])){
	$_SESSION["iduser"]=$tableUser["id-user"];
		header("location/index.php?actionok=5");
}else{
	header("location:login.php?error=1");
};
}

include("../general/head.php");
?>
<body>
	<?php include("../general/nav.php");?>

	<h1>Connexion</h1>
	<!-- Message d'erreur si l'utilisateur fait une erreur dans sa saisie pour se connecter -->
	<?php if(isset($_GET["error"]));?>
	<p>Nom d'utilisateur ou mot de passe incorrect</p>
	<?php endif ?>

	<form action="login.php" method="post">
		<label for="name">Nom</label>
		<input type="text" name="name" id="name">
		<label for="password">Mot de passe</label>
		<input type="password" name="password" id="password">
		<button>Se connecter</button>
	</form>
</body>
</html>