<!DOCTYPE html>
<?php
//Inclure le ficher reuquete.php
include('requete.php')
 ?>
<html lang="fr" dir="ltr">
  <head>
    <title>Statistique</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.3/css/all.css' integrity='sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/master.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <!-- Création d'une "LIGNE" BOOTSTRAP -->
    <div class="row">
      <div class="col-sm-4 sun">
        <img src="img/sun.png" alt="Sun">
      </div>
      <div class="col-sm-4">
        <h2 class="titre">Suivi d'affluence</h2>
      </div>
      <div class="col-sm-4"></div>
    </div>
    <!-- Création d'une "LIGNE" BOOTSTRAP -->
    <div class="row">
      <div class="col-sm-5 arrow-left">
        <!-- Ajout d'un favicon avec appel de méthode Ajax -->
        <i class='fas fa-arrow-alt-circle-left' onClick="pastYear()" ></i>
      </div>
      <div class="col-sm-2">
        <!-- Ajout d'un id pour récupérer ma valeur en Ajax -->
        <h2 class="text-center" id="annee">2016</h2>
      </div>
      <div class="col-sm-5 arrow-right">
        <!-- Ajout d'un favicon avec appel de méthode Ajax -->
        <i class='fas fa-arrow-alt-circle-right' onclick="nextYear()"></i>
      </div>
    </div>
    <!-- Création d'une "LIGNE" BOOTSTRAP -->
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">
        <!-- Appel d'une méthode PHP pour créer la bar de mois -->
        <?php echo generateMonth();?>
      </div>
    </div>
    <!-- Création d'une "LIGNE" BOOTSTRAP -->
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">
        <!-- Création d'une tableau -->
        <table class="table">
          <!-- Ouverture des titres du tableau -->
          <thead>
            <!-- Attibution des titres du tableau -->
            <tr>
              <th>Semaine</th>
              <th>Nb. Clients</th>
              <th>Panier Moyen</th>
              <th>Chiffre d'affaire</th>
            </tr>
          </thead>
          <!-- Génération du tableau par défaut en 2016 -->
          <?php
          //Je pouvais très bien faire des valeurs pas défaut avec la fonction date en php pour que mon tableau sois toujours en actualité avec l'utilisateur mais mon jeu de données ne corresponder pas !
          echo generateBodyTable(1, 2016);
           ?>
        </table>
      </div>
      <div class="col-sm-2"></div>
    </div>
  </body>
  <script>
    $('#1').addClass("yellow");
    //Function AJAX pour changer d'année
    function nextYear(){
      //récupération de la valeur
      annee =$('#annee').text();
      $.ajax(
        {
          type:'POST',
          url:'ajax/nextYear.php',
          //Variable envoyé en post au fichier php
          data:{annee:annee},
          dataType:'text',
          success: function(annee){
            //Suppresion du text acutel
            $('#annee').text("");
            //Ajout du nouveau text
            $('#annee').text(annee);
            //Mise à jour du tableau pour l'année en cours
            changeMonth(1);
          }
        }
      );
    }
    function pastYear(){
      //récupération de la valeur
      annee =$('#annee').text();
      $.ajax(
        {
          type:'POST',
          url:'ajax/pastYear.php',
          //Variable envoyé en post au fichier php
          data:{annee:annee},
          dataType:'text',
          success: function(annee){
            //Suppresion du text acutel
            $('#annee').text("");
            //Ajout du nouveau text
            $('#annee').text(annee);
            //Mise à jour du tableau pour l'année en cours
            changeMonth(1);
          }
        }
      );
    }
    function changeMonth(idMois){
      $('.yellow').toggleClass('yellow');
      //récupération de la valeur
      idAnnee =$('#annee').text();
      $.ajax(
      {
        type:'POST',
        url:'ajax/changeMonth.php',
        //Variable envoyé en post au fichier php
        data:{mois:idMois, annee:idAnnee},
        dataType: 'html',
        success: function(mois, annee){
          //Purge la div tbody pour qu'il ne reste rien à l'intérieur
          document.getElementById('tbody').innerHTML = "";
          //Remplissage de la div tbody
          document.getElementById('tbody').innerHTML = mois, annee;
          $('#'+idMois).toggleClass('yellow');
        },
        error: function(){
          //Si aucun vente n'as était faite ce mois ci, une pop up apparaitra
          alert("Aucune vente ce mois-ci !");
        }
      }
    );
    }
  </script>
</html>
