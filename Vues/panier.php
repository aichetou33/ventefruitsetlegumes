<?php
session_start();
$panier = $_SESSION['panier'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Panier</title>
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

      .promo{
        color:red;
      }

    </style>
</head>
<body>
   <nav> 
    <!--menu-bar----------------------------------------->
    <div class="navigation">
        <!--logo------------>
        <a href="main.html" class="logo"><img src="logo.png"></a>
        <!--menu-icon------------->
       
        <!--menu----------------->
        <ul class="menu">
            <li><a href="fruit.php">Catalogue</a></li>
            <li><a href="hebdo.html" >Panier hebdo</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
        <!--right-menu----------->
        <div class="right-menu">
            <a href="compte.php" class="user">
                <i class="far fa-user"></i>
            </a>
            <a href="panier.php">
                <i class="fas fa-shopping-cart">
                </i>
            </a>
        </div>
        </div>
    </nav>
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
</head>
<body>
  <h1>Le panier :</h1>
  <table border="1" cellpadding="6" class="liste">
  <tr><th></th><th>Nom du produit</th><th>Quantité</th><th>Prix</th></tr>
  <?php $somme = 0; foreach ($panier as $num => $qte): ?>
  <?php
  $host = "localhost"; // ou 127.0.0.1
  $user = "root";
  $bdd = "site_bdd"; // le nom de votre base de données
  $passwd = "root";
  $co = mysqli_connect($host , $user , $passwd, $bdd) or
  die("erreur de connexion");
  $today = date("Y-m-d");
  $sql="SELECT * FROM aliment WHERE numAl=$num";
  $result=mysqli_query($co,$sql) or die ("bad query");
  while($row=mysqli_fetch_assoc($result)){
     $price2 = $row['prixUnitaire'];
    $dato=$row['dateArrive'];
    $gap = abs(strtotime($today) - strtotime($dato));
    $years = floor($gap / (365*60*60*24));
    $months = floor(($gap - $years * 365*60*60*24) / (30*60*60*24));
    $days = floor(($gap - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    if($days >= 3){
      $price2 = round($price2 - ($price2 * 0.05), 2);
      echo "<p class=\"promo\">{$row['nomAl']}";
      echo " est en promotion  -5% : {$price2} €</p>";
      
    }
    $price = $price2 * $qte;
    $somme = $somme + $price;
  echo"<tr><td><img width=100 height=100 src='imgAliment\\".$row['image']."'></td><td>{$row['nomAl']}</td><td>$qte</td><td>$price €</td></tr>\n";
  }
      ?>
  <?php endforeach; ?>
  <?php echo "<tr><td>Total</td><td></td><td></td><td>$somme €</td></tr>"; ?>
</table>
    <a href="../Controleur/vider.php">Vider le panier</a>
    <br>
    <a href="../Controleur/commande.php">Valider le panier</a>
  </div>
</table>
</body>
</html>