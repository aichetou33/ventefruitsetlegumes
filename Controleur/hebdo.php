<?php
session_start();
require_once("..\Modele\connection.php");
if(!isset($_SESSION["email"])){
	echo "connectez vous! <a href='..\Vues\main.html'> Cliquez ici</a> pour retourner au menu";
}else{
	$mail = $_SESSION["email"];
	$resultat=mysqli_query($co, "SELECT numInd FROM individu WHERE mail='$mail'") or die("erreur mail inexistant");
	if(mysqli_num_rows($resultat)!=1){
				echo "Problème avec votre compte contactez l'administrateur";
			}else{
			while ($row = mysqli_fetch_assoc($resultat)) {
    			$numInd = $row['numInd'];
			}
			$resultat2=mysqli_query($co, "SELECT * FROM hebdomadaire WHERE numInd='$numInd'") or die("erreur mail inexistant");
			if (mysqli_num_rows($resultat2)==1) {
				echo $numInd;
				echo $mail;
			die( 'Vous etes déjà abonné !');

			}
			$nbPers = $_POST["nbPers"];
			$limit = $_POST["limit"];
			$jour = $_POST["jour"];
			$requete="INSERT INTO hebdomadaire VALUES (NULL, '$numInd', '$nbPers', '$limit', '$jour','null')";
			$result=mysqli_query( $co, $requete);
			if (!$result) {
			die( 'Requete invalide : ' . mysqli_error($co));
			}
			}
	echo "Vous êtes abonné vous recevrez les détails dans votre mail chaque semaine! <a href='..\Vues\main.html'> Cliquez ici</a> pour retourner au menu";
}

