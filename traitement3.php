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
    
    include("page3.php");
?>