<!DOCTYPE html>
<?php
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
    <?php
      getSemaine(1, 2016);
     ?>
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <h2 class="titre">Suivi d'affluence</h2>
      </div>
      <div class="col-sm-4"></div>
    </div>
    <div class="row">
      <div class="col-sm-5 arrow-left">
        <i class='fas fa-arrow-alt-circle-left' ></i>
      </div>
      <div class="col-sm-2">
        <h2 class="text-center" id="annee">2016</h2>
      </div>
      <div class="col-sm-5 arrow-right">
        <i class='fas fa-arrow-alt-circle-right'></i>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">
        <?php echo generateWeeks();?>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">
        <table class="table">
          <thead>
            <tr>
              <th>Semaine</th>
              <th>Nb. Clients</th>
              <th>Panier Moyen</th>
              <th>Chiffre d'affaire</th>
            </tr>
          </thead>
          <?php
          echo generateBodyTable(1, 2016);
           ?>
        </table>
      </div>
      <div class="col-sm-2"></div>
    </div>
  </body>
  <script>
    function changeMonth(idMois){
      idAnnee =$('#annee').text();
      $.ajax(
      {
        type:'POST',
        url:'ajax/changeMonth.php',
        data:{mois:idMois, annee:idAnnee},
        dataType: 'html',
        success: function(mois, annee){
          $('#tbody').remove();
          <?php generateBodyTable($mois, $annee) ?>
          return data;
        }
      }
    );
    }
  </script>
</html>
