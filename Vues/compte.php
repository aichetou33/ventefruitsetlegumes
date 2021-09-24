<?php
session_start();
if(isset($_SESSION['email'])){
  header("location:detail_compte.php");
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Fruits&Légumes</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


<link rel="stylesheet" type="text/css" href="style_css.css">
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


  <!--form-->
  <form method="post" action="..\Controleur\connect.php">
<div class="cont">
    <div class="form sign-in">
      <h2>Se connecter</h2>
      <label>
        <span>Adresse email</span>
        <input type="email" name="email" required>
      </label>
      <label>
        <span>Mot de passe</span>
        <input type="password" name="password" required>
      </label>
      <button class="submit">Se connecter</button>
      </form>
    </div>


    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>Pas de compte?</h2>
          <p>Créez un compte pour passer des commandes</p>
        </div>
        <div class="img-text m-in">
          <h2>Vous avez un compte?</h2>
          <p>Si vous avez déjà un compte veuillez vous connecter</p>
        </div>
        <div class="img-btn">
          <span class="m-up">S'inscrire</span>
          <span class="m-in">Connexion</span>
        </div>
      </div>
      <div class="form sign-up">
        <form method="post"action="..\Controleur\inscrire.php" required>
        <h2>S'inscrire</h2>
        <label>
          <span>Nom</span>
          <input type="text" name="nom" required>
        </label>
        <label>
          <span>Prénom</span>
          <input type="text" name="prenom" required>
        </label>
        <label>
          <span>Email</span>
          <input type="email" name="email" required>
        </label>
        <label>
          <span>Mot de passe</span>
          <input type="password" name="password" required>
        </label>
        
        <button class="submit">S'inscrire</button>
      </form>
      </div>
    </div>
  </div>
<script type="text/javascript" src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>