<?php
include('../requete.php');
/*
generateBodyTable($_POST['mois'], $_POST['annee']);
$mois = $_POST['mois'];
$annee = $_POST['annee'];
*/
if(isset($_POST['mois']) && isset($_POST['annee'])){
  echo "success";
}else{
  echo "echec";
}
 ?>
