<?php
session_start();
require_once("..\Modele\connection.php");
if(!isset($_SESSION["email"])){
	echo "connectez vous! <a href='..\Vues\main.html'> Cliquez ici</a> pour retourner au menu";
}else{
	header('location: ..\Vues\valider_commande.php');
}
?>