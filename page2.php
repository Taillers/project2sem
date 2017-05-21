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
        $('#moinsunan, #plusunan,#enseignant,#itrf,#direction,#undegre,#deuxdegre,#autrefonction').change(function() {
            if ($('#plusunan').is(':checked')) {
                $('#nbanciennete').show();
            }
            else {
                $('#nbanciennete').hide();
            }
            if($('#enseignant').is(':checked')) {
                $('#PEOO').show();
            }
            else {
                $('#PEOO').hide();
            }
            if($('#undegre').is(':checked')) {
                $('#peoo1').show();
            }
            else {
                $('#peoo1').hide();
            }
           if($('#autrefonction').is(':checked')) {
                $('#libautrefonction').show();
            }
            else {
                $('#libautrefonction').hide();
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
    </div>
    <div id="PEOO" style="display: none">
        <div class="panel panel-default">
            <div class="panel-body">Personel d'enseignement, d'éducation, d'orientation</div>
            <p>vous intervenez dans le :</p>
            <div class="form-group">
                <label class="control-label col-sm-2" for="undegre">1° degré :</label>
                <div class="col-sm-1">
                <?php
                        $isChecked = "";
                        if(isset($_SESSION['peoo']))
                        {
                            if($_SESSION['peoo'] == "undegre")
                            {
                                $isChecked = "checked=\"checked\"";
                            }
                        }
                        echo '<input class="form-control" type="radio" name="peoo" value="undegre" id="undegre"'.$isChecked .' />';
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="deuxdegre">2eme degré :</label>
                <div class="col-sm-1">
                <?php
                        $isChecked = "";
                        if(isset($_SESSION['peoo']))
                        {
                            if($_SESSION['peoo'] == "deuxdegre")
                            {
                                $isChecked = "checked=\"checked\"";
                            }
                        }
                        echo '<input class="form-control" type="radio" name="peoo" value="deuxdegre" id="deuxdegre"'.$isChecked .' />';
                    ?>
                </div>
            </div>
        </div>
        <div id="peoo1" style="display: none">
            <div class="panel panel-default">
                <div class="panel-body">Votre fonction est</div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="enseignement">enseignement :</label>
                    <div class="col-sm-1">
                    <?php
                            $isChecked = "";
                            if(isset($_SESSION['peoo1fonction']))
                            {
                                if($_SESSION['peoo1fonction'] == "enseignement")
                                {
                                    $isChecked = "checked=\"checked\"";
                                }
                            }
                            echo '<input class="form-control" type="radio" name="peoo1fonction" value="enseignement" id="enseignement"'.$isChecked .' />';
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="directeur">Directeur d'école :</label>
                    <div class="col-sm-1">
                    <?php
                            $isChecked = "";
                            if(isset($_SESSION['peoo1fonction']))
                            {
                                if($_SESSION['peoo1fonction'] == "directeur")
                                {
                                    $isChecked = "checked=\"checked\"";
                                }
                            }
                            echo '<input class="form-control" type="radio" name="peoo1fonction" value="directeur" id="directeur"'.$isChecked .' />';
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="conseiller">Conseiller pédagogique :</label>
                    <div class="col-sm-1">
                    <?php
                            $isChecked = "";
                            if(isset($_SESSION['peoo1fonction']))
                            {
                                if($_SESSION['peoo1fonction'] == "conseiller")
                                {
                                    $isChecked = "checked=\"checked\"";
                                }
                            }
                            echo '<input class="form-control" type="radio" name="peoo1fonction" value="conseiller" id="conseiller"'.$isChecked .' />';
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="autrefonction">Autre fonction :</label>
                    <div class="col-sm-1">
                        <?php
                            $isChecked = "";
                            if(isset($_SESSION['peoo1fonction']))
                            {
                                if($_SESSION['peoo1fonction'] == "autrefonction")
                                {
                                    $isChecked = "checked=\"checked\"";
                                }
                            }
                            echo '<input class="form-control" type="radio" name="peoo1fonction" value="autrefonction" id="autrefonction"'.$isChecked .' />';
                        ?>
                    </div>
                    <div id="libautrefonction" style="display: none">
                        <label class="control-label col-sm-2" for="libellefonction">Fonction :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="libellefonction" id="libellefonction" 
                                value="<?php echo (isset($_SESSION['libellefonction']))?$_SESSION['libellefonction']:'';?>"
                                placeholder="Votre fonction">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="panel panel-default">
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