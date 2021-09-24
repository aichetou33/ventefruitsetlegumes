<?php
session_start();
require_once("..\Modele\connection.php");
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$mail = $_POST["email"];
$mdp = $_POST["password"];


if(empty($mdp) || empty($mail) || empty($nom) || empty($prenom)){
	echo "erreur il faut rentrer des données !";
}else{
	if(!preg_match("#^([\w\.-]+)@([\w\.-]+)(\.[a-z]{2,4})$#", $mail)){
		echo "erreur le mail est mal écrit";
		}else{
			$_SESSION["nom"] = $nom;
			$_SESSION["prenom"] = $prenom;
			$_SESSION["email"] = $mail;
			$_SESSION["password"] = $mdp;
			header('Location: ..\Vues\inscrire.html');
			}
			
}
