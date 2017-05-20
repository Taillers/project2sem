<?php
    if(isset($_POST['accord']))
    {
        if($_POST['accord'] == "oui")
        {
            include("question1.php");
        }
        else
        {
            header("Location: index.php");
            exit;
        }
    }
?>
