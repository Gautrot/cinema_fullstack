<?php
require_once '../model/Film.php';
require_once '../manager/Manager.php';

try {
  #Instancie la classe Utilisateur
  $film = new Film([
    'nomFilm' => $_POST['nomFilm']
  ]);
  #Instancie la classe Manager
  $manager = new Manager();
  #Lance la méthode connexion
  $manager->listeFilm($film);
}

#Affiche un message d'erreur
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}
?>
