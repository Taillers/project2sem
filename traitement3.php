<?php
    session_start();

	function VerifVotreFonction()
	{
		$funcError = "";
		if(isset($_POST['peoo2func']))
		{
			$_SESSION['peoo2func'] = $_POST['peoo2func'];
			if($_SESSION['peoo2func'] == '4')
			{
				if(isset($_POST['libelle2fonction']))
				{
					$_SESSION['libelle2fonction'] = $_POST['libelle2fonction'];
					if(empty($_SESSION['libelle2fonction']))
					{
						$funcError .= "Le libell&eacute; de votre fonction ne peut pas &ecirc;etre vide<br/>";
					}
				}
				else
				{
					$funcError .= "Vous devez indiquer le libell&eacute; de votre fonction<br/>";
				}
			}
		}
		else
		{
			$funcError .= "Vous devez s&eacute;lectionner votre fonction<br/>";
		}
		if(isset($_POST['peoo2type']))
		{
			$_SESSION['peoo2type'] = $_POST['peoo2type'];
			if($_SESSION['peoo2type'] == '4')
			{
				if(isset($_POST['libelle2type']))
				{
					$_SESSION['libelle2type'] = $_POST['libelle2type'];
					if(empty($_SESSION['libelle2type']))
					{
						$funcError .= "Le type de votre &eacute;tablissement ne peut pas &ecirc;etre vide<br/>";
					}
				}
				else
				{
					$funcError .= "Vous devez indiquer le type de votre &eacute;tablissement<br/>";
				}
			}
		}
		else
		{
			$funcError .= "Vous devez s&eacute;lectionner votre &eacute;tablissement<br/>";
		}

		return $funcError;
	}

	$oneError = "";
    if(isset($_POST['departement']))
    {
        $_SESSION['departement'] = $_POST['departement'];
    }
	else
	{
		$oneError = "Vous devez selectionner votre d&eacute;partement<br/>";
	}
    if(isset($_POST['anciennete']))
    {
        $_SESSION['anciennete'] = $_POST['anciennete'];
		if($_SESSION['anciennete'] == "plusunan")
		{
			if(isset($_POST['anneanciennete']))
			{
				$_SESSION['anneanciennete'] = $_POST['anneanciennete'];
				if(empty($_SESSION['anneanciennete']))
				{
					$oneError .= "Votre anciennet&eacute; ne peut pas &ecirc;tre vide.<br/>";
				}
			}
			else
			{
				$oneError .= "Votre anciennet&eacute; ne peut pas &ecirc;tre vide.<br/>";
			}
		}
    }
	else
	{
		$oneError .= "Vous devez selectionner votre anciennet&eacute;<br/>";
	}
    if(isset($_POST['categorie']))
    {
        $_SESSION['categorie'] = $_POST['categorie'];
		if($_SESSION['categorie'] == 'enseignant')
		{
			if(isset($_POST['peoo']))
			{
				$_SESSION['peoo'] = $_POST['peoo'];
				if($_SESSION['peoo'] == 'undegre')
				{
					if(isset($_POST['peeo1a']))
					{
						$_SESSION['peeo1a'] = $_POST['peeo1a'];
						if($_SESSION['peeo1a'] == 4)
						{
							if(isset($_POST['libellefonction']))
							{
								$_SESSION['libellefonction'] = $_POST['libellefonction'];
								if(empty($_SESSION['libellefonction']))
								{
									$oneError .= "Votre fonction ne peut pas être vide<br/>";
								}
							}
							else
							{
								$oneError .= "Vous devez renseigner votre fonction<br/>";
							}

						}
					}
					else
					{
						$oneError .= "Vous devez selectionner votre fonction<br/>";
					}
					if(isset($_POST['peeo1b']))
					{
						$_SESSION['peeo1b'] = $_POST['peeo1b'];
						if($_SESSION['peeo1b'] == '4')
						{
							if(isset($_POST['peeo1bautretypelibelle']))
							{
								$_SESSION['peeo1bautretypelibelle'] = $_POST['peeo1bautretypelibelle'];
								if(empty($_SESSION['peeo1bautretypelibelle']))
								{
									$oneError .= "Votre type d'&eacute;tablissement ne peut pas etre vide<br/>";
								}
							}
							else
							{
								$oneError .= "Vous devez renseigner votre type d'&eacute;tablissement<br/>";
							}
						}
						if($_SESSION['peeo1b'] == '5')
						{
							if(isset($_POST['nbclassemarternelle']))
							{
								$_SESSION['nbclassemarternelle'] = $_POST['nbclassemarternelle'];
							}
							else
							{
								$oneError .= "Vous devez renseigner le nombre de classes dans votre &eacute;tablissement<br/>";
							}
						}
						if($_SESSION['peeo1b'] == '6')
						{
							if(isset($_POST['nbclasseelementaire']))
							{
								$_SESSION['nbclasseelementaire'] = $_POST['nbclasseelementaire'];
							}
							else
							{
								$oneError .= "Vous devez renseigner le nombre de classes dans votre &eacute;tablissement<br/>";
							}
						}
					}
					else
					{
						$oneError .= "Vous devez selectionner votre type d'&eacute;tablissement<br/>";
					}
					if(isset($_POST['rep']))
					{
						$_SESSION['rep'] = $_POST['rep'];
					}
					else
					{
						$oneError .= "Vous devez indiquer si votre &eacute;tablissement est en zone prioritaire ou non<br/>";
					}
				}
				if($_SESSION['peoo'] == 'deuxdegre')
				{
					$oneError .= VerifVotreFonction();
				}

			}
			else
			{
				$oneError .= "Vous devez indiquer votre zone d'intervention<br/>";
			}
		}
		else if($_SESSION['categorie'] == 'itrf')
		{
			if(isset($_POST['filiere']))
			{
				$_SESSION['filiere'] = $_POST['filiere'];
				if($_SESSION['filiere'] == 'filiereatss')
				{
					if(isset($_POST['filiereatss']))
					{
						$_SESSION['filiereatss'] = $_POST['filiereatss'];
					}
					else
					{
						$oneError .= "Vous devez pr&eacute;ciser votre fili&egrave;re<br/>";
					}
					if(isset($_POST['filiereatsscatg']))
					{
						$_SESSION['filiereatsscatg'] = $_POST['filiereatsscatg'];
					}
					else
					{
						$oneError .= "Vous devez pr&eacute;ciser votre cat&eacute;gorie<br/>";
					}
					if(isset($_POST['filiereatsstype']))
					{
						$_SESSION['filiereatsstype'] = $_POST['filiereatsstype'];
						if($_SESSION['filiereatsstype'] == '4')
						{
							if(isset($_POST['type3fonction']))
							{
								$_SESSION['type3fonction'] = $_POST['type3fonction'];
								if(empty($_SESSION['type3fonction']))
								{
									$oneError .= "Votre type d'&eacute;tablissement ne peut pas &ecirc;tre vide<br/>";
								}
							}
							else
							{
								$oneError .= "Vous devez pr&eacute;ciser votre type d'&eacute;tablissement<br/>";
							}
						}
					}
					else
					{
						$oneError .= "Vous devez s&eacute;lectionner votre type d'&eacute;tablissement<br/>";
					}

				}
			}
			else
			{
				$oneError .= "Vous devez indiquer votre fili&egrave;re<br/>";
			}
		}
		else if($_SESSION['categorie'] == 'direction')
		{
            if(isset($_POST['filiereirtffunc']))
			{
			    $_SESSION['filiereirtffunc'] = $_POST['filiereirtffunc'];
                if($_SESSION['filiereirtffunc'] == 'filiereitrffuncdirection')
                {
                    if(isset($_POST['pdi1a']))
                    {
                        $_SESSION['pdi1a'] = $_POST['pdi1a'];
                        if($_SESSION['pdi1a'] == 4)
                        {
                            if(isset($_POST['type4type']))
                            {
                                $_SESSION['type4type'] = $_POST['type4type'];
                                if(empty($_SESSION['type4type']))
								{
									$oneError .= "Votre type d'&eacute;tablissement ne peut pas &ecirc;tre vide<br/>";
								}
                            }
                            else
                            {
                                $oneError .= "Vous devez pr&eacute;ciser votre type d'&eacute;tablissement<br/>";
                            }

                        }
                        else
                        {
                            $oneError .= "Vous devez pr&eacute;ciser votre type d'&eacute;tablissement<br/>";
                        }
                    }
                    else
                    {
                        $oneError .= "Vous devez s&eacute;lectionner votre type d'&eacute;tablissement<br/>";
                    }
                }
                if($_SESSION['filiereirtffunc'] == 'filiereitrffuncinspection')
                {
                    if(isset($_POST['pdi2a']))
                    {
                        $_SESSION['pdi2a'] = $_POST['pdi2a'];
                    }
                    else
                    {
                        $oneError .= "Vous devez s&eacute;lectionner votre degr&eacute; d'inspection<br/>";
                    }
                }
            }
            else
            {
                $oneError .= "Vous devez selectionner votre fonction<br/>";
            }
		}
    }
	else
	{
		$oneError .= "Vous devez selectionner votre cat&eacute;gorie<br/>";
	}



	if(empty($oneError))
	{
		$_SESSION["error"] = "";
		include("page3.php");
	}
	else
	{
		$_SESSION["error"] = $oneError;
		include("page2.php");
	}
?>