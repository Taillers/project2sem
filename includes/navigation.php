<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Accueil</a></li>
      <li ><a href="clean.php">R.A.Z.</a></li>
      <?php 
        if(isset($_SESSION['connected']) && $_SESSION['connected'] == true;)
        {
          echo '<li><a href="connect.php">Deconnexion</a></li>';
        }
        else
        {
          echo '<li><a href="connect.php">Administration</a></li>';
        }
      ?>
    </ul>
  </div>
</nav>