<?php
//Inclure le ficher reuquete.php
include('../requete.php');
//Si la variable $_POST['mois'] et $_POST['annee'] existe
if(isset($_POST['mois']) && isset($_POST['annee'])){//Début du if
  //Envoie avec la méthode echo le tableau de donnée appellant la méthode php
  echo generateBodyTable($_POST['mois'], $_POST['annee']);
  //Fin du if
}else{//Début du else
  //Return echec si le if ne marche pas
  echo "echec";
}//Fin du else
 ?>
