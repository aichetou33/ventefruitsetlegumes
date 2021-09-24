<?php
include('..\Modele\connection.php');
if(isset($_POST['nom']) && isset($_POST['Imgaliment']) && isset($_POST['type']) && isset($_POST['qte']) && isset($_POST['prix']))
{

	$name = ucfirst($_POST['nom']);
	$qte = $_POST['qte'];
	$prix = $_POST['prix'];
	$type =$_POST['type'];
	$img = $_POST['Imgaliment'];
	$date = $_POST['date'];
	$resultat = mysqli_query($co, "INSERT INTO aliment (nomAl, qteStock, prixUnitaire, typeAl, image, dateArrive) values('$name', '$qte', '$prix','$type','$img', '$date')");
if($resultat)		
{
$_SESSION['nom'] = $_POST['nom'];
$_SESSION['prenom'] = $_POST['prenom'];
		$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = '..\Vues\afficheToutAl.php';
header("Location: http://$host$uri/$extra");
exit;
}
}
?>