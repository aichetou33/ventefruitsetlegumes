<!DOCTYPE html>
<html>
<head>
	<title>Les fruits et l&eacute;gumes</title>
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

<h1>Les fruits et l&eacute;gumes disponibles</h1>
<form method="POST" action="..\Controleur\affiche_traitement.php">
<SELECT  name="choix">

<OPTION Value="All" >TOUS</OPTION>
<OPTION Value="fruits"SELECTED>Fruits</OPTION>
<OPTION Value="legumes">l&eacute;gume</OPTION>
</SELECT>

<button class="submit" name="Valider">Trier</button>
</form>
<br><br><br>
<span class="affichage">
<?php
session_start();
include("..\Modele\connection.php");
$resultat = mysqli_query($co,"SELECT *  FROM aliment WHERE typeAl='fruit' AND qteStock <> 0");
while($donnees = mysqli_fetch_assoc($resultat))
{
 
echo "<form method=\"POST\" action=\"..\Controleur\modif_stock.php\" >";
echo "<figure class=\"figure\">";
echo "<img src=\"imgAliment\\".$donnees['image'];
echo "\" class=\"rounded float-left\" width=\"140\" height=\"140\" alt=\"\">";
echo "<figcaption class=\"figure-caption\">".$donnees['nomAl']."  ".$donnees['prixUnitaire']."&euro; <br>".$donnees['qteStock']." en stock";
echo "<input type=\"hidden\" name=\"ali\" value=\"".$donnees['nomAl']."\"/>";
echo "<input type=\"number\" name=\"qte\"/>";
echo "<input type=\"submit\" value=\" Modifier les quantités\" name=\"modif\"/>";
echo "</figcaption> </figure> </form>";

    
  }


?>
</span>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


<style type="text/css">

.affichage{
    display: inline-flex;
}
	body{
	padding : 1em:}
	.card{
		
		text-align: center;
		padding: 1em;
		height: 300px;
		 padding-top: 1em;
	}
	.affichage.div
	{margin:3em;
		text-align: center;}

   
</style>

</style>
</body>
</html>