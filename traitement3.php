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
        if($_SESSION['categorie'] == 'enseignant')
        {

        } 
        else if($_SESSION['categorie'] == 'itrf')
        {

        }
        else if($_SESSION['categorie'] == 'direction')
        {

        }
    }
    else
    {
        // Retour à la page d'accueil
        header("Location: index.php");
        exit;
    }
?>