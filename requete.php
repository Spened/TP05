<?php
function connexion(){
  try {
    $user = 'root';
    $password = 'root';
    $db = 'td05';
    $host = 'localhost';
    $port = 3307;

    $link = mysqli_init();
    $success = mysqli_real_connect(
       $link,
       $host,
       $user,
       $password,
       $db,
       $port
    );

    return $link;
  } catch (\Exception $e) {
    echo "Erreur de connexion à la base de donnée";
  }
}

// Génère tout les mois
function generateWeeks(){
  $lesMois = array('Janvier', 'Fevrier', 'Mars', 'Arvil', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Novembre', 'Octobre', 'Decembre');
  $str = "";
  $cptMois = 0;
  while (COUNT($lesMois) > $cptMois) {
    $cptRealMois = $cptMois+1;
    $str .=  "<div class='col-sm-1 mois' onclick='changeMonth(".$cptRealMois.")'><p>".$lesMois[$cptMois]."</p></div>";
    $cptMois ++;
  }
  return $str;
}

function getChiffreAffaire($semaine, $annee){
  $valeurs = "";
  $con = connexion();
  $chiffreAffaire = 0;
  $sql = "SELECT SUM(puttc_produit*qte_lv) AS ChiffreAffaire FROM vente V INNER JOIN ligne_vente LV ON V.id_vente = LV.id_vente INNER JOIN produit P ON P.id_produit = LV.id_produit WHERE WEEK(V.date_vente)=".$semaine." AND YEAR(V.date_vente) =".$annee;
  $valeurs = mysqli_query($con, $sql);
  if(mysqli_num_rows($valeurs)>0){
    while($row = mysqli_fetch_assoc($valeurs)){
      $chiffreAffaire = $row['ChiffreAffaire'];
    }
  }
  return $chiffreAffaire;
  $con->fclose();
}

function getNbClient($semaine, $annee){
  $valeurs = "";
  $con = connexion();
  $nbClient = 0;
  $sql = "SELECT COUNT(id_vente) AS nbClient FROM VENTE WHERE WEEK(date_vente) = ".$semaine." AND YEAR(date_vente) = ".$annee;
  $valeurs = mysqli_query($con, $sql);
  if(mysqli_num_rows($valeurs)>0){
    while($row = mysqli_fetch_assoc($valeurs)){
      $nbClient = $row['nbClient'];
    }
  }
  return $nbClient;
  $con->fclose();
}


function getSemaine($mois, $annee){
  $valeurs = "";
  $con = connexion();
  $week = array();
  $sql="SELECT date_vente FROM VENTE WHERE MONTH(date_vente) = ".$mois." AND YEAR(date_vente) = ".$annee;
  $valeurs = mysqli_query($con, $sql);
  if(mysqli_num_rows($valeurs)>0){
    while($row = mysqli_fetch_assoc($valeurs)){
      $semaine = date("W", strtotime($row['date_vente']));
      if(!isset($week[$semaine])){
        $week[] = $semaine;
      }
    }
    return $week;
  }
  $con->fclose();
}

function generateBodyTable($mois, $annee){
  $week = getSemaine($mois, $annee);
  $cptWeek = 0;
    $str ="<tbody id='tbody'>";
  while(COUNT($week) > $cptWeek){
    $cptClient = $cptWeek +1;
    $nbClient = getNbClient($cptClient, 2016);
    $chiffreAffaire = getChiffreAffaire($cptClient, 2016);
    $str .= "<tr>";
    $str .="<td> S".$week[$cptWeek]."</td>";
    $str.="<td>".$nbClient[0]."</td>";
    $str.="<td>".ROUND($chiffreAffaire / $nbClient, 1)." €</td>";
    $str.="<td align=right>".ROUND($chiffreAffaire, 1)." €</td>";
    $str.="</tr>";
    $cptWeek ++;
  }
  $str .="</tbody>";
  return $str;
}
 ?>
