<?php
require_once '../model/Salle.php';
require_once '../manager/Manager.php';

try {
  #Instancie la classe Utilisateur
  $salle = new Salle([
    'idFilm' => $_SESSION['idFilm']
  ]);
  #Instancie la classe Manager
  $manager = new Manager();
  #Lance la méthode selectSalle
  $manager->selectSalle($salle);
}

#Affiche un message d'erreur
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}
?>
