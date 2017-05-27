<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Projet Alexandre Cocquerez</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <script src="jquery/jquery-3.2.1.min.js"></script>
  <link rel="stylesheet" href="css/perso.css">
</head>
<body><?php include("includes/header.php");?><?php include("includes/navigation.php");?>
<?php
    if(!isset($_SESSION['connected']) || $_SESSION['connected'] == false)
    {
        if(isset($_POST['UserName']) && isset($_POST['UserPassword']))
        {
            if($_POST['UserName'] == "admin" && $_POST['UserPassword'] == "1234" )
            {
                $_SESSION['connected'] = true;
                echo '<p>';
                echo 'Bienvenue sur la page d\'administration du projet';
                echo '</p>';
            }
            else
            {
			    echo '<div class="alert alert-danger">';
			    echo '<strong>Erreur!</strong> Nom d\'utilisateur ou mot de passe invalide';
			    echo '</div>';
            }
        }
        else
        {
            echo '<div class="alert alert-danger">';
            echo '<strong>Erreur!</strong> La page demand&eacute;e n\'existe pas';
            echo '</div>';
        }
    }
    ?>
<?php
    if((isset($_SESSION['connected'])) && $_SESSION['connected'] == true)
    {
        if(isset($_POST['nomtable']))
        {
            $_SESSION['nomtable'] = $_POST['nomtable'];
        }
    ?>
    <p>Interrogation par nom de table</p>

    <form class="form-inline" method="post" action="admin.php">
        <div class="form-group">
            <label for="nomtable">Nom de la table:</label>
            <input type="text" class="form-control" id="nomtable" name="nomtable" value="<?php echo (isset($_SESSION['nomtable']))?$_SESSION['nomtable']:'';?>" />
        </div>
        <button type="submit" class="btn btn-default">Afficher</button>
    </form>
    <p>

    </p>

    <?php
    if(isset($_SESSION['nomtable']))
    {
        $iniInfo = parse_ini_file("thesite.ini");
        $dbconn = pg_connect("host=".$iniInfo['dbaddress']." dbname=".$iniInfo['dbname']." user=".$iniInfo['dbuser']." password=".$iniInfo['dbpassword']."")
        or die('Connexion impossible : ' . pg_last_error());
        //Test si la base exist

        $query = 'select exists ( select 1 from information_schema.tables where table_schema = \'public\' and table_name = \''.$_SESSION['nomtable'].'\')';
        $result = pg_query($dbconn,  $query);
        $row = pg_fetch_row($result);
        $exist = $row[0];
        if($exist == 'f')
        {
            echo '<div class="alert alert-danger">';
            echo '<strong>Erreur!</strong> La table '.$_SESSION['nomtable'].' n\'existe pas';
            echo '</div>';
        }
        else
        {
            $query = 'select * from '.$_SESSION['nomtable'];
            $result = pg_query($dbconn,$query);
            $i = 0;
            echo '<div class="row"><div class="col-sm-1"></div><div class="col-sm-11">
                <table class="table table-bordered">
                    <tr>
                        ';
                        while ($i < pg_num_fields($result))
                        {
                        $fieldName = pg_field_name($result, $i);
                        echo '
                        <td>' . $fieldName . '</td>';
                        $i = $i + 1;
                        }
                        echo '
                    </tr>';
                    $i = 0;
                    while ($row = pg_fetch_row($result))
                    {
                    echo '
                    <tr>
                        ';
                        $count = count($row);
                        $y = 0;
                        while ($y < $count)
                        {
                        $c_row = current($row);
                        echo '
                        <td>' . $c_row . '</td>';
                        next($row);
                        $y = $y + 1;
                        }
                        echo '
                    </tr>';
                    $i = $i + 1;
                    }
                    pg_free_result($result);
                    echo '
                </table>
            </div></div>';
       }
    }
    ?>
<?php
    }
    ?>
    <?php include("includes/footer.php");?>
</body>
</html>'