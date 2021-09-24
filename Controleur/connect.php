<?php
session_start();
require_once("..\Modele\connection.php");
$mdp = $_POST["password"];
$mail = $_POST["email"];
$mdp = md5($mdp);
if(empty($mdp) || empty($mail)){
	echo "erreur il faut rentrer des données !";
}else{
	if(!preg_match("#^([\w\.-]+)@([\w\.-]+)(\.[a-z]{2,4})$#", $mail)){
		echo "erreur le mail est mal écrit";
		}else{
			
			$resultat=mysqli_query($co, "SELECT numInd FROM individu WHERE mail='$mail' AND mdp='$mdp'") or die("erreur mail inexistant");
			if(mysqli_num_rows($resultat)!=1){
				echo "Mot de passe ou mail incorrect réessayez";
			}else{
			if(preg_match("/^admin@site.com/",$mail)){
				header('Location: ..\Vues\index_producteur.php');
			}else{
				$_SESSION["email"] = $mail;
			$_SESSION["password"] = $mdp;
			header('Location: ..\Vues\detail_compte.php');
			}
			
			}
			
}
}

