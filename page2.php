<!DOCTYPE html>
<html lang="en">
<head>
	<title>Projet Alexandre Cocquerez</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
	<script src="jquery/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" href="css/perso.css" />

	<script type="text/javascript">
    	//   function javascript. Si l'identifiant moinsunan ou plusunan sont coché, on affiche ou masque la boite de saisie du nombre d'année d'ancienneté
    	$(document).ready(function () {
    		$('#moinsunan, #plusunan,#enseignant,#itrf,#direction,#undegre,#deuxdegre,#peeo1afonction,#autretype,#maternelle,#elementaire, \
				#peeo2aed,#peeo2cpe,#peeo2plp,#peeo2certifie,#peeo2agrege, #peeo2peps, #autre2fonction, #conseiller,#directeur,#enseignement,\
				#peeo2typecollege,#peeo2typelycee,#peeo2typeprof, #autre2type, #filiereitrf, #filiereatss,\
				#autre3type,#filiereatsstypeaca, #filiereatsstypeprof,#filiereatsstypelycee,#filiereatsstypecollege,\
				#autre4type,#pdi1aaca, #pdi1aprof,#pdi1alycee,#pdi1acollege,#filiereitrffuncdirection,#filiereitrffuncinspection ').change(function () {

				if ($('#filiereitrf').is(':checked')) {
					$('#itrffiliere').show();
				}
				else {
					$('#itrffiliere').hide();
				}
				// si PDI Personnel de direction est coché, on affiche les types d'établissement
				if ($('#filiereitrffuncdirection').is(':checked')) {
					$('#etablissementdirection').show();
				}
				else {
					$('#etablissementdirection').hide();
				}
					// si PDI Personnel d'inspection est coché, on affiche le secteur d'intervention
				if ($('#filiereitrffuncinspection').is(':checked')) {
					$('#personnelinspection').show();
				}
				else {
					$('#personnelinspection').hide();
				}

				if ($('#filiereatss').is(':checked')) {
					$('#atssfiliere').show();
				}
				else {
					$('#atssfiliere').hide();
				}
				if ($('#plusunan').is(':checked')) {
    				$('#nbanciennete').show();
    			}
    			else {
    				$('#nbanciennete').hide();
    			}
    			if ($('#enseignant').is(':checked')) {
    				$('#PEOO').show();
    			}
    			else {
    				$('#PEOO').hide();
    			}

    			if ($('#direction').is(':checked') || $('#deuxdegre').is(':checked')) {
    				$('#peeo2fonction').show();
    			}
    			else {
    				$('#peeo2fonction').hide();
    			}
				// Si categ A (Personnel ITRF.. est coché, on affiche les question filières
    			if ($('#itrf').is(':checked')) {
    				$('#persoirtfatss').show();
    			}
    			else {
    				$('#persoirtfatss').hide();
    			}
    			if ($('#undegre').is(':checked')) {
    				$('#peoo1').show();
    			}
    			else {
    				$('#peoo1').hide();
    			}
    			//Si PEEO_1a Autre est coché, on affiche la boite de texte permettant la saisie, sinon, on la masque
    			if ($('#peeo1afonction').is(':checked')) {
    				$('#libpeeo1afonction').show();
    			}
    			else {
    				$('#libpeeo1afonction').hide();
    			}
    			//Si PEEO_1b Autre est coché, on affiche la boite de texte permettant la saisie, sinon, on la masque
    			if ($('#autretype').is(':checked')) {
    				$('#libautretype').show();
    			}
    			else {
    				$('#libautretype').hide();
    			}
    			//Si PEEO_2a Autre est coché, on affiche la boite de texte permettant la saisie, sinon, on la masque
    			if ($('#autre2fonction').is(':checked')) {
    				$('#libautrefonction2').show();
    			}
    			else {
    				$('#libautrefonction2').hide();
    			}
    			//Si PEEO_2b Autre est coché, on affiche la boite de texte permettant la saisie, sinon, on la masque
    			if ($('#autre2type').is(':checked')) {
    				$('#libautretype2').show();
    			}
    			else {
    				$('#libautretype2').hide();
    			}
				//Si PIA_1b Autre est coché, on affiche la boite de texte permettant la saisie, sinon, on la masque
    			if ($('#autre3type').is(':checked')) {
    				$('#libautretype3').show();
    			}
    			else {
    				$('#libautretype3').hide();
    			}
				//Si PDI1A Autre est coché, on affiche la boite de texte permettant la saisie, sinon, on la masque
    			if ($('#autre4type').is(':checked')) {
    				$('#libautretype4').show();
    			}
    			else {
    				$('#libautretype4').hide();
    			}

    			if ($('#maternelle').is(':checked')) {
    				$('#nombreclassematernelle').show();
    			}
    			else {
    				$('#nombreclassematernelle').hide();
    			}
    			if ($('#elementaire').is(':checked')) {
    				$('#nombreclasseelementaire').show();
    			}
    			else {
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
							placeholder="Nombre d'années d'ancienneté" />
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
                            if(isset($_SESSION['peeo1a']))
                            {
                                if($_SESSION['peeo1a'] == "enseignement")
                                {
                                    $isChecked = "checked=\"checked\"";
                                }
                            }
                            echo '<input class="form-control" type="radio" name="peeo1a" value="enseignement" id="enseignement"'.$isChecked .' />';
                            ?>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="directeur">Directeur d'école :</label>
						<div class="col-sm-1">
							<?php
                            $isChecked = "";
                            if(isset($_SESSION['peeo1a']))
                            {
                                if($_SESSION['peeo1a'] == "directeur")
                                {
                                    $isChecked = "checked=\"checked\"";
                                }
                            }
                            echo '<input class="form-control" type="radio" name="peeo1a" value="directeur" id="directeur"'.$isChecked .' />';
                            ?>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="conseiller">Conseiller pédagogique :</label>
						<div class="col-sm-1">
							<?php
                            $isChecked = "";
                            if(isset($_SESSION['peeo1a']))
                            {
                                if($_SESSION['peeo1a'] == "conseiller")
                                {
                                    $isChecked = "checked=\"checked\"";
                                }
                            }
                            echo '<input class="form-control" type="radio" name="peeo1a" value="conseiller" id="conseiller"'.$isChecked .' />';
                            ?>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="peeo1afonction">Autre fonction :</label>
						<div class="col-sm-1">
							<?php
                            $isChecked = "";
                            if(isset($_SESSION['peeo1a']))
                            {
                                if($_SESSION['peeo1a'] == "peeo1afonction")
                                {
                                    $isChecked = "checked=\"checked\"";
                                }
                            }
                            echo '<input class="form-control" type="radio" name="peeo1a" value="peeo1afonction" id="peeo1afonction"'.$isChecked .' />';
                            ?>
						</div>
						<div id="libpeeo1afonction" style="display: none">
							<label class="control-label col-sm-2" for="libellefonction">Fonction :</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="libellefonction" id="libellefonction"
									value="<?php echo (isset($_SESSION['libellefonction']))?$_SESSION['libellefonction']:'';?>"
									placeholder="Votre fonction" />
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
									placeholder="Votre fonction" />
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
				<div id="nombreclasseelementaire">
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
		<div id="peeo2fonction" style="display:none">
			<div class="panel panel-default">
				<div class="panel-body">Votre fonction</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="peeo2aed">AED (Assistant d'éducation) :</label>
					<div class="col-sm-1">
						<?php
                        $isChecked = "";
                        if(isset($_SESSION['peoo2func']))
                        {
                            if($_SESSION['peoo2func'] == "peeo2aed")
                            {
                                $isChecked = "checked=\"checked\"";
                            }
                        }
                        echo '<input class="form-control" type="radio" name="peoo2func" value="peeo2aed" id="peeo2aed"'.$isChecked .' />';
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="peeo2cpe">CPE :</label>
					<div class="col-sm-1">
						<?php
                        $isChecked = "";
                        if(isset($_SESSION['peoo2func']))
                        {
                            if($_SESSION['peoo2func'] == "peeo2cpe")
                            {
                                $isChecked = "checked=\"checked\"";
                            }
                        }
                        echo '<input class="form-control" type="radio" name="peoo2func" value="peeo2cpe" id="peeo2cpe"'.$isChecked .' />';
                        ?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="peeo2plp">PLP :</label>
					<div class="col-sm-1">
						<?php
                        $isChecked = "";
                        if(isset($_SESSION['peoo2func']))
                        {
                            if($_SESSION['peoo2func'] == "peeo2plp")
                            {
                                $isChecked = "checked=\"checked\"";
                            }
                        }
                        echo '<input class="form-control" type="radio" name="peoo2func" value="peeo2plp" id="peeo2plp"'.$isChecked .' />';
                        ?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="peeo2certifie">Certifié :</label>
					<div class="col-sm-1">
						<?php
                        $isChecked = "";
                        if(isset($_SESSION['peoo2func']))
                        {
                            if($_SESSION['peoo2func'] == "peeo2certifie")
                            {
                                $isChecked = "checked=\"checked\"";
                            }
                        }
                        echo '<input class="form-control" type="radio" name="peoo2func" value="peeo2certifie" id="peeo2certifie"'.$isChecked .' />';
                        ?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="peeo2agrege">Agrégé :</label>
					<div class="col-sm-1">
						<?php
                        $isChecked = "";
                        if(isset($_SESSION['peoo2func']))
                        {
                            if($_SESSION['peoo2func'] == "peeo2agrege")
                            {
                                $isChecked = "checked=\"checked\"";
                            }
                        }
                        echo '<input class="form-control" type="radio" name="peoo2func" value="peeo2agrege" id="peeo2agrege"'.$isChecked .' />';
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="peeo2peps">PEPS :</label>
					<div class="col-sm-1">
						<?php
                        $isChecked = "";
                        if(isset($_SESSION['peoo2func']))
                        {
                            if($_SESSION['peoo2func'] == "peeo2peps")
                            {
                                $isChecked = "checked=\"checked\"";
                            }
                        }
                        echo '<input class="form-control" type="radio" name="peoo2func" value="peeo2peps" id="peeo2peps"'.$isChecked .' />';
                        ?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="autre2fonction">Autre fonction :</label>
					<div class="col-sm-1">
						<?php
						$isChecked = "";
						if(isset($_SESSION['peoo2func']))
						{
							if($_SESSION['peoo2func'] == "autre2fonction")
							{
								$isChecked = "checked=\"checked\"";
							}
						}
						echo '<input class="form-control" type="radio" name="peoo2func" value="autre2fonction" id="autre2fonction"'.$isChecked .' />';
						?>
					</div>
					<div id="libautrefonction2" style="display: none">
						<label class="control-label col-sm-2" for="libelle2fonction">Fonction :</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="libell2efonction" id="libelle2fonction"
								value="<?php echo (isset($_SESSION['libelle2fonction']))?$_SESSION['libelle2fonction']:'';?>"
								placeholder="Votre fonction" />
						</div>
					</div>
				</div>

			</div>
			<div class="panel panel-default">
				<div class="panel-body">Type d'établissement</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="peeo2typecollege">Collège et SEGPA :</label>
					<div class="col-sm-1">
						<?php
                        $isChecked = "";
                        if(isset($_SESSION['peoo2type']))
                        {
                            if($_SESSION['peoo2type'] == "peeo2typecollege")
                            {
                                $isChecked = "checked=\"checked\"";
                            }
                        }
                        echo '<input class="form-control" type="radio" name="peoo2type" value="peeo2typecollege" id="peeo2typecollege"'.$isChecked .' />';
                        ?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="peeo2typelycee">Lycée général (y compris SGT, sauf SP) :</label>
					<div class="col-sm-1">
						<?php
                        $isChecked = "";
                        if(isset($_SESSION['peoo2type']))
                        {
                            if($_SESSION['peoo2type'] == "peeo2typelycee")
                            {
                                $isChecked = "checked=\"checked\"";
                            }
                        }
                        echo '<input class="form-control" type="radio" name="peoo2type" value="peeo2typelycee" id="peeo2typelycee"'.$isChecked .' />';
                        ?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="peeo2typeprof">Lycée professionnel (y compris SP et EREA, sauf SGT) :</label>
					<div class="col-sm-1">
						<?php
                        $isChecked = "";
                        if(isset($_SESSION['peoo2type']))
                        {
                            if($_SESSION['peoo2type'] == "peeo2typeprof")
                            {
                                $isChecked = "checked=\"checked\"";
                            }
                        }
                        echo '<input class="form-control" type="radio" name="peoo2type" value="peeo2typeprof" id="peeo2typeprof"'.$isChecked .' />';
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="autre2type">Autre :</label>
					<div class="col-sm-1">
						<?php
						$isChecked = "";
						if(isset($_SESSION['peoo2type']))
						{
							if($_SESSION['peoo2type'] == "autre2type")
							{
								$isChecked = "checked=\"checked\"";
							}
						}
						echo '<input class="form-control" type="radio" name="peoo2type" value="autre2type" id="autre2type"'.$isChecked .' />';
                        ?>
					</div>
					<div id="libautretype2" style="display: none">
						<label class="control-label col-sm-2" for="libelle2type">Fonction :</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="libelle2type" id="libelle2type"
								value="<?php echo (isset($_SESSION['libelle2type']))?$_SESSION['libelle2type']:'';?>"
								placeholder="Type d'établissement" />
						</div>
					</div>
				</div>

			</div>
		</div>
		<div id="persoirtfatss" style="display:none">
			<div class="panel panel-default">
				<div class="panel-body">Votre filière</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="filiereitrf">ITRF :</label>
					<div class="col-sm-1">
						<?php
                        $isChecked = "";
                        if(isset($_SESSION['filiere']))
                        {
                            if($_SESSION['filiere'] == "filiereitrf")
                            {
                                $isChecked = "checked=\"checked\"";
                            }
                        }
                        echo '<input class="form-control" type="radio" name="filiere" value="filiereitrf" id="filiereitrf"'.$isChecked .' />';
                        ?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="filiereatss">ATSS :</label>
					<div class="col-sm-1">
						<?php
                        $isChecked = "";
                        if(isset($_SESSION['filiere']))
                        {
                            if($_SESSION['filiere'] == "filiereatss")
                            {
                                $isChecked = "checked=\"checked\"";
                            }
                        }
                        echo '<input class="form-control" type="radio" name="filiere" value="filiereatss" id="filiereatss"'.$isChecked .' />';
                        ?>
					</div>
				</div>
				<div id="atssfiliere" style="display:none">
					<div class="panel panel-default">
						<div class="panel-body">Présisez votre filière</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="filiereatssadmin">Filière administrative :</label>
							<div class="col-sm-1">
								<?php
								$isChecked = "";
								if(isset($_SESSION['filiereatss']))
								{
									if($_SESSION['filiereatss'] == "filiereatssadmin")
									{
										$isChecked = "checked=\"checked\"";
									}
								}
								echo '<input class="form-control" type="radio" name="filiereatss" value="filiereatssadmin" id="filiereatssadmin"'.$isChecked .' />';
                                ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="filiereatsstech">Filière technique :</label>
							<div class="col-sm-1">
								<?php
								$isChecked = "";
								if(isset($_SESSION['filiereatss']))
								{
									if($_SESSION['filiereatss'] == "filiereatsstech")
									{
										$isChecked = "checked=\"checked\"";
									}
								}
								echo '<input class="form-control" type="radio" name="filiereatss" value="filiereatsstech" id="filiereatsstech"'.$isChecked .' />';
                                ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="filiereatsssoc">Filière sociale :</label>
							<div class="col-sm-1">
								<?php
								$isChecked = "";
								if(isset($_SESSION['filiereatss']))
								{
									if($_SESSION['filiereatss'] == "filiereatsssoc")
									{
										$isChecked = "checked=\"checked\"";
									}
								}
								echo '<input class="form-control" type="radio" name="filiereatss" value="filiereatsssoc" id="filiereatsssoc"'.$isChecked .' />';
                                ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="filiereatsslab">Filière laboratoire :</label>
							<div class="col-sm-1">
								<?php
								$isChecked = "";
								if(isset($_SESSION['filiereatss']))
								{
									if($_SESSION['filiereatss'] == "filiereatsslab")
									{
										$isChecked = "checked=\"checked\"";
									}
								}
								echo '<input class="form-control" type="radio" name="filiereatss" value="filiereatsslab" id="filiereatsslab"'.$isChecked .' />';
                                ?>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-body">Quelle est votre catégorie d'appartenance</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="filiereatsscatega">A :</label>
							<div class="col-sm-1">
								<?php
								$isChecked = "";
								if(isset($_SESSION['filiereatsscatg']))
								{
									if($_SESSION['filiereatsscatg'] == "categorieA")
									{
										$isChecked = "checked=\"checked\"";
									}
								}
								echo '<input class="form-control" type="radio" name="filiereatsscatg" value="categorieA" id="categorieA"'.$isChecked .' />';
                                ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="categorieB">B :</label>
							<div class="col-sm-1">
								<?php
								$isChecked = "";
								if(isset($_SESSION['filiereatsscatg']))
								{
									if($_SESSION['filiereatsscatg'] == "categorieB")
									{
										$isChecked = "checked=\"checked\"";
									}
								}
								echo '<input class="form-control" type="radio" name="filiereatsscatg" value="categorieB" id="categorieB"'.$isChecked .' />';
                                ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="categorieC">C :</label>
							<div class="col-sm-1">
								<?php
								$isChecked = "";
								if(isset($_SESSION['filiereatsscatg']))
								{
									if($_SESSION['filiereatsscatg'] == "categorieC")
									{
										$isChecked = "checked=\"checked\"";
									}
								}
								echo '<input class="form-control" type="radio" name="filiereatsscatg" value="categorieC" id="categorieC"'.$isChecked .' />';
                                ?>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-body">Type d'établissement</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="filiereatsstypecollege">Collège et SEGPA :</label>
							<div class="col-sm-1">
								<?php
								$isChecked = "";
								if(isset($_SESSION['filiereatsstype']))
								{
									if($_SESSION['filiereatsstype'] == "filiereatsstypecollege")
									{
										$isChecked = "checked=\"checked\"";
									}
								}
								echo '<input class="form-control" type="radio" name="filiereatsstype" value="filiereatsstypecollege" id="filiereatsstypecollege"'.$isChecked .' />';
                                ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="filiereatsstypelycee">Lycée général (y compris SGT sauf SP):</label>
							<div class="col-sm-1">
								<?php
								$isChecked = "";
								if(isset($_SESSION['filiereatsstype']))
								{
									if($_SESSION['filiereatsstype'] == "filiereatsstypelycee")
									{
										$isChecked = "checked=\"checked\"";
									}
								}
								echo '<input class="form-control" type="radio" name="filiereatsstype" value="filiereatsstypelycee" id="filiereatsstypelycee"'.$isChecked .' />';
                                ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="filiereatsstypeprof">Lycée professionnel (y compris SP et ERA, sauf SGT):</label>
							<div class="col-sm-1">
								<?php
								$isChecked = "";
								if(isset($_SESSION['filiereatsstype']))
								{
									if($_SESSION['filiereatsstype'] == "filiereatsstypeprof")
									{
										$isChecked = "checked=\"checked\"";
									}
								}
								echo '<input class="form-control" type="radio" name="filiereatsstype" value="filiereatsstypeprof" id="filiereatsstypeprof"'.$isChecked .' />';
                                ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="filiereatsstypeaca">Services académiques (Rectorat, DSDEN) :</label>
							<div class="col-sm-1">
								<?php
								$isChecked = "";
								if(isset($_SESSION['filiereatsstype']))
								{
									if($_SESSION['filiereatsstype'] == "filiereatsstypeaca")
									{
										$isChecked = "checked=\"checked\"";
									}
								}
								echo '<input class="form-control" type="radio" name="filiereatsstype" value="filiereatsstypeaca" id="filiereatsstypeaca"'.$isChecked .' />';
                                ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="autre3type">Autres établissements (préciser) :</label>
							<div class="col-sm-1">
								<?php
								$isChecked = "";
								if(isset($_SESSION['filiereatsstype']))
								{
									if($_SESSION['filiereatsstype'] == "autre3type")
									{
										$isChecked = "checked=\"checked\"";
									}
								}
								echo '<input class="form-control" type="radio" name="filiereatsstype" value="autre3type" id="autre3type"'.$isChecked .' />';
                                ?>
							</div>
							<div id="libautretype3" style="display: none">
								<label class="control-label col-sm-2" for="type3fonction">Fonction :</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="type3fonction" id="type3fonction"
										value="<?php echo (isset($_SESSION['type3fonction']))?$_SESSION['type3fonction']:'';?>"
										placeholder="Type d'établissement'" />
								</div>
							</div>
						</div>
					</div>

				</div>
				<div id="itrffiliere" style="display:none">
					<div class="panel panel-default">
						<div class="panel-body">Précisez votre fonction</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="filiereitrffuncdirection">Personnel de direction</label>
							<div class="col-sm-1">
								<?php
								$isChecked = "";
								if(isset($_SESSION['filiereirtffunc']))
								{
									if($_SESSION['filiereirtffunc'] == "filiereitrffuncdirection")
									{
										$isChecked = "checked=\"checked\"";
									}
								}
								echo '<input class="form-control" type="radio" name="filiereirtffunc" value="filiereitrffuncdirection" id="filiereitrffuncdirection"'.$isChecked .' />';
                                ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="filiereitrffuncinspection">Personnel d'inspection :</label>
							<div class="col-sm-1">
								<?php
								$isChecked = "";
								if(isset($_SESSION['filiereirtffunc']))
								{
									if($_SESSION['filiereirtffunc'] == "filiereitrffuncinspection")
									{
										$isChecked = "checked=\"checked\"";
									}
								}
								echo '<input class="form-control" type="radio" name="filiereirtffunc" value="filiereitrffuncinspection" id="filiereitrffuncinspection"'.$isChecked .' />';
                                ?>
							</div>
						</div>
						<div id="etablissementdirection" style="display:none">
							<div class="panel panel-default">
								<div class="panel-body">Type d'établissement</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="pdi1acollege">Collège et SEGPA :</label>
									<div class="col-sm-1">
										<?php
										$isChecked = "";
										if(isset($_SESSION['pdi1a']))
										{
											if($_SESSION['pdi1a'] == "pdi1acollege")
											{
												$isChecked = "checked=\"checked\"";
											}
										}
										echo '<input class="form-control" type="radio" name="pdi1a" value="pdi1acollege" id="pdi1acollege"'.$isChecked .' />';
                                        ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="pdi1alycee">Lycée général (y compris SGT sauf SP):</label>
									<div class="col-sm-1">
										<?php
										$isChecked = "";
										if(isset($_SESSION['pdi1a']))
										{
											if($_SESSION['pdi1a'] == "pdi1alycee")
											{
												$isChecked = "checked=\"checked\"";
											}
										}
										echo '<input class="form-control" type="radio" name="pdi1a" value="pdi1alycee" id="pdi1alycee"'.$isChecked .' />';
										?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="pdi1aprof">Lycée professionnel (y compris SP et ERA, sauf SGT):</label>
									<div class="col-sm-1">
										<?php
										$isChecked = "";
										if(isset($_SESSION['pdi1a']))
										{
											if($_SESSION['pdi1a'] == "pdi1aprof")
											{
												$isChecked = "checked=\"checked\"";
											}
										}
										echo '<input class="form-control" type="radio" name="pdi1a" value="pdi1aprof" id="pdi1aprof"'.$isChecked .' />';
                                        ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="pdi1aaca">Services académiques (Rectorat, DSDEN) :</label>
									<div class="col-sm-1">
										<?php
										$isChecked = "";
										if(isset($_SESSION['pdi1a']))
										{
											if($_SESSION['pdi1a'] == "pdi1aaca")
											{
												$isChecked = "checked=\"checked\"";
											}
										}
										echo '<input class="form-control" type="radio" name="pdi1a" value="pdi1aaca" id="pdi1aaca"'.$isChecked .' />';
										?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="autre4type">Autres établissements (préciser) :</label>
									<div class="col-sm-1">
										<?php
										$isChecked = "";
										if(isset($_SESSION['pdi1a']))
										{
											if($_SESSION['pdi1a'] == "autre4type")
											{
												$isChecked = "checked=\"checked\"";
											}
										}
										echo '<input class="form-control" type="radio" name="pdi1a" value="autre4type" id="autre4type"'.$isChecked .' />';
                                        ?>
									</div>
									<div id="libautretype4" style="display: none">
										<label class="control-label col-sm-2" for="type4type">Fonction :</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" name="type4type" id="type3fonction"
												value="<?php echo (isset($_SESSION['type4type']))?$_SESSION['type4type']:'';?>"
												placeholder="Type d'établissement'" />
										</div>
									</div>
								</div>
							</div>

						</div>
						<div id="personnelinspection" style="display:none">
							<div class="panel panel-default">
								<div class="panel-body">Vous intervenez dans le :</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="pdi2apremier">Premier degré :</label>
									<div class="col-sm-1">
										<?php
										$isChecked = "";
										if(isset($_SESSION['pdi2a']))
										{
											if($_SESSION['pdi2a'] == "pdi2apremier")
											{
												$isChecked = "checked=\"checked\"";
											}
										}
										echo '<input class="form-control" type="radio" name="pdi2a" value="pdi2apremier" id="pdi2apremier"'.$isChecked .' />';
                                        ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="pdi2asecond">Second degré :</label>
									<div class="col-sm-1">
										<?php
										$isChecked = "";
										if(isset($_SESSION['pdi2a']))
										{
											if($_SESSION['pdi2a'] == "pdi2asecond")
											{
												$isChecked = "checked=\"checked\"";
											}
										}
										echo '<input class="form-control" type="radio" name="pdi2a" value="pdi2asecond" id="pdi2asecond"'.$isChecked .' />';
										?>
									</div>
								</div>
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