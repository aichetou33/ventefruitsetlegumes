<!DOCTYPE html>
<html>
<head>
	<title>Les livraisons Hebdomadaires</title>
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

<span class="affichage">
    <h1>Les informations sur les abonnements hebdomadaires</h1>
<table>
<tr> <th>Numéro abonnement</th> <th>Nom</th> <th>Prenom</th> <th>Adresse</th> <th>Ville</th> <th>Code postale</th> <th>Numéro de téléphone</th> <th>Adresse e-mail</th><th>Jour de livraison</th>
</tr>
<?php
session_start();
include("..\Modele\connection.php");
$resultat = mysqli_query($co,"SELECT *  FROM individu, hebdomadaire WHERE nomInd <>'root' AND prenomInd <> 'root' AND individu.numInd = hebdomadaire.numInd");

while($donnees = mysqli_fetch_assoc($resultat))
{
echo "<tr>";
echo "<td>".$donnees['numHebdo']."</td>"."<td>".$donnees['nomInd']."</td>"."<td>".$donnees['prenomInd']."</td>"."<td>".$donnees['adresse']."</td>"."<td>".$donnees['ville']."</td>"."<td>".$donnees['codePostal']."</td>"."<td>".$donnees['tel']."</td>"."<td>".$donnees['mail']."</td>"."<td>".$donnees['jour']."</td>";
echo "</tr>";
}


?>
</table>
</span>
<h1>Enregistrer des livraisons</h1>
 <form method="POST" action="..\Controleur\enregistrer_hebdo_traitement.php">
Numéro de l'abonnement
<input type="text" name="abo" required></br></br>
Date exacte de la livraison
<input type="text" name="date" placeholder="aaaa-mm-jj" required></br></br>
</br>
<button class="submit" name="Valider">Ajouter</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


<style type="text/css">

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