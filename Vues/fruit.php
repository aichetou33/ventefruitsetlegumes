<?php
session_start();
if(!isset($_SESSION['panier'])){
  $_SESSION['panier'] = [];

}

?>

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
      .promo{
        color:red;
      }

    </style>
    <script>
      function add($num){
        var qte = document.getElementById($num).value;
        location.href = "../Controleur/add.php?num="+$num+"&qte="+qte;
      }
    </script>
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


<!--afficher la liste des fruits-->

<h1>Nos fruits et légumes</h1>
<?php
$host = "localhost"; // ou 127.0.0.1
  $user = "root";
  $bdd = "site_bdd"; // le nom de votre base de données
  $passwd = "root";
  $co = mysqli_connect($host , $user , $passwd, $bdd) or
  die("erreur de connexion");
  $today = date("Y-m-d");
  $sql="SELECT * FROM aliment";
  $result=mysqli_query($co,$sql) or die ("bad query");
  $num = 0;
  echo"<table class=\"liste\">";
  echo"<tr><th></th><th>Nom</th><th>Stock initial :</th><th>Prix unitaire :</th><th>Quantité</th><th></th></tr>";
  while($row=mysqli_fetch_assoc($result)){
    $price = $row['prixUnitaire'];
    $dato=$row['dateArrive'];
    $gap = abs(strtotime($today) - strtotime($dato));
    $years = floor($gap / (365*60*60*24));
    $months = floor(($gap - $years * 365*60*60*24) / (30*60*60*24));
    $days = floor(($gap - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    
    $num = $row['numAl'];
    echo"<tr><td><img width=100 height=100 src='imgAliment\\".$row['image']."'></td><td>{$row['nomAl']}</td><td>{$row['qteStock']}</td><td>{$price}€";
    if($days >= 3){
      $price = round($price - ($price * 0.05), 2);
      echo "<p class=\"promo\">{$row['nomAl']}";
      echo " est en promotion  -5% : {$price} €</p>";
      
    }
    echo"</td><td><input type=\"text\" id=$num value=\"1\"></td><td><button class='submit' onclick=\"add($num)\">Ajouter au panier</button></td></tr>\n";
      
  }
  echo "</table>";
  echo "<br>";
  
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  <!--<pre>
    <?php print_r($_SESSION); ?>
  </pre>-->
</style>
</body>
</html>