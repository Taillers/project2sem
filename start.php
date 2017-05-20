<table>
<?php 


    foreach ($_POST as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }


?>
</table>
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
