<?php
require_once '../model/Ticket.php';
require_once '../model/Tarif.php';
require_once '../model/Salle.php';
require_once '../manager/Manager.php';

try {
  #Instancie la classe Manager
  $manager = new Manager();

  #Instancie la classe Tarif
  $tarif = new Tarif([
    'idTarif' => $_POST['idTarif']
  ]);
  #Lance la méthode selectTarif
  $manager->validTarif($tarif);

  #Instancie la classe Salle
  $salle = new Salle([
    'numSalle' => $_POST['numSalle']
  ]);
  #Lance la méthode selectSalle
  $manager->validSalle($salle);

  #Instancie la classe Ticket
  $ticket = new Ticket([
    'idUtil' => $_POST['idUtil'],
    'idSalle' => $_POST['idSalle'],
    'idTarif' => $_POST['idTarif']
  ]);
  #Lance la méthode addTicket
  $manager->validTicket($ticket);
}

#Affiche un message d'erreur
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}
?>
