
<!-- A mettre sur toute les pages du projet, permet d'utiliser les superglobales $_SESSION -->
<?php
 session_start();
// <!-- connexion à la base de donnée -->

 $bdd=new PDO("mysql:host=localhost;dbname=projet_academie;port=3307;charset=utf8","root", "");

//  fonction pour retrait des caractères, espaces et mettre en minuscule
 function clean($input){
	return htmlspecialchars(trim(strtolower($input)));
 }
