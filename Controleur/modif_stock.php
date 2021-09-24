<?php
session_start();
include("..\Modele\connection.php");
if (isset($_POST['qte']) && isset($_POST['ali']) && !empty($_POST['qte'])) {
$q =$_POST['qte'];
$a = $_POST['ali'];
$resultat = mysqli_query($co,"UPDATE aliment  SET qteStock = \"$q\" WHERE nomAl = \"$a\"");
	if($resultat)
	{
		$resulta = mysqli_query($co,"UPDATE aliment  SET dateCom = SYSDATE() WHERE nomAl = \"$a\"");
		}
}
header ("Location: $_SERVER[HTTP_REFERER]" );
exit;

?>