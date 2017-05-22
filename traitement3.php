<?php
    session_start();
    if(isset($_POST['departement']))
    {
        $_SESSION['departement'] = $_POST['departement'];
    }
    if(isset($_POST['anciennete']))
    {
        $_SESSION['anciennete'] = $_POST['anciennete'];
    }
    if(isset($_POST['anneanciennete']))
    {
        $_SESSION['anneanciennete'] = $_POST['anneanciennete'];
    }
    if(isset($_POST['categorie']))
    {
        $_SESSION['categorie'] = $_POST['categorie'];
    }
	if(isset($_POST['peoo']))
	{
		$_SESSION['peoo'] = $_POST['peoo'];
	}
	if(isset($_POST['peeo1a']))
	{
		$_SESSION['peeo1a'] = $_POST['peeo1a'];
	}
	if(isset($_POST['libellefonction']))
	{
		$_SESSION['libellefonction'] = $_POST['libellefonction'];
	}
	if(isset($_POST['peeo1b']))
	{
		$_SESSION['peeo1b'] = $_POST['peeo1b'];
	}
	if(isset($_POST['peeo1bautretypelibelle']))
	{
		$_SESSION['peeo1bautretypelibelle'] = $_POST['peeo1bautretypelibelle'];
	}
	if(isset($_POST['nbclassemarternelle']))
	{
		$_SESSION['nbclassemarternelle'] = $_POST['nbclassemarternelle'];
	}
	if(isset($_POST['nbclasseelementaire']))
	{
		$_SESSION['nbclasseelementaire'] = $_POST['nbclasseelementaire'];
	}
	if(isset($_POST['rep']))
	{
		$_SESSION['rep'] = $_POST['rep'];
	}
	if(isset($_POST['peoo2func']))
	{
		$_SESSION['peoo2func'] = $_POST['peoo2func'];
	}
	if(isset($_POST['libelle2fonction']))
	{
		$_SESSION['libelle2fonction'] = $_POST['libelle2fonction'];
	}
	if(isset($_POST['peoo2type']))
	{
		$_SESSION['peoo2type'] = $_POST['peoo2type'];
	}
	if(isset($_POST['libelle2type']))
	{
		$_SESSION['libelle2type'] = $_POST['libelle2type'];
	}
	if(isset($_POST['filiere']))
	{
		$_SESSION['filiere'] = $_POST['filiere'];
	}
	if(isset($_POST['filiereatss']))
	{
		$_SESSION['filiereatss'] = $_POST['filiereatss'];
	}
	if(isset($_POST['filiereatsscatg']))
	{
		$_SESSION['filiereatsscatg'] = $_POST['filiereatsscatg'];
	}
	if(isset($_POST['filiereatsstype']))
	{
		$_SESSION['filiereatsstype'] = $_POST['filiereatsstype'];
	}
	if(isset($_POST['type3fonction']))
	{
		$_SESSION['type3fonction'] = $_POST['type3fonction'];
	}
	if(isset($_POST['filiereirtffunc']))
	{
		$_SESSION['filiereirtffunc'] = $_POST['filiereirtffunc'];
	}
	if(isset($_POST['pdi1a']))
	{
		$_SESSION['pdi1a'] = $_POST['pdi1a'];
	}
	if(isset($_POST['type4type']))
	{
		$_SESSION['type4type'] = $_POST['type4type'];
	}
	if(isset($_POST['pdi2a']))
	{
		$_SESSION['pdi2a'] = $_POST['pdi2a'];
	}

?>