<?php
require_once 'model/Utilisateur.php';
require_once 'manager/Manager.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <?php include 'include/head.php'; ?>
    <title>Connexion</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <!-- Custom styles for this template -->
    <link href="bootstrap/css/addition/signin.css" rel="stylesheet">
  </head>
  <body class="text-center bg-dark">
    <div class="container">
      <?php
      if (isset($_SESSION['erreur'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                '.$_SESSION['erreur'].'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
      }
      if (isset($_SESSION['succes'])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                '.$_SESSION['succes'].'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
      }
      ?>
      <div class="mx-auto col-6 card card-body shadow-lg my-5 text-center">
        <form method="post" action="traitement/Connexion.php">
          <h1 class="h3 m-3 fw-normal">Se connecter</h1>
          <hr>
          <div class="mx-auto col-6 m-2">
            <input type="email" name="email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" class="form-control" placeholder="E-mail" required autofocus>
          </div>
          <div class="mx-auto col-6 m-1">
            <input type="password" name="mdp" class="form-control" placeholder="Mot de passe" required>
          </div>
          <div class="checkbox m-3">
              <input type="checkbox" value="remember" id="remember" <?php if(isset($_COOKIE["email"])) { ?> checked <?php } ?> />
              <label for="remember-me">Se souvenir de moi</label>
          </div>
          <button class="w-50 btn btn-primary" type="submit">Se connecter</button>
        </form>
        <div class="text-center mt-2 fs-6">
          <a class="small" href="vue/MdpOublie.php">Mot de passe oublié ?</a>
        </div>
        <div class="text-center mt-0 mb-2 fs-6">
          <a class="small" href="vue/Inscription.php">Vous êtes nouveau ? Inscrivez-vous !</a>
        </div>
      </div>
      <p class="mb-3 text-muted">&copy; 2021 - Projet</p>
    </div>
  </body>
  <script>
    var alertList = document.querySelectorAll('.alert')
    alertList.forEach(function (alert) {
    new bootstrap.Alert(alert)
    })
  </script>
</html>
