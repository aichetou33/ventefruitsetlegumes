<?php
session_start();
require_once("..\Modele\connection.php");
$rue = $_POST["rue"];
$cp = $_POST["cp"];
$ville = $_POST["ville"];
$tel = $_POST["tel"];
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
$mail = $_SESSION['email'];
$mdp = $_SESSION['password'];

if(empty($rue) || empty($cp) || empty($ville) || empty($tel)){
	echo "erreur il faut rentrer des données !";
}else{
			$_SESSION["rue"] = $rue;
			$_SESSION["cp"] = $cp;
			$_SESSION["ville"] = $ville;
			$_SESSION["tel"] = $tel;
			$mdp = md5($mdp);
			$requete="INSERT INTO individu VALUES (NULL, '$nom', '$prenom', '$rue', '$ville', '$cp', '$tel','$mail','$mdp')";
			$result=mysqli_query( $co, $requete);
			if (!$result) {
				die( 'Requete invalide : ' . mysqli_error($co));
			}

			echo "Votre compte a bien été créer<a href='..\Vues\main.html'> Cliquez ici</a> pour retourner au menu";
}