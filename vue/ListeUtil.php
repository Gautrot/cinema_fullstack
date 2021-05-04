<?php
require_once '../manager/Manager.php';

$liste = new Manager();
$res = $liste->listeUtilisateur();
?>

<!doctype html>
<html lang="fr">
  <head>
    <?php include '../include/head.php'; ?>
    <title>Liste d'utilisateurs</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
            <h6 class="m-0 font-weight-bold text-dark">Liste d'utilisateurs</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Mot de passe</th>
                    <th>Rang</th>
                    <th style="width:50px">Sélectionner</th>
                  </tr>
                </thead>
                <tbody>
                  <form method="post" action="../traitement/DeleteUtil.php">
                    <?php
                    foreach ($res as $value) {
                    ?>
                    <tr>
                      <td name="idUtil" value="idUtil"><?php echo $value['idUtil']; ?></td>
                      <input name="idUtil" value="<?php echo $value['idUtil']; ?>" hidden />
                      <td name="nom" value="nom"><?php echo $value['nom']; ?></td>
                      <input name="nom" value="<?php echo $value['nom']; ?>" hidden />
                      <td name="prenom" value="prenom"><?php echo $value['prenom']; ?></td>
                      <input name="prenom" value="<?php echo $value['prenom']; ?>" hidden />
                      <td name="email" value="email"><?php echo $value['email']; ?></td>
                      <input name="email" value="<?php echo $value['email']; ?>" hidden />
                      <td name="mdp" value="mdp"><?php echo $value['mdp']; ?></td>
                      <input name="mdp" value="<?php echo $value['mdp']; ?>" hidden />
                      <td name="rang" value="rang"><?php echo $value['rang']; ?></td>
                      <input name="rang" value="<?php echo $value['rang']; ?>" hidden />
                      <td>
                        <input class="btn btn-primary" type="submit" value="Supprimer" />
                      </td>
                    </tr>
                    <?php
                    }
                    ?>
                  </form>
                  <form method="post" action="../traitement/AddUtil.php">
                    <tr>
                      <td></td>
                      <td><input type="text" name="nom" placeholder="Nom"></td>
                      <td><input type="text" name="prenom" placeholder="Prénom"></td>
                      <td><input type="email" name="email" placeholder="E-mail"></td>
                        <td><input type="password" name="mdp" placeholder="Mot de passe"></td>
                      <td>
                        <select name="rang">
                          <option name="USER" value="USER">USER</option>
                          <option name="ADMIN" value="ADMIN">ADMIN</option>
                        </select>
                      </td>
                      <td><input class="btn btn-primary" type="submit" value="Ajouter" /></td>
                    </tr>
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
        </div>
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
