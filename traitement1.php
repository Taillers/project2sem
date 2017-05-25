<?php
    session_start();
    if(isset($_POST['accord']))
    {
        $_SESSION['accord'] = $_POST['accord'];
        if($_POST['accord'] == "oui")
        {
            include("page1.php");
        }
        else
        {
            header("Location: page4.php");
            exit;
        }
    }
    else
    {
        header("Location: index.php");
        exit;
    }
 ?>
