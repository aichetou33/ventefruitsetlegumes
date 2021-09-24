<?php
session_start();
include("..\Modele\connection.php");
$resultat = mysqli_query($co,"SELECT *  FROM aliment WHERE qteStock <> 0");
$msg = "<h5>Le panier de cette semaine contient </h5>";

while($donnees = mysqli_fetch_assoc($resultat))
{
$d =  $donnees['numAl'];
$a = $donnees['nomAl'];
if(isset($_POST[$a])) {
	
	echo $a."   ";
	
	if( isset($_POST[$d]) && !empty($_POST[$d]))
	{echo $_POST[$d]."    ";
	
	 $msg = $msg."<br>".$_POST[$d]." ".$a; 
echo $msg;
	
}}
}

if($msg != "<h5>Le panier de cette semaine contient </h5>")
{
	echo "string";
	$res = mysqli_query($co, "UPDATE hebdomadaire SET description = \"$msg\"");
		if($res){
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '..\Vues\index_producteur.php';
		header("Location: http://$host$uri/$extra");
		exit;
		}
}
else
{

		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = '..\Vues\infoPanierHebdo_err.php';
		header("Location: http://$host$uri/$extra");
		exit;
}


?>