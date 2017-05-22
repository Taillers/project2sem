<!DOCTYPE html>
<html lang="en">
<head>
  <title>Projet Alexandre Cocquerez</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-slider.min.css" />
  <script src="jquery/jquery-3.2.1.min.js"></script>
  <script src="jquery/bootstrap-slider.min.js"></script>
  <link rel="stylesheet" href="css/perso.css">
	<script>
    	$(Document).ready(function () {
    		$('#ex1').slider({
    			formatter: function (value) {
    				$('#niveaumental').val(value);
    				return 'Degré d\'activité mental: ' + value;
    			}
    		});
    		$('#ex2').slider({
    			formatter: function (value) {
    				$('#niveauphysique').val(value);
    				return 'Degré d\'activité physique: ' + value;
    			}
    		});
    	});
	</script>
</head>
<body>
	<?php include("includes/header.php");?>
	<?php include("includes/navigation.php");?>
	<p>
		Voici maintenant quelques questions vous permettant d'exprimer votre ressenti quant aux exigences de votre activité professionnelle...
		A chaque question, vous devez au minimum cliquer sur le curseur pour valider sa position, le déplacer sinon. Le curseur est initialement placé à un position
		 qui représente le niveau d'exigence de plus adapté pour vous.
	</p>
    <form method="post" action="validate.php">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>Mental</h2>
				<p>
					Quel degré d'activité mentale et/ou perceptivité est exigé dans votre travail (en termes de réflexion, de calcul, de rappel mémoire, d'observation, de recherche, etc.)?
					<br />
					A l'aide de la souris, déplacez le curseur entre 0 et 100 <br />
				</p>
            </div>
			<div class="form-group">
				<div class="rows">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<input id="ex1" data-slider-id='ex1Slider' type="range" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="50" />
						<input type="hidden" name="niveaumental" id="niveaumental" value="50" />
					</div>
					<div class="col-sm-2"></div>
				</div>
			</div>
        </div>
		<div class="panel panel-default">
			<div class="panel-body">
				<h2>Physique</h2>
				<p>
					Quel niveau d'activité physique est exigé dans votre travail?
					<br />
					A l'aide de la souris, déplacez le curseur entre 0 et 100
					<br />
				</p>
			</div>
			<div class="form-group">
				<div class="rows">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<input id="ex2" data-slider-id='ex2Slider' type="range" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="50" />
						<input type="hidden" name="niveauphysique" id="niveauphysique" value="50" />
					</div>
					<div class="col-sm-2"></div>
				</div>
			</div>
		</div>
        <div class="panel panel-default">
            <div class="panel-body">Validation</div>
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