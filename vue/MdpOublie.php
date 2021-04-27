<?php
require_once '../model/Utilisateur.php';
require_once '../manager/Manager.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <?php include '../include/head.php'; ?>
    <title>Mot de passe oublié ?</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <!-- Custom styles for this template -->
    <link href="../bootstrap/css/addition/signin.css" rel="stylesheet">
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
        <form method="post" action="../traitement/MdpOublie.php">
          <h1 class="h3 m-3 fw-normal">Mot de passe oublié ?</h1>
          <hr>
          <div class="text-center mt-2 fs-6">
            <p class="small">Saisissez votre e-mail pour recevoir un lien pour modifier votre mot de passe.</p>
          </div>
          <div class="mx-auto col-6 m-2">
            <input type="email" name="email" class="form-control" placeholder="E-mail" required autofocus>
          </div>
          <button class="w-50 btn btn-primary" type="submit">Envoyer</button>
        </form>
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
