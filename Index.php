<?php
// include("general/function.php");
session_start();
// <!-- connexion à la base de donnée -->

 $bdd=new PDO("mysql:host=localhost;dbname=projet_academie;port=3307;charset=utf8","root", "");

//  fonction pour retrait des caractères, espaces et mettre en minuscule
 function clean($input){
	return htmlspecialchars(trim(strtolower($input)));
 }


// je vérifie si les champs ont été saisis
if(isset($_POST["name"])&&isset($_POST["password"])){
	$name=clean($_POST["name"]);
	$password=$_POST["password"];


$requestUser=$bdd->prepare("SELECT *
 						FROM user
						WHERE name=:name");
$requestUser->execute([
		"name"=> $name,
		]);

$tableUser=$requestUser->fetch();



if($tableUser && password_verify($password,$tableUser["password"])){
	// l'identifiant de l'utilisateur est gardé grace à la superglobale $_SESSION
	$_SESSION["iduser"]=$tableUser["id_user"];
		header("location:index.php?actionok=5");
}else{
	header("location:index.php?error=1");
}
}

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


<h2>Connexion</h2>
<!-- Message d'erreur si l'utilisateur fait une erreur dans sa saisie pour se connecter -->
<?php if(isset($_GET["error"])):
	echo "<p class='error'>Nom d'utilisateur ou mot de passe incorrect</p>";
	?>
<?php endif;?>

<form action="index.php" method="post">
	<label for="name">Nom</label>
	<input type="text" name="name" id="name">
	<label for="password">Mot de passe</label>
	<input type="password" name="password" id="password">
	<button>Se connecter</button>
</form>

<h2>Toujours pas inscrit ?</h2>
<a href="/projet_academie/connexion/inscription.php">Inscrivez-vous</a>

</body>

</html>