<?php
require_once '../model/Utilisateur.php';
require_once '../manager/Manager.php';

$a = new Utilisateur([
  'email' => $_POST['email']
]);
$b = new Manager();
$b->deconnexion($a);
?>
