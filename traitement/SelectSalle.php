<?php
require_once '../model/Salle.php';
require_once '../manager/Manager.php';

try {
  #Instancie la classe Utilisateur
  $salle = new Salle([
    'numSalle' => $_POST['numSalle']
  ]);
  #Instancie la classe Manager
  $manager = new Manager();
  #Lance la méthode connexion
  $manager->listeSalle($salle);
}

#Affiche un message d'erreur
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}
?>
