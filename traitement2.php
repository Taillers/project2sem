
<?php
    session_start();
    if(isset($_POST['age']))
    {
        $_SESSION['age'] = $_POST['age'];
    }

    if(isset($_POST['sexe']))    
    {
        $_SESSION['sexe'] = $_POST['sexe'];
    }

    if(isset($_POST['statut']))    
    {
        $_SESSION['statut'] = $_POST['statut'];
    }
    include("page2.php");
?>