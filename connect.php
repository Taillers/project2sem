<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Projet Alexandre Cocquerez</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <script src="jquery/jquery-3.2.1.min.js"></script>
  <script src="css/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/perso.css">
  
</head>
<body>
  <?php include("includes/header.php");?>
  <?php include("includes/navigation.php");?>
  <?php 
    if(isset($_SESSION['connected']) && $_SESSION['connected'] == true)
    {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit;
    }
  ?>
  <form class="form-inline" method="post" action="admin.php">
  <div class="form-group">
    <label for="UserName">Nom d'utilsateur</label>
    <input type="text" class="form-control" id="UserName" placeholder="admin">
  </div>
  <div class="form-group">
    <label for="userPassword">Mot de passe</label>
    <input type="password" class="form-control" id="userPassword" placeholder="a43w54j2">
  </div>
  <button type="submit" class="btn btn-default">Login</button>
</form>
  <?php include("includes/footer.php");?>
</body>
</html>