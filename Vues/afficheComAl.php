<!DOCTYPE html>
<html>
<head>
    <title>Les commandes</title>
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
           
        </div>        </div>
    </nav>
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>


    <!--Bootstrap caroussel-->

<h1>Les informations sur les commandes</h1>



<br><br><br>
<span class="affichage">
<table>
<tr> <th>Numéro de la commande </th><th>Date de la commande </th> <th>Client</th> <th>Adresse</th> <th>Ville</th> <th>Code postale</th> <th>Type de livraison</th><th>Etat de la commande</th> <th></th>
<?php 
session_start();
include("connection.php");
$resultat = mysqli_query($co,"SELECT individu.nomInd, individu.prenomInd, commande.numCom, individu.adresse, individu.ville, individu.codePostal, commande.dateCom, commande.stateCom, commande.typeLiv FROM individu,commande WHERE nomInd <>'root' AND prenomInd <> 'root' AND commande.numInd = individu.numInd ORDER BY commande.dateCom DESC");

while($donnees = mysqli_fetch_assoc($resultat))
{
echo "<tr> ";
echo "<form method=\"POST\" action=\"..\Controleur\modif_state.php\">";
echo "<td>".$donnees['numCom']."</td>"."<td>".$donnees['dateCom']."</td>"."<td>".$donnees['nomInd']."   ".$donnees['prenomInd']."</td>"."<td>".$donnees['adresse']."</td>"."<td>".$donnees['ville']."</td>"."<td>".$donnees['codePostal']."</td>"."<td>".$donnees['typeLiv']."</td>"."<td>".$donnees['stateCom']."</td>";
echo "<td>";
echo "<SELECT  name=\"choixState\">
<OPTION Value=\"\" SELECTED></OPTION>
<OPTION Value=\"valide\">Valid&eacute;</OPTION>
<OPTION Value=\"preparation\">En préparation pour livraison</OPTION>
<OPTION Value=\"en cours\">En cours de livraison</OPTION>
<OPTION Value=\"fin\">Livr&eacute;e</OPTION>
</SELECT>";
echo "<input type=\"hidden\" name=\"nmcom\" value=\"".$donnees['numCom']."\"/>";
echo " <input type=\"submit\" value=\"Modifier l'&eacute;tat\" </td>";
echo "</form> </tr>";
}


?>
</table>
<br><br><br>
<h1>La quantité pour chaque article commandé : </h1>
<?php
 require_once("..\Modele\connection.php");
 $resultat=mysqli_query($co, "SELECT * FROM lignecommande") or die("erreur");
 if (!$resultat) {
  die( 'Requete invalide : ' . mysqli_error($co));
  }
  echo"<table class=\"liste\">";
  echo "<tr><th>Numéro de commande</th><th>Numéro de l'aliment</th><th>quantité demandé</th></tr>\n";
  while($row=mysqli_fetch_assoc($resultat)){
    echo"<tr><td>{$row['numCom']}</td><td>{$row['numAl']}</td><td>{$row['quantiteCommande']}</td></tr>\n";
  }
  echo "</table>";
 ?>
 <br><br><br>
 <h1>Enregistrer des livraisons</h1>
<?php
 require_once("..\Modele\connection.php");
 $resultat=mysqli_query($co, "SELECT * FROM livraison") or die("erreur");
 if (!$resultat) {
  die( 'Requete invalide : ' . mysqli_error($co));
  }
  echo"<table class=\"liste\">";
  echo "<tr><th>Numéro de la livraison</th><th>Numéro de la commande</th><th>Date de la livraison</th><th>type de la livraison</th></tr>\n";
  while($row=mysqli_fetch_assoc($resultat)){
    echo"<tr><td>{$row['numLiv']}</td><td>{$row['numCom']}</td><td>{$row['dateLiv']}</td><td>{$row['typeLiv']}</td></tr>\n";
  }
  echo "</table>";
 ?>
 <br>
 <form method="POST" action="..\Controleur\enregistrer_liv_traitement.php">
Numéro de la commande
<input type="text" name="num" required></br></br>
Date de la livraison prévue
<input type="text" name="date" placeholder="aaaa-mm-jj" required></br></br>
Type de livraison choisi
<INPUT type="radio" name="type" value="I"/> Individuel
<INPUT type="radio" name="type" value="G"/> Groupée
<br>
<br>
<button class="submit" name="Valider">Ajouter</button>
</form>




</span>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<style type="text/css">

  div{
   padding-top: 3em;
  }

body{
  padding-top: 1em;
  text-align: center;
}


  table {
  table-layout: fixed;
  width: 100%;
  border-collapse: collapse;
  
}

thead th:nth-child(1) {
  width: 30%;
}

thead th:nth-child(2) {
  width: 20%;
}

thead th:nth-child(3) {
  width: 15%;
}

thead th:nth-child(4) {
  width: 35%;
}

th, td {
  padding: 20px;
}
</style>

</body>
</html>
