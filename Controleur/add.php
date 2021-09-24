<?php
session_start();
$num = $_GET['num'];
$qte = $_GET['qte'];
$_SESSION['panier'][$num] = $qte;

header('location:../Vues/fruit.php')
?>
