<?php
    session_start();
    if(isset($_POST['accord']))
    {
        if($_POST['accord'] == "oui")
        {
            include("page1.php");
        }
        else
        {
            session_unset();
            session_destroy();
            header("Location: index.php");
            exit;
        }
    }
 ?>