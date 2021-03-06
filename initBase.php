<?php
	$iniInfo = parse_ini_file("thesite.ini");
	$dbconn = pg_connect("host=".$iniInfo['dbaddress']." dbname=".$iniInfo['dbname']." user=".$iniInfo['dbuser']." password=".$iniInfo['dbpassword']."")
	or die('Connexion impossible : ' . pg_last_error());

	$result = pg_query($dbconn,  "select * from departement");
	$nbLignes = pg_num_rows($result);
	if($nbLignes == 0)
	{
		$depts = array();
		$depts["01"] = "Ain";
		$depts["02"] = "Aisne";
		$depts["03"] = "Allier";
		$depts["04"] = "Alpes de Haute Provence";
		$depts["05"] = "Hautes Alpes";
		$depts["06"] = "Alpes Maritimes";
		$depts["07"] = "Ardèche";
		$depts["08"] = "Ardennes";
		$depts["09"] = "Ariège";
		$depts["10"] = "Aube";
		$depts["11"] = "Aude";
		$depts["12"] = "Aveyron";
		$depts["13"] = "Bouches du Rhône";
		$depts["14"] = "Calvados";
		$depts["15"] = "Cantal";
		$depts["16"] = "Charente";
		$depts["17"] = "Charente Maritime";
		$depts["18"] = "Cher";
		$depts["19"] = "Corrèze";
		$depts["2A"] = "Corse du Sud";
		$depts["2B"] = "Haute Corse";
		$depts["21"] = "Côte d'Or";
		$depts["22"] = "Côtes d'Armor";
		$depts["23"] = "Creuse";
		$depts["24"] = "Dordogne";
		$depts["25"] = "Doubs";
		$depts["26"] = "Drôme";
		$depts["27"] = "Eure";
		$depts["28"] = "Eure et Loir";
		$depts["29"] = "Finistère";
		$depts["30"] = "Gard";
		$depts["31"] = "Haute Garonne";
		$depts["32"] = "Gers";
		$depts["33"] = "Gironde";
		$depts["34"] = "Hérault";
		$depts["35"] = "Ille et Vilaine";
		$depts["36"] = "Indre";
		$depts["37"] = "Indre et Loire";
		$depts["38"] = "Isère";
		$depts["39"] = "Jura";
		$depts["40"] = "Landes";
		$depts["41"] = "Loir et Cher";
		$depts["42"] = "Loire";
		$depts["43"] = "Haute Loire";
		$depts["44"] = "Loire Atlantique";
		$depts["45"] = "Loiret";
		$depts["46"] = "Lot";
		$depts["47"] = "Lot et Garonne";
		$depts["48"] = "Lozère";
		$depts["49"] = "Maine et Loire";
		$depts["50"] = "Manche";
		$depts["51"] = "Marne";
		$depts["52"] = "Haute Marne";
		$depts["53"] = "Mayenne";
		$depts["54"] = "Meurthe et Moselle";
		$depts["55"] = "Meuse";
		$depts["56"] = "Morbihan";
		$depts["57"] = "Moselle";
		$depts["58"] = "Nièvre";
		$depts["59"] = "Nord";
		$depts["60"] = "Oise";
		$depts["61"] = "Orne";
		$depts["62"] = "Pas de Calais";
		$depts["63"] = "Puy de Dôme";
		$depts["64"] = "Pyrénées Atlantiques";
		$depts["65"] = "Hautes Pyrénées";
		$depts["66"] = "Pyrénées Orientales";
		$depts["67"] = "Bas Rhin";
		$depts["68"] = "Haut Rhin";
		$depts["69"] = "Rhône";
		$depts["70"] = "Haute Saône";
		$depts["71"] = "Saône et Loire";
		$depts["72"] = "Sarthe";
		$depts["73"] = "Savoie";
		$depts["74"] = "Haute Savoie";
		$depts["75"] = "Paris";
		$depts["76"] = "Seine Maritime";
		$depts["77"] = "Seine et Marne";
		$depts["78"] = "Yvelines";
		$depts["79"] = "Deux Sèvres";
		$depts["80"] = "Somme";
		$depts["81"] = "Tarn";
		$depts["82"] = "Tarn et Garonne";
		$depts["83"] = "Var";
		$depts["84"] = "Vaucluse";
		$depts["85"] = "Vendée";
		$depts["86"] = "Vienne";
		$depts["87"] = "Haute Vienne";
		$depts["88"] = "Vosges";
		$depts["89"] = "Yonne";
		$depts["90"] = "Territoire de Belfort";
		$depts["91"] = "Essonne";
		$depts["92"] = "Hauts de Seine";
		$depts["93"] = "Seine St Denis";
		$depts["94"] = "Val de Marne";
		$depts["95"] = "Val d'Oise";
		$depts["97"] = "DOM";
		foreach($depts as $key => $value) {
			$goodValue = pg_escape_string($value);
			$query = 'insert into departement(code_departement, nom_departement) values (\''.$key.'\',\''.$goodValue.'\')';
			pg_query($dbconn,$query);
		}

	}
	$result = pg_query($dbconn,  "select * from filiere");
	$nbLignes = pg_num_rows($result);
	if($nbLignes == 0)
	{
		$filiere = array( "1" => "Filière Administrative",
						  "2" => "Filière Technique",
						  "3" => "Filière sociale et santé",
						  "4" => "Filière laboratoire"
			);
		foreach($filiere as $key => $value) {
			$goodValue = pg_escape_string($value);
			$query = 'insert into filiere(num_filiere, nom_filiere) values ('.$key.',\''.$goodValue.'\')';
			pg_query($dbconn,$query);
		}
	}
	$result = pg_query($dbconn,  "select * from fonction");
	$nbLignes = pg_num_rows($result);
	if($nbLignes == 0)
	{
		$fonction = array("Enseignement",
						  "Directeur d'école",
						  "Conseiller pédagogique",
						  "autre",
						  "AED",
						  "CPE",
						  "PLP",
						  "Certifié",
						  "Agrégé",
						  "PEPS"
			);
		foreach($fonction as $key => $value) {
			$goodValue = pg_escape_string($value);
			$query = 'insert into fonction(nom_fonction) values (\''.$goodValue.'\')';
			pg_query($dbconn,$query);
		}
	}
	$result = pg_query($dbconn,  "select * from type_etablissement");
	$nbLignes = pg_num_rows($result);
	if($nbLignes == 0)
	{
		$fonction = array( "Collège et SEGPA",
						  "Lycée général",
						  "Lycée professionnel",
						  "autre établissement",
						  "école maternelle",
						  "école élémentaire",
						  "Service académiques"
			);
		foreach($fonction as $value) {
			$goodValue = pg_escape_string($value);
			$query = 'insert into type_etablissement(lib_type_etablissement) values (\''.$goodValue.'\')';
			pg_query($dbconn,$query);
		}
	}
	$result = pg_query($dbconn,  "select * from statut");
	$nbLignes = pg_num_rows($result);
	if($nbLignes == 0)
	{
		$statut = array( "1" => "Titulaire",
						  "2" => "Contractuel",
						  "3" => "Stagiaire"
			);
		foreach($statut as $key => $value) {
			$goodValue = pg_escape_string($value);
			$query = 'insert into statut(num_statut, lib_statut) values ('.$key.',\''.$goodValue.'\')';
			pg_query($dbconn,$query);
		}
	}
	$result = pg_query($dbconn,  "select * from statut_sonde");
	$nbLignes = pg_num_rows($result);
	if($nbLignes == 0)
	{
		$statut = array( "1" => "Titulaire",
						  "2" => "Contractuel",
						  "3" => "Stagiaire"
			);
		foreach($statut as $key => $value) {
			$goodValue = pg_escape_string($value);
			$query = 'insert into statut_sonde(num_statut, lib_statut) values ('.$key.',\''.$goodValue.'\')';
			pg_query($dbconn,$query);
		}
	}
	pg_close($dbconn);
?>