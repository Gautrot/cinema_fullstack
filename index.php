<?php
require_once 'model/Utilisateur.php';
require_once 'manager/Manager.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <?php include 'include/head.php'; ?>
    <title>Connexion</title>
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
      if (isset($_SESSION['succes'])) {
        echo '<div class="col-xl-12 col-lg-10 col-md-8 card card-body o-hidden border-0 shadow-lg my-5 text-center alert alert-success" role="alert">
                '.$_SESSION['succes'].'
              </div>';
      }
      ?>
      <div class="mx-auto col-xl-6 col-lg-6 col-md-6 card card-body o-hidden border-0 shadow-lg my-5 text-center">
        <form method="post" action="traitement/Connection.php">
          <h1 class="h3 m-3 fw-normal">Se connecter</h1>
          <div class="m-1">
            <input type="email" name="email" class="form-control" placeholder="E-mail" required autofocus>
          </div>
          <div class="m-1">
            <input type="password" name="mdp" class="form-control" placeholder="Mot de passe" required>
          </div>
          <div class="checkbox m-3">
            <label>
              <input type="checkbox" value="remember-me"> Se souvenir de moi
            </label>
          </div>
          <button class="w-50 btn btn-primary" type="submit">Se connecter</button>
          <div class="text-center mt-2">
            <a class="small" href="vue/Oublie.php">Mot de passe oublié ?</a>
          </div>
          <div class="text-center mt-0 mb-2">
            <a class="small" href="vue/Inscription.php">Vous êtes nouveau ? Inscrivez-vous !</a>
          </div>
        </form>
      </div>
      <p class="mb-3 text-muted">&copy; 2021 - Projet</p>
    </div>
  </body>
</html>
