<?php
    session_start();
    if(isset($_POST['departement']))
    {
        $_SESSION['departement'] = $_POST['departement'];
    }

    if(isset($_POST['categorie']))    
    {
        $_SESSION['categorie'] = $_POST['categorie'];
    }
    
    include("page3.php");
?>