<?php
require_once '../manager/Manager.php';
?>

<!doctype html>
<html lang="fr">
  <head>
    <?php include '../include/head.php'; ?>
    <title>Liste d'utilisateurs</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <link href="../bootstrap/css/addition/carousel.css" rel="stylesheet">
  </head>
  <body class="bg-dark" style="padding-bottom:0px">
    <!-- Header -->
    <header>
      <!-- Navbar -->
      <?php include '../include/navbar.php'; ?>
      <!-- Fin Navbar -->
    </header>
    <!-- Fin Header -->
    <main>
      <div class="bg-light container">
        <hr class="featurette-divider">
      </div>
      <div class="bg-dark p-5">
        <div class="container">
          <h1>Liste d'utilisateurs</h1>
        </div>
      </div>
      <div class="bg-light container">
        <hr class="featurette-divider">
      </div>
      <!-- Fin Container -->
    </main>
    <!-- Fin Contenu -->
    <!-- JS -->
    <?php include '../include/javascript.php'; ?>
  </body>
  <!-- Footer -->
  <?php include '../include/footer.php'; ?>
  <!-- Fin Footer -->
</html>
