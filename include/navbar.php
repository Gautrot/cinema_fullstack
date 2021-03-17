<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <p>Bonjour <?php echo $_SESSION['nom'];?> !</p>
  <div class="btn-group" role="group">
    <form action="../traitement/Deconnexion.php" method="post">
      <button class="btn btn-danger" type="submit">Se déconnecter</button>
    </form>
    <form action="../vue/Modifier.php" method="post">
      <button class="btn btn-primary" type="submit">Modifier</button>
    </form>
  </div>
</nav>
