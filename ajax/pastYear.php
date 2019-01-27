<?php
//Inclure le ficher reuquete.php
include('../requete.php');
//Si la variable $_POST['annee'] existe
if(isset($_POST['annee'])){//Début du if
  //Envoie avec la méthode echo le numéro de l'année en appellant la méthode php
  echo getPastYear($_POST['annee']);
  //Fin du if
}else{//Début du else
  //Si le if ne marche pas return echec
  echo "echec";
}//Fin du else
?>
