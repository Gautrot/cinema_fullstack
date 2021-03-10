<?php
require_once '../model/Utilisateur.php';
require_once '../manager/Manager.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <?php include '../include/head.php'; ?>
    <title>Inscription</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/addition/signin.css" rel="stylesheet">
  </head>
  <body class="text-center bg-dark">
    <div class="container">
      <?php
      if (isset($_SESSION['erreur'])) {
        echo '<div class="col-xl-12 col-lg-10 col-md-8 card card-body o-hidden border-0 shadow-lg my-5 text-center alert alert-danger" role="alert">
                '.$_SESSION['erreur'].'
              </div>';
      }
      ?>
      <div class="mx-auto col-xl-6 col-lg-6 col-md-6 card card-body o-hidden border-0 shadow-lg my-5 text-center">
        <form method="post" action="../traitement/Inscription.php">
          <h1 class="h3 m-3 fw-normal">S'inscrire</h1>
          <div class="row p-1">
            <div class="col-sm-6">
              <input type="text" name="nom" class="form-control" placeholder="Nom" required>
            </div>
            <div class="col-sm-6">
              <input type="text" name="prenom" class="form-control" placeholder="Prénom" required>
            </div>
          </div>
          <div class="row p-1">
            <div class="col-sm-6">
              <input type="email" name="email" class="form-control" placeholder="E-mail" required>
            </div>
            <div class="col-sm-6">
              <input type="email" name="emailconfirm" class="form-control" placeholder="Confirmer" required>
            </div>
          </div>
          <div class="row p-1">
            <div class="col-sm-6">
              <input type="password" name="mdp" class="form-control" placeholder="Mot de passe" required>
            </div>
            <div class="col-sm-6">
              <input type="password" name="mdpconfirm" class="form-control" placeholder="Confirmer" required>
            </div>
          </div>
          <button class="m-3 w-50 btn btn-primary" type="submit">S'inscrire</button>
        </form>
      </div>
      <p class="mb-3 text-muted">&copy; 2021 - Projet</p>
    </div>
  </body>
</html>
