<?php

include("../general/function.php");
// je vérifie si les champs ont été saisis
if(isset($_POST["name"])&&isset($_POST["password"])&&isset($_POST["passwordConfirm"])){
	$name=clean($_POST["name"]);
	$password=htmlspecialchars($_POST["password"]);
	$passwordConfirm=htmlspecialchars($_POST["passwordConfirm"]);

 $requestUser=$bdd->prepare("SELECT count (*) as usernb
 						FROM user
						WHERE name= ?");
$requestUser->execute(array($name));

$tableUser=$requestUser->fetch();
if($tableUser["usernb"]>=1){
	header("location:inscription.php?error=2");
}else{
	if($password==$passwordConfirm){
		$passwordCrypt=password_hash($password,PASSWORD_BCRYPT);
		$request=$bdd->prepare("INSERT INTO user (name,password)
							VALUE (:name, :password");
		$request->execute([
			"name"=>$name,
			"password"=>$passwordCrypt
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
	<?php if(isset($_GET["error"])){ ?>
		<?php switch($_GET["error"]){
			case 1:
				echo "<p class='error'>Bos mots de passe ne correspondent pas</p>";
				break;
			case 2:
				echo "<p class='error'>Ce nom d'utilisateur existe déjà</p>";
				break;
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