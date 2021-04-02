<?php
require_once '../model/Film.php';
require_once '../manager/Manager.php';

try {
  #Instancie la classe Film
  $film = new Film([
    'nomFilm' => $_POST['nomFilm']
  ]);

  #Instancie la classe Manager
  $manager = new Manager();
  #Lance la méthode selectFilm
  $manager->selectFilm($film);
}

#Affiche un message d'erreur
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}
?>
