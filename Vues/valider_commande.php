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
<link rel="stylesheet" type="text/css" href="valider.css">
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
  <form action="..\Controleur\redirection.php" method="post">
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
  <h1>Les détails de votre commande :</h1>
  <br>
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
  <?php echo "<tr><td>Total</td><td></td><td></td><td>$somme</td></tr>"; ?>
</table>
<br>

<h1>Vos coordonnées :</h1>
<br>
<table class="liste">
<tr><th>Nom</th><th>Prénom</th><th>Adresse</th><th>Ville</th><th>Code postal</th><th>Téléphone</th><th>Mail</th></tr>
<?php
$mail = $_SESSION['email'];
$host = "localhost"; // ou 127.0.0.1
    $user = "root";
    $bdd = "site_bdd"; // le nom de votre base de données
    $passwd = "root";
    $co = mysqli_connect($host , $user , $passwd, $bdd) or
    die("erreur de connexion");
    $sql="SELECT * FROM individu WHERE mail='$mail'";
    $result=mysqli_query($co,$sql) or die ("bad query");
    while($row=mysqli_fetch_assoc($result)){
        echo"<tr><td>{$row['nomInd']}</td><td>{$row['prenomInd']}</td><td>{$row['adresse']}</td><td>{$row['ville']}</td><td>{$row['codePostal']}</td><td>{$row['tel']}</td><td>{$row['mail']}</td></tr>\n";
    }
?>
</table>
<br>
<h1>Paiement :</h1>

           <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">Carte de crédit</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="debit">Carte de débit</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="paypal">Paypal</label>
            </div>
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Nom sur la carte</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">Le nom entier écrit sur la carte</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">numéro de la carte de crédit</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Date d'expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">Code à 3 chiffres</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
            <div class="col-md-3">
              <label for="cc-name" class="form-label">Type de livraison</label>
              <input type="text" class="form-control" name="type" placeholder="" required>
              <small class="text-muted">Si vous souhaitez faire une livraison avec un voisin mettez son nom et son prénom (si vous avez un groupe mettez celui du représentant) ou si non mettez "individuel"</small>
              <div class="invalid-feedback">
                type livraison is required
              </div>
            </div>
          </div>
      </div>
    </div>
    <br>
    <button type="submit">Valider la commande</button>
  </form>
<br>
<br>
</body>
</html>