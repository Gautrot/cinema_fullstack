<?php
require_once '../model/Utilisateur.php';
require_once '../manager/Manager.php';

#Vérifie si l'id de l'utilisateur existe dans le tableau
try {
  #Instancie la classe Utilisateur
  $user = new Utilisateur([
    'idUtil' => $_POST['idUtil']
  ]);
  #Instancie la classe Manager
  $manager = new Manager();
  #Lance la méthode deleteUtil
  $manager->deleteUtil($user);
  //$_SESSION['succes'] = $s->getMessage();
}
#Affiche un message d'erreur
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}

?>
