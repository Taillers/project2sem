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
        $('#moinsunan, #plusunan,#enseignant,#itrf,#direction,#undegre,#deuxdegre,#autrefonction,#autretype,#maternelle,#elementaire').change(function() {
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
           if($('#autretype').is(':checked')) {
                $('#libautretype').show();
            }
            else {
                $('#libautretype').hide();
            }
           if($('#maternelle').is(':checked')) 
           {
                $('#nombreclassematernelle').show();
            }
            else 
            {
                $('#nombreclassematernelle').hide();
            } 
            if($('#elementaire').is(':checked')) 
            {
                $('#nombreclasseelementaire').show();
            }
            else 
            {
                $('#nombreclasseelementaire').hide();
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
            <div class="panel panel-default">
                <div class="panel-body">Type d'établissement</div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="maternelle">Ecole maternelle :</label>
                    <div class="col-sm-1">
                    <?php
                            $isChecked = "";
                            if(isset($_SESSION['peoo1type']))
                            {
                                if($_SESSION['peoo1type'] == "maternelle")
                                {
                                    $isChecked = "checked=\"checked\"";
                                }
                            }
                            echo '<input class="form-control" type="radio" name="peoo1type" value="maternelle" id="maternelle"'.$isChecked .' />';
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="elementaire">École élémentaire ou école comprenant des classes maternelles et élémentaires :</label>
                    <div class="col-sm-1">
                    <?php
                            $isChecked = "";
                            if(isset($_SESSION['peoo1type']))
                            {
                                if($_SESSION['peoo1type'] == "elementaire")
                                {
                                    $isChecked = "checked=\"checked\"";
                                }
                            }
                            echo '<input class="form-control" type="radio" name="peoo1type" value="elementaire" id="elementaire"'.$isChecked .' />';
                        ?>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="control-label col-sm-2" for="autretype">Autre :</label>
                    <div class="col-sm-1">
                        <?php
                            $isChecked = "";
                            if(isset($_SESSION['peoo1type']))
                            {
                                if($_SESSION['peoo1type'] == "autretype")
                                {
                                    $isChecked = "checked=\"checked\"";
                                }
                            }
                            echo '<input class="form-control" type="radio" name="peoo1type" value="autretype" id="autretype"'.$isChecked .' />';
                        ?>
                    </div>
                    <div id="libautretype" style="display: none">
                        <label class="control-label col-sm-2" for="libelleautretype">Préciser :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="libelleautretype" id="libelleautretype" 
                                value="<?php echo (isset($_SESSION['libelleautretype']))?$_SESSION['libelleautretype']:'';?>"
                                placeholder="Votre fonction">
                        </div>
                    </div>
                </div>
                


            </div>
            <div id="nombreclassematernelle" style="display:none">
                <div class="panel panel-default">
                    <div class="panel-body">Combien de classes possède votre établissement ?</div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="m1to3">1 à 3 :</label>
                        <div class="col-sm-1">
                        <?php
                                $isChecked = "";
                                if(isset($_SESSION['nbclassemarternelle']))
                                {
                                    if($_SESSION['nbclassemarternelle'] == "m1to3")
                                    {
                                        $isChecked = "checked=\"checked\"";
                                    }
                                }
                                echo '<input class="form-control" type="radio" name="nbclassemarternelle" value="m1to3" id="m1to3"'.$isChecked .' />';
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="m4to8">4 à 8 :</label>
                        <div class="col-sm-1">
                        <?php
                                $isChecked = "";
                                if(isset($_SESSION['nbclassemarternelle']))
                                {
                                    if($_SESSION['nbclassemarternelle'] == "m4to8")
                                    {
                                        $isChecked = "checked=\"checked\"";
                                    }
                                }
                                echo '<input class="form-control" type="radio" name="nbclassemarternelle" value="m4to8" id="m4to8"'.$isChecked .' />';
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="m9to12">9 à 12 :</label>
                        <div class="col-sm-1">
                        <?php
                                $isChecked = "";
                                if(isset($_SESSION['nbclassemarternelle']))
                                {
                                    if($_SESSION['nbclassemarternelle'] == "m9to12")
                                    {
                                        $isChecked = "checked=\"checked\"";
                                    }
                                }
                                echo '<input class="form-control" type="radio" name="nbclassemarternelle" value="m9to12" id="m9to12"'.$isChecked .' />';
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="">13 et + :</label>
                        <div class="col-sm-1">
                        <?php
                                $isChecked = "";
                                if(isset($_SESSION['nbclassemarternelle']))
                                {
                                    if($_SESSION['nbclassemarternelle'] == "m13tomax")
                                    {
                                        $isChecked = "checked=\"checked\"";
                                    }
                                }
                                echo '<input class="form-control" type="radio" name="nbclassemarternelle" value="m13tomax" id="m13tomax"'.$isChecked .' />';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="nombreclasseelementaire" >
                <div class="panel panel-default">
                    <div class="panel-body">Combien de classes possède votre établissement ?</div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="e1to3">1 à 3 :</label>
                        <div class="col-sm-1">
                        <?php
                                $isChecked = "";
                                if(isset($_SESSION['nbclasseelementaire']))
                                {
                                    if($_SESSION['nbclasseelementaire'] == "e1to3")
                                    {
                                        $isChecked = "checked=\"checked\"";
                                    }
                                }
                                echo '<input class="form-control" type="radio" name="nbclasseelementaire" value="e1to3" id="e1to3"'.$isChecked .' />';
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="e4to7">4 à 7 :</label>
                        <div class="col-sm-1">
                        <?php
                                $isChecked = "";
                                if(isset($_SESSION['nbclasseelementaire']))
                                {
                                    if($_SESSION['nbclasseelementaire'] == "e4to7")
                                    {
                                        $isChecked = "checked=\"checked\"";
                                    }
                                }
                                echo '<input class="form-control" type="radio" name="nbclasseelementaire" value="e4to7" id="e4to7"'.$isChecked .' />';
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="e8to9">8 à 9 :</label>
                        <div class="col-sm-1">
                        <?php
                                $isChecked = "";
                                if(isset($_SESSION['nbclasseelementaire']))
                                {
                                    if($_SESSION['nbclasseelementaire'] == "e8to9")
                                    {
                                        $isChecked = "checked=\"checked\"";
                                    }
                                }
                                echo '<input class="form-control" type="radio" name="nbclasseelementaire" value="e8to9" id="e8to9"'.$isChecked .' />';
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="e10to13">10 à 13 :</label>
                        <div class="col-sm-1">
                        <?php
                                $isChecked = "";
                                if(isset($_SESSION['nbclasseelementaire']))
                                {
                                    if($_SESSION['nbclasseelementaire'] == "e10to13")
                                    {
                                        $isChecked = "checked=\"checked\"";
                                    }
                                }
                                echo '<input class="form-control" type="radio" name="nbclasseelementaire" value="e10to13" id="e10to13"'.$isChecked .' />';
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="e14tomax">14 et + :</label>
                        <div class="col-sm-1">
                        <?php
                                $isChecked = "";
                                if(isset($_SESSION['nbclasseelementaire']))
                                {
                                    if($_SESSION['nbclasseelementaire'] == "e14tomax")
                                    {
                                        $isChecked = "checked=\"checked\"";
                                    }
                                }
                                echo '<input class="form-control" type="radio" name="nbclasseelementaire" value="e14tomax" id="e14tomax"'.$isChecked .' />';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">Votre établissement est-il classé en REP (réseau d'éducation prioritaire) ?</div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="repoui">Oui :</label>
                    <div class="col-sm-1">
                    <?php
                            $isChecked = "";
                            if(isset($_SESSION['rep']))
                            {
                                if($_SESSION['rep'] == "repoui")
                                {
                                    $isChecked = "checked=\"checked\"";
                                }
                            }
                            echo '<input class="form-control" type="radio" name="rep" value="repoui" id="repoui"'.$isChecked .' />';
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="repnon">Non :</label>
                    <div class="col-sm-1">
                    <?php
                            $isChecked = "";
                            if(isset($_SESSION['rep']))
                            {
                                if($_SESSION['rep'] == "repnon")
                                {
                                    $isChecked = "checked=\"checked\"";
                                }
                            }
                            echo '<input class="form-control" type="radio" name="rep" value="repnon" id="repnon"'.$isChecked .' />';
                        ?>
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