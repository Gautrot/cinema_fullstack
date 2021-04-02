<?php
require_once '../model/Film.php';
require_once '../model/Salle.php';
require_once '../manager/Manager.php';

#Instancie la classe Utilisateur
$salle = new Salle([
  'numSalle' => $_POST['numSalle']
]);
#Instancie la classe Manager
$manager = new Manager();
#Lance la méthode selectSalle
$manager->selectSalle($salle);
}

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
          <h1>Réserver une place pour <?php echo $_SESSION['nomFilm']; ?></h1>
          <div class="mx-auto col-6 card card-body shadow-lg my-5 text-center">
            <form action="../traitement/SelectSalle.php" method="post">
              <div class="mx-auto col-6 m-2">
                <select name="numSalle">
                  <?php foreach ($res as $value) {
                  echo '<option name="' .$value['numSalle']. '" value="' .$value['numSalle']. '"></option>';
                  }
                  ?>
                </select>
              </div>
              <button class="w-50 btn btn-primary" type="submit">Sélectionner la salle</button>
            </form>

            <?php if(isset($_SESSION['numSalle'])) { echo '
            <form method="post" action="../traitement/Reserve.php">
              <div class="mx-auto col-6 m-2">
                <input type="text" name="moinsPlace" class="form-control" placeholder="E-mail" required autofocus>
              </div>
              <div class="mx-auto col-6 m-1">
                <input type="password" name="mdp" class="form-control" placeholder="Mot de passe" required>
              </div>
              <button class="w-50 btn btn-primary" type="submit">Réserver</button>
            </form>
            ';}?>
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
