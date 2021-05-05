<?php
require_once '../manager/Manager.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <?php include '../include/head.php'; ?>
    <title>Contact</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../bootstrap/css/addition/carousel.css" rel="stylesheet">
    <style>
  .container2 {
    position: relative;
    width: 25em;
  }

  .image2 {
    display: block;
    width: 100%;
    height: auto;
  }

  .overlay2 {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: #008CBA;
    overflow: hidden;
    width: 100%;
    height: 0;
    transition: .5s ease;
  }

  .container2:hover .overlay2 {
    height: 50%;
  }

  .text2 {
    white-space: nowrap;
    color: white;
    font-size: 20px;
    position: absolute;
    overflow: hidden;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
  }
  </style>
  </head>
  <body class="bg-dark" style="padding-bottom:0px">
    <!-- Header -->
    <header>
      <!-- Navbar -->
      <?php include '../include/navbar.php'; ?>
      <!-- Fin Navbar -->
    </header>
    <!-- Fin Header -->
    <!-- Contenu -->
    <main>
      <div class="bg-light container">
        <hr class="featurette-divider">
      </div>
      <div class="bg-dark p-5">
        <div class="container">
          <h1>Contact</h1>
          <div class="container2">
            <img src="../img/img_avatar.png" style="width:25em" alt="Avatar" class="image2">
            <div class="overlay2">
              <div class="text2">Alexandre GAUTROT<br/>Email : a.gautrot@lprs.fr<br/>Téléphone : 07 67 43 59 85</div>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-light container">
        <hr class="featurette-divider">
      </div>
      <!-- Footer -->
      <?php include '../include/footer.php'; ?>
      <!-- Fin Footer -->
    </main>
    <!-- Fin Contenu -->
    <!-- JS -->
    <?php include '../include/javascript.php'; ?>
  </body>
</html>
