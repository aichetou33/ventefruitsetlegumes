<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="logo.png" />
	<title>Détail du panier hebdomadaire</title>
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



<h1>Contenue du panier hebdomadaire de la semaine pour une personne </h1>
<form action="..\Controleur\InfoPanierHebdo_traitement.php" method="POST">

il contient :

         <?php
session_start();
include("..\Modele\connection.php");
$resultat = mysqli_query($co,"SELECT *  FROM aliment WHERE qteStock <> 0");
while($donnees = mysqli_fetch_assoc($resultat))
{

 echo " <input type=\"checkbox\" id=\"". $donnees['nomAl']."\" name=\"".$donnees['nomAl']."\">";
 //echo " <label for=\"" .$donnees['nomAliment']. "\">".$donnees['nomAliment']."</label> ";
 echo $donnees['nomAl'];
 echo " <input type=\"number\" id=\"". $donnees['numAl']."\" name=\"".$donnees['numAl']."\">";

 }
         ?>
 

<button class="submit" name="Valider">Envoyer</button>
<style type="text/css">
	div{
	 padding-top: 3em;
	}

body{
	padding-top: 1em;
	text-align: center;
}
</style>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>








