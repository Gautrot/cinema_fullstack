<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark ps-3 pe-3">
  <div class="container-fluid">
    <div class="pe-4 text-light">Bonjour <?php echo $_SESSION['nom'];?> !</div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item m-2">
          <form action="../traitement/Deconnexion.php" method="post">
            <button class="btn btn-danger" type="submit">Se déconnecter</button>
          </form>
        </li>
        <li class="nav-item m-2">
          <form action="../vue/Modifier.php" method="post">
            <button class="btn btn-primary" type="submit">Modifier</button>
          </form>
        </li>
        <li class="nav-item dropdown m-2">
          <button class="nav-link dropdown-toggle btn btn-primary" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Réservation
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-bag-fill" viewBox="0 0 16 16">
              <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
            </svg>
          </button>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><p class="m-0 ms-2">Places : 0</p></li>
            <li><p class="m-0 ms-2">Somme : 0.00 €</p></li>
            <hr>
            <li class="nav-item m-2">
              <form action="../vue/ReserveValide.php" method="post">
                <button class="btn btn-primary" type="submit">Valider la réserve</button>
              </form>
            </li>
          </ul>
        </li>
        <?php
        if ($_SESSION['rang'] === 'ADMIN') {
          echo '
          <li class="nav-item dropdown m-2">
            <button class="nav-link dropdown-toggle btn btn-primary" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Administration</button>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li class="nav-item m-2">
                <form action="../vue/ListeUtil.php" method="post">
                  <button class="btn btn-primary" type="submit">Liste d\'utilisateur</button>
                </form>
              </li>
              <li class="nav-item m-2">
                <form action="../vue/ListeTicket.php" method="post">
                  <button class="btn btn-primary" type="submit">Liste de tickets</button>
                </form>
              </li>
              <li class="nav-item m-2">
                <form action="../vue/AddFilm.php" method="post">
                  <button class="btn btn-primary" type="submit">Ajouter un film</button>
                </form>
              </li>
            </ul>
          </li>
          ';
        }
        ?>
      </ul>
    </div>
  </div>
</nav>
