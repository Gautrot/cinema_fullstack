<?php
require_once '../manager/Manager.php';
?>

<html lang="en">
  <!-- Header -->
  <?php include('../include/head.php'); ?>
  <title>Modifier</title>
  <!-- Fin Header -->
  <body class="bg-dark">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6 card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-5 text-center text-gray-900">
            <h4>Modifier votre compte</h4>
            <hr>
            <form class="user" action="../traitement/Modifier.php" method="post">
              <div class="form-group row">
                <div class="col-6 mb-2">
                  <input class="form-control form-control-user" type="text" name="nom" placeholder="Nom" value="<?php echo $_SESSION['nom'] ?>" required>
                </div>
                <div class="col-6">
                  <input class="form-control form-control-user" type="text" name="prenom" placeholder="Prénom" value="<?php echo $_SESSION['prenom'] ?>" required>
                </div>
              </div>
              <div class="form-group row justify-content-center">
                <div class="mb-2">
                  <input class="form-control form-control-user" type="email" name="email" placeholder="E-mail" value="<?php echo $_SESSION['email'] ?>" required>
                </div>
              </div>
              <div class="form-group row justify-content-center">
                <div class="col-6 mb-5">
                  <input class="form-control form-control-user" type="password" name="mdp" placeholder="Mot de passe" required>
                </div>
                <div class="col-6">
                  <input class="form-control form-control-user" type="password" name="mdpconfirm" placeholder="Confirmer" required>
                </div>
              </div>
              <div class="justify-content-center">
                <input class="btn btn-primary" type="submit" value="Modifier" />
              </div>
            </form>
            <div class="text-danger form-text text-center">
<!-- PHP : Message d'erreur de modification -->
              <?php if (isset($_SESSION['erreur'])) { echo $_SESSION['erreur']; }?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- JS -->
    <?php include('../include/javascript.php'); ?>
    <!-- Fin JS -->
  </body>
</html>
