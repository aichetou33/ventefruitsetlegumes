<?php
include('..\Modele\connection.php');
if(isset($_POST['num']) && isset($_POST['date']) && isset($_POST['type']))
{
	$num = $_POST['num'];
	$date = $_POST['date'];
	$type = $_POST['type'];
	$resultat = mysqli_query($co, "INSERT INTO livraison values(NULL,'$num', '$date', '$type')");
	$resultat2 =  mysqli_query($co, "UPDATE commande SET stateCom='valide' WHERE numCom='$num'");
    if(!$resultat && !$resultat2){
    	die( 'Requete invalide : ' . mysqli_error($co));
    
    }else{
    	$_SESSION['nom'] = $_POST['nom'];
$_SESSION['prenom'] = $_POST['prenom'];
		$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = '..\Vues\afficheComAl.php';
header("Location: http://$host$uri/$extra"); }
}
?>