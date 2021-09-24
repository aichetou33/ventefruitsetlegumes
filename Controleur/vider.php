<?php
session_start();

$_SESSION['panier'] = [];

header('location:../Vues/panier.php');
?>