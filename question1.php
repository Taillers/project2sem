<!DOCTYPE html>
<html lang="en">
<head>
  <title>Projet Alexandre Cocquerez</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <script src="jquery/jquery-3.2.1.min.js"></script>
  <link rel="stylesheet" href="css/perso.css">
</head>
<body>
  <?php include("includes/header.php");?>
  <?php include("includes/navigation.php");?>
  <p>
    Merci d'avoir accepté de participer à cette étude !  Nous allons maintenant commencer ce questionnaire par une caractérisation socio-professionnelle 
    qui servira à détecter si certaines caractéristiques des postes aident à préserver le bien-être, ou au contraire sont associées à plus de mal-être 
    dans l'activité professionnelle.
  </p>
  <form method="post" action="question2.php" class="form-horizontal">
    <div class="panel panel-default">
        <div class="panel-body">Age</div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="age">Age:</label>
            <div class="col-sm-10">
                <input type="age" class="form-control" id="age" placeholder="Âge en nombre d'années (2 chiffres, sans aucun texte complémentaire, par ex : 33)">
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">Sexe</div>
         <div class="form-group">
            <label class="control-label col-sm-2" for="homme">Homme:</label>
            <div class="col-sm-1">
                <input class="form-control" type="radio" name="sexe" value="homme" id="homme"/> 
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="femme">Femme:</label>
            <div class="col-sm-1">
                <input class="form-control" type="radio" name="sexe" value="femme" id="femme" checked="checked" />
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">Statut Général</div>
         <div class="form-group">
            <label class="control-label col-sm-2" for="titulaire">Titulaire:</label>
            <div class="col-sm-1">
                <input class="form-control" type="radio" name="statut" value="titulaire" id="titulaire"  checked="checked"/> 
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="contractuel">Contractuel:</label>
            <div class="col-sm-1">
                <input class="form-control" type="radio" name="statut" value="contractuel" id="contractuel" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="stagiaire">Stagiaire:</label>
            <div class="col-sm-1">
                <input class="form-control" type="radio" name="statut" value="stagiaire" id="stagiaire" />
            </div>
        </div>
    </div>
  </form>

  <?php include("includes/footer.php");?>
</body>
</html>