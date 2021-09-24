<?php
session_start();
include("..\Modele\connection.php");
if (isset($_POST['choixState'])) {
	echo $_POST['choixState'];

if($_POST['choixState']=='valide' && isset($_POST['nmcom']))
{
$a="Valider";
$q = $_POST['nmcom'];
$resultat = mysqli_query($co,"UPDATE commande  SET stateCom = \"$a\" WHERE numCom = \"$q\"");	
}

if($_POST['choixState']=='preparation')
{
	$a="En préparation pour livraison";
$q = $_POST['nmcom'];
$resultat = mysqli_query($co,"UPDATE commande  SET stateCom = \"$a\" WHERE numCom = \"$q\"");	
}

if($_POST['choixState']=='en cours')
{
	$a="En cours de livraison";
$q = $_POST['nmcom'];
$resultat = mysqli_query($co,"UPDATE commande  SET stateCom = \"$a\" WHERE numCom = \"$q\"");	
}

if($_POST['choixState']=='fin')
{
	$a = "Livr&eacute;e";
	$q = $_POST['nmcom'];
$resultat = mysqli_query($co,"UPDATE commande  SET stateCom = \"$a\" WHERE numCom = \"$q\"");	
}


}
header ("Location: $_SERVER[HTTP_REFERER]" );
exit;

?>