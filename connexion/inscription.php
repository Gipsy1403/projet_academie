<?php

 $bdd=new PDO("mysql:host=localhost;dbname=projet_academie;port=3307;charset=utf8","root", "");
 session_start();
 function clean($input){
	return htmlspecialchars(trim(strtolower($input)));
 }
// include("../general/function.php");
// je vérifie si les champs ont été saisis
if(isset($_POST["name"])&&isset($_POST["password"])&&isset($_POST["passwordConfirm"])){
	$name=clean($_POST["name"]);
	$password=htmlspecialchars($_POST["password"]);
	$passwordConfirm=htmlspecialchars($_POST["passwordConfirm"]);
	$id_role=1;

$requestUser=$bdd->prepare("SELECT COUNT(*) as usernb
 						FROM user
						WHERE name=:name");
$requestUser->execute([
			"name"=>$name,
]);

$tableUser=$requestUser->fetch();

if($tableUser["usernb"]>=1){
	header("location:inscription.php?error=2");
}else{
	if($password==$passwordConfirm){
		$passwordCrypt=password_hash($password,PASSWORD_BCRYPT);
		$request=$bdd->prepare("INSERT INTO user(name,password,id_role)
							VALUES (:name, :password, :id_role)");
		$request->execute([
			"name"=>$name,
			"password"=>$passwordCrypt,
			"id_role"=>$id_role
		]);
		header("location:/projet_academie/index.php?actionok=4");

	}else{
		header("location:inscription.php?error=1");
	}
}
}

include("../general/head.php");
?>
<body>
	<?php include("../general/nav.php");?>
	<h1>Inscription</h1>
	<?php if(isset($_GET["error"])){ 
		$error= [
			1 => "Vos mots de passe ne correspondent pas.",
			2 => "Ce nom d'utilisateur existe déjà."
			];
		if (isset($_GET["error"]) && isset($error[$_GET["error"]])) {
		echo "<p class='error'>" . htmlspecialchars($error[$_GET["error"]]) . "</p>";
		}

	}?>
<form action="inscription.php" method="post">
	<label for="name">Nom</label>
	<input type="text" name="name" id="name">
	<label for="password">Mot de passe</label>
	<input type="password" name="password" id="password">
	<label for="passwordConfirm">Mot de passe à confirmer</label>
	<input type="password" name="passwordConfirm" id="passwordConfirm">
	<button>S'inscrire</button>
</form>
</body>

</html>