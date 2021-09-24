<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="logo.png" />
	<title>Ajouter un fruit ou l&eacute;gume</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style_css.css">

</head>
<body>


 <nav> 
          
    <!--menu-bar----------------------------------------->
    <div class="navigation">
        <!--logo------------>
        <a href="index_producteur.php" class="logo"><img src="logo.png"></a>
        <!--menu-icon------------->
       
      <!--menu----------------->
        <ul class="menu">
            <li><a href="afficheComAl.php">Commande</a></li>
            <li><a href="InfoLivrHebdo.php">Livraison hebdomadaire</a></li>
            <li><a href="InfoPanierHebdo.php" >Panier hebdomadaire</a></li>
            <li><a href="infoClient.php" >Client</a></li>
            <li><a href="afficheToutAl.php" >Aliment</a></li>
            <li><a href="ajout_fruit_legume.php">Ajouter un fruit ou l&eacute;gume</a></li>
        </ul>
         <!--right-menu----------->
        <div class="right-menu">
            <a href="..\Controleur\disconnect.php" class="user">
               <img src="exit_icon.svg"  alt="Se déconnecter" width="19.2" height="29" />
            </a>
           
        </div>
       
        </div>
    </nav>
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>


    <!--Bootstrap caroussel-->

<style type="text/css">
	div{
	 padding-top: 3em;
	}

body{
	padding-top: 1em;
	text-align: center;
}
</style>

<form method="POST" action="..\Controleur\ajout_fruit_legume_traitement.php">
Nom
<input type="text" name="nom" required></br></br>
Type :
<INPUT type="radio" name="type" value="fruit"/> Fruit 
<INPUT type="radio" name="type" value="legume"/> L&eacute;gume
</br></br>
Quantit&eacute; en stock
<input type="number" name="qte" required>
<br><br>
Prix de vente
<input type="text" name="prix" required></br></br>
Image 
<input type="file" id="Imgaliment" name="Imgaliment" accept="image/png, image/jpeg" required>
Date d'arrivé au stock
<input type="text" name="date" required placeholder="aaaa-mm-jj" ></br></br>
</br></br>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


<button class="submit" name="Valider">Enregistrer</button>
</body>
</html>








