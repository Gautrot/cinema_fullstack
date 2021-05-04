<?php
require_once '../manager/Manager.php';

$liste = new Manager();
$res = $liste->listeTicket();

?>

<!doctype html>
<html lang="fr">
  <head>
    <?php include '../include/head.php'; ?>
    <title>Liste de tickets</title>
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
        <!-- Tableau -->
        <div class="card shadow">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Liste de tickets</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>ID Utilisateur</th>
                    <th>ID Salle</th>
                    <th>ID Tarif</th>
                    <th style="width:50px">Selectionner</th>
                  </tr>
                </thead>
                <tbody>
                  <form method="post" action="../traitement/SupprTicket.php">
                    <?php
                    foreach ($res as $value) {
                    ?>
                    <tr>
                      <td name="<?php echo $value['idUtil']; ?>"><?php echo $value['idUtil']; ?></td>
                      <td name="<?php echo $value['idSalle']; ?>"><?php echo $value['idSalle']; ?></td>
                      <td name="<?php echo $value['idTarif']; ?>"><?php echo $value['idTarif']; ?></td>
                      <td><input class="btn btn-primary" type="submit" value="Supprimer" /></td>
                    </tr>
                    <?php
                    }
                    ?>
                  </form>
                </tbody>
              </table>
            </div>
          </div>
          <p class="text-danger form-text text-center">
            <?php
            if (isset($_SESSION['erreur'])) {
              echo $_SESSION['erreur'];
            }
            ?>
          </p>
        <!-- Fin Tableau -->
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
