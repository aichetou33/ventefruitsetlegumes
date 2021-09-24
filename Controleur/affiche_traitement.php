<?php

if (isset($_POST['choix'])) {
	echo $_POST['choix'];

if($_POST['choix']=='All')
{
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = '..\Vues\afficheToutAl.php';
	header("Location: http://$host$uri/$extra");
	exit;
}
if($_POST['choix']=='fruits')
{
	
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = '..\Vues\afficheFruit.php';
	header("Location: http://$host$uri/$extra");
	exit;
}

if($_POST['choix']=='legumes')
{
	
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = '..\Vues\afficheLegume.php';
	header("Location: http://$host$uri/$extra");
	exit;
}

}


?>