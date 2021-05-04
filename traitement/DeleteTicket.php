<?php
require_once '../model/Utilisateur.php';
require_once '../manager/Manager.php';

#Vérifie si l'id du ticket existe dans le tableau
try {
  #Instancie la classe Ticket
  $ticket = new Ticket([
    'id' => $_POST['id']
  ]);
  #Instancie la classe Manager
  $manager = new Manager();
  #Lance la méthode deleteTicket
  $manager->deleteTicket($ticket);
  //$_SESSION['succes'] = $s->getMessage();
}
#Affiche un message d'erreur
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}

?>
