<?php
session_start();
require_once("..\Modele\connection.php");
$panier = $_SESSION['panier'];
$mail = $_SESSION['email'];
$type = $_POST['type'];
$date = date('Y-m-d');
$sql="SELECT * FROM individu WHERE mail='$mail'";
$result=mysqli_query($co,$sql) or die ("bad query1");
while($row=mysqli_fetch_assoc($result)){
        $numInd = $row['numInd'];
    }
$sql2="INSERT INTO commande VALUES (NULL, '$numInd', '$type' ,'$date', 'attente')";
$result2=mysqli_query($co,$sql2) or die ("bad query2");
if (!$result2) {
	die( 'Requete invalide : ' . mysqli_error($co));
	}
$sql3="SELECT * FROM commande WHERE numInd='$numInd'";
$result3=mysqli_query($co,$sql3) or die ("bad query3");
while($row=mysqli_fetch_assoc($result3)){
        $numCom = $row['numCom'];
    }
    echo $numCom;
    foreach ($panier as $num => $qte):
    	$requete="INSERT INTO lignecommande VALUES (NULL,'$numCom', '$num', '$qte')";
		$resultat=mysqli_query($co,$requete) or die ("bad query4");
		if (!$resultat) {
				die( 'Requete invalide : ' . mysqli_error($co));
			}
	endforeach;
	echo "Commande réussie! Vous aurez tout les détails dans un mail <a href='..\Vues\main.html'> Cliquez ici</a> pour retourner au menu";

?>