<?php
$host = "localhost"; // ou 127.0.0.1
$user = "root";
$bdd = "site_bdd"; // le nom de votre base de données
$passwd = "root";
$co = mysqli_connect($host , $user , $passwd, $bdd) or
die("erreur de connexion");
?>
