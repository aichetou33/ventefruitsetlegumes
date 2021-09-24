<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Fruits&Légumes</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style_css.css">
<style>
      .liste td, .liste th{
        border: 1px solid gray;
        padding: 6px;
      }

      .liste input{
        text-align: right;
        width: 30px;
      }

    </style>
</head>
<body>
	 <nav>    
    <!--Barre de navigation----------------------------------------->
    <div class="navigation">
        <a href="main.html" class="logo"><img src="logo.png"></a>
        <ul class="menu">
            <li><a href="fruit.php">Catalogue</a></li>
            <li><a href="hebdo.html" >Panier hebdo</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
        <div class="right-menu">
           <a href="..\Controleur\disconnect.php" class="user">
               <img src="exit_icon.svg"  alt="Se déconnecter" width="19.2" height="29" />
            </a>
            <a href="panier.php">
                <i class="fas fa-shopping-cart">
                </i>
            </a>
        </div>
        </div>
    </nav>
	<script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <h1>Vos informations :</h1>
<?php
session_start();
//$nom = $_SESSION['nom'];
//$prenom = $_SESSION['prenom'];
$mail = $_SESSION['email'];
//$rue = $_SESSION["rue"];
//$cp = $_SESSION["cp"];
//$ville = $_SESSION["ville"];
//$tel = $_SESSION["tel"];
//echo "votre prénom $prenom";
//echo "votre nom $nom";
$host = "localhost"; // ou 127.0.0.1
    $user = "root";
    $bdd = "site_bdd"; // le nom de votre base de données
    $passwd = "root";
    $co = mysqli_connect($host , $user , $passwd, $bdd) or
    die("erreur de connexion");
    $sql="SELECT * FROM individu WHERE mail='$mail'";
    $result=mysqli_query($co,$sql) or die ("bad query");
    echo"<table class=\"liste\">";
    echo "<tr><td>nom</td><td>prenom</td><td>adresse</td><td>ville</td><td>code Postal</td><td>téléphone</td><td>mail</td></tr>\n";
    while($row=mysqli_fetch_assoc($result)){
        echo"<tr><td>{$row['nomInd']}</td><td>{$row['prenomInd']}</td><td>{$row['adresse']}</td><td>{$row['ville']}</td><td>{$row['codePostal']}</td><td>{$row['tel']}</td><td>{$row['mail']}</td></tr>\n";
        echo "</table>";
        $numInd = $row['numInd'];
    }
//echo "votre adresse $rue";
//echo "votre ville $ville";
//echo "votre cp $cp";
//echo "votre tel $tel";
?>
<br>
<h1>Vos commandes :</h1>
<?php
 require_once("..\Modele\connection.php");
 $resultat=mysqli_query($co, "SELECT * FROM commande WHERE numInd='$numInd'") or die("erreur");
 if (!$resultat) {
  die( 'Requete invalide : ' . mysqli_error($co));
  }
  echo"<table class=\"liste\">";
  echo "<tr><th>Numéro de commande</th><th>Type de livraison</th><th>Date commande</th><th>Etat</th></tr>\n";
  while($row=mysqli_fetch_assoc($resultat)){
    echo"<tr><td>{$row['numCom']}</td><td>{$row['typeLiv']}</td><td>{$row['dateCom']}</td><td>{$row['stateCom']}</td></tr>\n";
  }
  echo "</table>";
 ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


</body>
</html>