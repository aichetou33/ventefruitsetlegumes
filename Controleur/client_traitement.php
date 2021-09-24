<?php

if (isset($_POST['choix'])) {
	echo $_POST['choix'];

if($_POST['choix']=='All')
{
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = '..\Vues\infoClient.php';
	header("Location: http://$host$uri/$extra");
	exit;
}
if($_POST['choix']=='hebdomadaire')
{
	
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = '..\Vues\afficheClientHebd.php';
	header("Location: http://$host$uri/$extra");
	exit;
}



}


?>