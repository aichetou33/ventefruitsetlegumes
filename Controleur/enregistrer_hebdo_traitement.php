<?php
include('..\Modele\connection.php');
if(isset($_POST['abo']) && isset($_POST['date']))
{
	$abo = $_POST['abo'];
	$date = $_POST['date'];
	$resultat = mysqli_query($co, "INSERT INTO livraison_hebdo values(NULL,'$abo', '$date')");
if($resultat)		
{
echo "Votre livraison a bien été enregistré !<a href='..\Vues\index_producteur.php'> Cliquez ici</a> pour retourner au menu";
}
}
?>