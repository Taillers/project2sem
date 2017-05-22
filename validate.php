<?php session_start() ?>
<p>pour la session</p>
<table>
	<?php


    foreach ($_SESSION as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }


    ?>
</table>
<p> pour les posts</p>
<table>
	<?php


    foreach ($_POST as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }


    ?>
</table>
<?php
	$oneError = "";
    if(isset($_POST['niveaumental']))
    {
        $_SESSION['niveaumental'] = $_POST['niveaumental'];
    }
	else
	{
		$oneError .= "Vous devez indiquer niveau d'activit&eacute; mental.<br />";
	}
    if(isset($_POST['niveauphysique']))
    {
        $_SESSION['niveauphysique'] = $_POST['niveauphysique'];
    }
	else
	{
		$oneError .= "Vous devez indiquer niveau d'activit&eacute; physique.<br />";
	}
	if(empty($oneError))
	{
		$iniInfo = parse_ini_file("thesite.ini");
		$dbconn = pg_connect("host=".$iniInfo['dbaddress']." dbname=".$iniInfo['dbname']." user=".$iniInfo['dbuser']." password=".$iniInfo['dbpassword']."")
		or die('Connexion impossible : ' . pg_last_error());
		$iniInfo = parse_ini_file("thesite.ini");
		$dbconn = pg_connect("host=".$iniInfo['dbaddress']." dbname=".$iniInfo['dbname']." user=".$iniInfo['dbuser']." password=".$iniInfo['dbpassword']."")
		or die('Connexion impossible : ' . pg_last_error());
		echo 'connexion successful<br/>';
		$query = "insert into sonde (age, sexe, anciennete, personnel_irtf, niveau_activite_mentale, niveau_activite_physique, num_statut, code_departement) values ( ";
		$query .= $_SESSION['age'].',\''.$_SESSION['sexe'].'\',';
		if($_SESSION['anciennete'] == 'moinsunan')
		{
			$query .= '0,';
		}
		else
		{
			$query .= $_SESSION['anneanciennete'].',';
		}
		if($_SESSION['categorie'] == 'itrf')
		{
			if($_SESSION['filiere'] == 'filiereitrf')
			{
				$query .= 'true,';
			}
			else
			{
				$query .= 'false,';
			}
		}
		else
		{
			$query .= 'false,';
		}
		$query .= $_SESSION['niveaumental'].',';
		$query .= $_SESSION['niveauphysique'].',';
		$query .= $_SESSION['statut'].',';
		$query .= '\''.$_SESSION['departement'].'\') RETURNING num_sonde';

		$result = pg_query($dbconn,$query);
		$row = pg_fetch_row($result);
		$lastIdSonde = $row[0];

		if($_SESSION['categorie'] == 'enseignant')
		{
			if($_SESSION['peoo'] == 'undegre')
			{
				$nbClasse = 0;
				if($_SESSION['peeo1b'] == "5")
				{
					$nbClasse = $_SESSION['nbclassemarternelle'];
				}
				else if($_SESSION['peeo1b'] == "6")
				{
					$nbClasse = $_SESSION['nbclassemarternelle'];
				}

				$query = 'insert into perso_ens_edu_orien_degre1(nb_classes,rep,num_type_etablissement,num_fonction) values ('.$_SESSION['nbclassemarternelle'].','.$_SESSION['rep'].','.$_SESSION['peeo1b'].','.$_SESSION['peeo1a'].' ) returning num_peeo1';
				$result = pg_query($dbconn,$query);
				$row = pg_fetch_row($result);
				$numpeeo1 = $row[0];
				$autreQuery = 'update sonde set num_peeo1 = '.$numpeeo1 .' where num_sonde = ' .$lastIdSonde;
				pg_query($dbconn,$autreQuery);
			}
			if($_SESSION['peoo'] == 'deuxdegre')
			{
			//perso_ens_edu_orien_degre2 num_type_etablissement num_statut
				$query = 'insert into perso_ens_edu_orien_degre2(num_type_etablissement,num_statut) values ('.$_SESSION['peoo2type'].','.$_SESSION['statut'].') returning num_peeo2';
				$result = pg_query($dbconn,$query);
				$row = pg_fetch_row($result);
				$numpeeo2 = $row[0];
				$autreQuery = 'update sonde set num_peeo2 = '.$numpeeo2 .' where num_sonde = ' .$lastIdSonde;
				pg_query($dbconn,$autreQuery);
			}
		}
		if($_SESSION['categorie'] == 'itrf')
		{
			if($_SESSION['filiere'] == 'filiereitrf')
			{
				if($_SESSION['filiereirtffunc'] == "filiereitrffuncdirection")
				{
					// personnel_direction num_type_etablissement num_personnel_direction
					$query = 'insert into personnel_direction(num_type_etablissement) values ('.$_SESSION['pdi1a'].') returning num_personnel_direction';
					$result = pg_query($dbconn,$query);
					$row = pg_fetch_row($result);
					$numpedir = $row[0];
					$autreQuery = 'update sonde set num_personnel_direction = '.$numpedir .' where num_sonde = ' .$lastIdSonde;
					pg_query($dbconn,$autreQuery);
				}
				if($_SESSION['filiereirtffunc'] == "filiereitrffuncinspection")
				{
					// personnel_direction num_type_etablissement num_personnel_direction
					$goodValue = pg_escape_string($_SESSION['pdi2a']);
					$query = 'insert into personnel_inspection(niveau) values (\''.$goodValue.'\') returning num_personnel_inspection';
					$result = pg_query($dbconn,$query);
					$row = pg_fetch_row($result);
					$numpeinsp = $row[0];
					$autreQuery = 'update sonde set num_personnel_inspection = '.$numpeinsp .' where num_sonde = ' .$lastIdSonde;
					pg_query($dbconn,$autreQuery);
				}
			}
			if($_SESSION['filiere'] == 'filiereatss')
			{
				// personnnel_atss categorie num_type_etablissement num_filiere num_personnel_atss
				$query = 'insert into personnnel_atss(categorie,num_type_etablissement,num_filiere) values (\''.$_SESSION['filiereatsscatg'].'\','.$_SESSION['filiereatsstype'].' , '.$_SESSION['filiereatss'].') returning num_personnel_atss';
				$result = pg_query($dbconn,$query);
				$row = pg_fetch_row($result);
				$numpeatss = $row[0];
				$autreQuery = 'update sonde set num_personnel_atss = '.$numpeatss .' where num_sonde = ' .$lastIdSonde;
				pg_query($dbconn,$autreQuery);
			}
		}
		if($_SESSION['categorie'] == 'direction')
		{
		}

		pg_close($dbconn);
	}
	else
	{
		$_SESSION["error"] = $oneError;
		include("page3.php");
	}
?>