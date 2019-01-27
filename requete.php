<?php
//Fonction de connexion à la base de donnée
function connexion(){
  //try catch pour tester la connexion et si elle ne marche pas retourner un message d'erreur
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
    //return la connexion
    return $link;
    //Si erreur
  } catch (\Exception $e) {
    echo "Erreur de connexion à la base de donnée";
  }
}

// Génère tout les mois
function generateMonth(){
  //tableau pour stocker tout les mois existant
  $lesMois = array('Janvier', 'Fevrier', 'Mars', 'Arvil', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Novembre', 'Octobre', 'Decembre');
  //Purge de la variable $str
  $str = "";
  //Purge de la variable $cptMois
  $cptMois = 0;
  //Boucle pour faire tout les mois correctement
  while (COUNT($lesMois) > $cptMois) {
    //Mettre mon compteur sur une base 1 et non 0
    $cptRealMois = $cptMois+1;
    //Création des div pour les mois avec un onClick qui permet d'appeller la méthode Ajax avec le bon paramètre
    $str .=  "<div class='col-sm-1 mois' onclick='changeMonth(".$cptRealMois.")'><p>".$lesMois[$cptMois]."</p></div>";
    //incrémentation du compteur
    $cptMois ++;
  }
  //return tout les mois
  return $str;
}

//Fonction pour récupérer les chiffres d'affaire de chaque semaine
function getChiffreAffaire($semaine, $annee){
  //Purge de la variable $valeurs
  $valeurs = "";
  $con = connexion();
  //Purge de la variable $chiffreAffaire
  $chiffreAffaire = 0;
  //Requete sql
  $sql = "SELECT SUM(puttc_produit*qte_lv) AS ChiffreAffaire FROM vente V INNER JOIN ligne_vente LV ON V.id_vente = LV.id_vente INNER JOIN produit P ON P.id_produit = LV.id_produit WHERE WEEK(V.date_vente)=".$semaine." AND YEAR(V.date_vente) =".$annee;
  //Execution de la requete sql
  $valeurs = mysqli_query($con, $sql);
  //Si la variable supérieur à zero
  if(mysqli_num_rows($valeurs)>0){//Début du if
    //Ajout dans un tableau assosiatif $row
    while($row = mysqli_fetch_assoc($valeurs)){//Début boucle
      //Récupération de la valeur
      $chiffreAffaire = $row['ChiffreAffaire'];
    }//Fin du boucle
  }//Fin if
  //return le résultat
  return $chiffreAffaire;
  //Fermeture de la connexion
  $con->fclose();
}

//Fonction pour savoir combien de client on commandé dans la semaine
function getNbClient($semaine, $annee){
  //Purge de la variable $valeurs
  $valeurs = "";
  $con = connexion();
  //Purge de la variable $nbClient
  $nbClient = 0;
  //Requete sql
  $sql = "SELECT COUNT(id_vente) AS nbClient FROM VENTE WHERE WEEK(date_vente) = ".$semaine." AND YEAR(date_vente) = ".$annee;
  //Execution de la requete sql
  $valeurs = mysqli_query($con, $sql);
  //Si la variable supérieur à zero
  if(mysqli_num_rows($valeurs)>0){
    //Ajout dans un tableau assosiatif $row
    while($row = mysqli_fetch_assoc($valeurs)){//Début boucle
      //Récupère le resultat
      $nbClient = $row['nbClient'];
    }//Fin boucle
  }
  //Return le résultat
  return $nbClient;
  //Fermeture de la connexion
  $con->fclose();
}

//Fonction pour reculer de 1 ans
function getNextYear($annee){
  //Ajoute + 1 à l'année et renvoie en format écrit le résultat
  echo $annee + 1;
}

//Fonction pour avancé de 1 ans
function getPastYear($annee){
  //Enlève - 1 à l'année et renvoie en format écrit le résultat
  echo $annee - 1;
}

//Fonction pour savoir le nombre de semaine
function getSemaine($mois, $annee){
  //Purge de la variable $valeurs
  $valeurs = "";
  $con = connexion();
  //Purge de la variable $week
  $week = array();
  //Requete sql
  $sql="SELECT DISTINCT WEEK(date_vente) AS semaine FROM VENTE WHERE MONTH(date_vente) = ".$mois." AND YEAR(date_vente) = ".$annee;
  //Execution de la requete sql
  $valeurs = mysqli_query($con, $sql);
  //Si la variable supérieur à zero
  if(mysqli_num_rows($valeurs)>0){
    //Ajout dans un tableau assosiatif $row
    while($row = mysqli_fetch_assoc($valeurs)){//Début boucle
      //Stockage de la donnée dans un variable
      $semaine = $row['semaine'];
      //Vérification de si elle existe déjà sinon on peux l'ajouté dans le tableau
      if(!isset($week[$semaine])){//Début du if
        //Ajout de la variable dans le tableau
        $week[] = $semaine;
      }//Fin du if
    } //Fin boucle
    //Return le résultat
    return $week;
  }
  //Fermeture de la connexion
  $con->fclose();
}

//Fonction pour générer le tableau de gestion de données
function generateBodyTable($mois, $annee){
  //Récupère le nombre de semaines grace à une methode déjà existante
  $week = getSemaine($mois, $annee);
  //Purge de la variable $cptWeek
  $cptWeek = 0;
  //Création de la var $str
  $str ="<tbody id='tbody'>";
  //Boucle tant que le nombre de semaine n'est pas atteint
  while(COUNT($week) > $cptWeek){ //Début boucle
    //Récupération du nombre de client selon la semaine et l'annee
    $nbClient = getNbClient($week[$cptWeek], $annee);
    //Récupération du chiffre d'affaire selon la semaine et l'annee
    $chiffreAffaire = getChiffreAffaire($week[$cptWeek], $annee);
    //Concaténation de $str
    $str .= "<tr>";
    $str .="<td> S".$week[$cptWeek]."</td>";
    $str.="<td>".$nbClient[0]."</td>";
    $str.="<td>".ROUND($chiffreAffaire / $nbClient, 1)." €</td>";
    $str.="<td align=right>".ROUND($chiffreAffaire, 1)." €</td>";
    $str.="</tr>";
    //incrémentation du compteur
    $cptWeek ++;
  }//Fin de la boucle
  //dernière concaténation
  $str .="</tbody>";
  //Return le résultat
  return $str;
}
 ?>
