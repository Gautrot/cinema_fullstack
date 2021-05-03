<?php
require_once '../model/Film.php';
require_once '../model/Salle.php';
require_once '../manager/Manager.php';

#Instancie la classe Manager
$test = new Manager();

?>

<!doctype html>
<html lang="fr">
  <head>
    <?php include '../include/head.php'; ?>
    <title>Réservation</title>
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
          <h1>Valider la réserve</h1>
          <div class="row mx-auto col-6 card card-body shadow-lg my-5 text-center">
            <form action="../traitement/SelectSalle.php" method="post">
              <div class="form-group row">
                <div class="col-8 mt-1">
                  <p class="text-start">Film</p>
                </div>
                <div class="col-4">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-8 mt-1">
                  <p class="text-start">Salle</p>
                </div>
                <div class="col-4">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-8 mt-1">
                  <p class="text-start">Tarif</p>
                </div>
                <div class="col-4">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-8 mt-1">
                  <p class="text-start">Nombre de places</p>
                </div>
                <div class="col-4">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-8 mt-1">
                  <p class="text-start">Choix 3D</p>
                </div>
                <div class="col-2">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-8 mt-1">
                  <p class="text-start">Somme totale</p>
                </div>
                <div class="col-4">
                </div>
              </div>
              <div class="justify-content-center">
                <input class="btn btn-primary" type="submit" value="Réserver" />
              </div>
            </form>
          </div>
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
