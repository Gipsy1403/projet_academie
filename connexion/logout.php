<?php
 session_start();

 
  $bdd=new PDO("mysql:host=localhost;dbname=projet_academie;port=3307;charset=utf8","root", "");
session_unset();
session_destroy();
header("location:/projet_academie/index.php");
?>