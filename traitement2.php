
<?php
    session_start();
	$oneError = "";
    if(isset($_POST['age']))
    {
        $_SESSION['age'] = $_POST['age'];
		if(empty($_SESSION['age']))
		{
			$oneError .= "Votre age ne peut pas &ecirc;tre vide.</br>";
		}
    }
	else
	{
		$oneError .= "Vous devez indiquer votre age.</br>";
	}
    if(isset($_POST['sexe']))
    {
        $_SESSION['sexe'] = $_POST['sexe'];
    }
	else
	{
		$oneError .= "Vous devez indiquer votre sexe.</br>";
	}

    if(isset($_POST['statut']))
    {
        $_SESSION['statut'] = $_POST['statut'];
    }
	else
	{
		$oneError .= "Vous devez indiquer votre statut.</br>";
	}
	if(empty($oneError))
	{
		$_SESSION["error"] = "";
		include("page2.php");
	}
	else
	{
		$_SESSION["error"] = $oneError;
		include("page1.php");
	}
?>