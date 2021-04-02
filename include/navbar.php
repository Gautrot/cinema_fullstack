<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark ps-3 pe-3">
  <div class="pe-5 text-light">Bonjour <?php echo $_SESSION['nom'];?> !</div>
  <div class="btn-group" role="group">
    <form action="../traitement/Deconnexion.php" method="post">
      <button class="btn btn-danger" type="submit">Se déconnecter</button>
    </form>
    <form action="../vue/Modifier.php" method="post">
      <button class="btn btn-primary" type="submit">Modifier</button>
    </form>
  </div>
</nav>
