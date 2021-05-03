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
  $manager->selectTarif($tarif);

  #Instancie la classe Salle
  $salle = new Salle([
    'numSalle' => $_POST['numSalle']
  ]);
  #Lance la méthode selectSalle
  $manager->selectSalle($salle);

  #Instancie la classe Ticket
  $ticket = new Ticket([
    'idUtil' => $_POST['idUtil'],
    'idSalle' => $_POST['idSalle'],
    'idTarif' => $_POST['idTarif']
  ]);
  #Lance la méthode addTicket
  $manager->addTicket($ticket);
}

#Affiche un message d'erreur
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}
?>
