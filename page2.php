<!DOCTYPE html>
<html lang="en">
<head>
  <title>Projet Alexandre Cocquerez</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <script src="jquery/jquery-3.2.1.min.js"></script>
  <link rel="stylesheet" href="css/perso.css">

  <script type="text/javascript">
//   function javascript. Si l'identifiant moinsunan ou plusunan sont coché, on affiche ou masque la boite de saisie du nombre d'année d'ancienneté
    $(document).ready(function() {
        $('#moinsunan, #plusunan').change(function() {
            if ($('#plusunan').is(':checked')) {
                $('#nbanciennete').show();
            }
            else {
                $('#nbanciennete').hide();
            }
        });
    });
 
</script>
</head>
<body>
  <?php include("includes/header.php");?>
  <?php include("includes/navigation.php");?>
  <p>
    Vos caractéristiques sociaux-professionnelles
  </p>
  <form method="post" action="traitement3.php" class="form-horizontal">
    <div class="panel panel-default">
        <div class="panel-body">Département du lieu d’exercice de votre fonction (si plusieurs lieux d'exercice indiquez le département de rattachement)</div>
        <?php 
            $arrayDep = array("09","12","31","32","46","65","81","82");
            foreach($arrayDep as $dep)
            {
                echo '<div class="form-group">';
                echo '  <label class="control-label col-sm-2" for="dep'.$dep.'">'.$dep.':</label>';
                echo '  <div class="col-sm-1">';
                $isChecked = "";
                if(isset($_SESSION['departement']))
                {
                    if($_SESSION['departement'] == "dep.$dep09")
                    {
                        $isChecked = "checked=\"checked\"";
                    }
                }
                echo '      <input class="form-control" type="radio" name="departement" value="dep'.$dep.'" id="dep'.$dep.'"'.$isChecked .' />';
                echo '  </div>';
                echo '</div>';
            }
        ?>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">Ancienneté</div>
         <div class="form-group">
            <label class="control-label col-sm-2" for="moinsunan">Moins d'un an:</label>
            <div class="col-sm-1">
                <?php
                    $isChecked = "";
                    if(isset($_SESSION['anciennete']))
                    {
                        if($_SESSION['anciennete'] == "moinsunan")
                        {
                            $isChecked = "checked=\"checked\"";
                        }
                    }
                    echo '<input class="form-control" type="radio" name="anciennete" value="moinsunan"  id="moinsunan"'.$isChecked .' />';
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="plusunan">Plus d'un an (merci d'indiquer le nombre d'années, par exemple 10):</label>
            <div class="col-sm-1">
                <?php
                    $isChecked = "";
                    if(isset($_SESSION['anciennete']))
                    {
                        if($_SESSION['anciennete'] == "plusunan")
                        {
                            $isChecked = "checked=\"checked\"";
                        }
                    }
                    echo '<input class="form-control" type="radio" name="anciennete" value="plusunan" id="plusunan"'.$isChecked .' />';
                ?>
            </div>
        <!--</div>
        <div class="form-group">-->
            <div id="nbanciennete" style="display: none">
                <label class="control-label col-sm-2" for="anneanciennete">Ancienneté:</label>
                <div class="col-sm-4">
                    <input type="text" pattern="[0-9]{1,2}" class="form-control" name="anneanciennete" id="anneanciennete" 
                        value="<?php echo (isset($_SESSION['anneanciennete']))?$_SESSION['anneanciennete']:'';?>"
                        placeholder="Nombre d'années d'ancienneté">
                </div>
            </div>
        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-body">Catégorie</div>
         <div class="form-group">
            <label class="control-label col-sm-2" for="enseignant">Personel d'enseignement, d'éducation, d'orientation :</label>
            <div class="col-sm-1">
               <?php
                    $isChecked = "";
                    if(isset($_SESSION['categorie']))
                    {
                        if($_SESSION['categorie'] == "enseignant")
                        {
                            $isChecked = "checked=\"checked\"";
                        }
                    }
                    echo '<input class="form-control" type="radio" name="categorie" value="enseignant" id="enseignant"'.$isChecked .' />';
                ?>
             </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="itrf">Personnel ITRF et ATSS (administratif, technique, social et de santé) :</label>
            <div class="col-sm-1">
               <?php
                    $isChecked = "";
                    if(isset($_SESSION['categorie']))
                    {
                        if($_SESSION['categorie'] == "itrf")
                        {
                            $isChecked = "checked=\"checked\"";
                        }
                    }
                    echo '<input class="form-control" type="radio" name="categorie" value="itrf" id="itrf"'.$isChecked .' />';
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="direction">Personnel de direction et d'inspection:</label>
            <div class="col-sm-1">
               <?php
                    $isChecked = "";
                    if(isset($_SESSION['categorie']))
                    {
                        if($_SESSION['categorie'] == "direction")
                        {
                            $isChecked = "checked=\"checked\"";
                        }
                    }
                    echo '<input class="form-control" type="radio" name="categorie" value="direction" id="direction"'.$isChecked .' />';
                ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Valider</button>
            </div>
        </div>
    </div>
    
  </form>

  <?php include("includes/footer.php");?>
</body>
</html>