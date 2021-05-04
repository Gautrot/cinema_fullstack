<?php
require_once '../model/Utilisateur.php';
require_once '../manager/Manager.php';

#Vérifie si la ligne est rempli dans le tableau
if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mdp']) && !empty($_POST['email']) && !empty($_POST['rang'])) {
  try {
    #Instancie la classe Utilisateur
    $mdp = $_POST['mdp'];
    $user = new Utilisateur([
      'nom' => $_POST['nom'],
      'prenom' => $_POST['prenom'],
      'mdp' => $_POST['mdp'],
      'email' => $_POST['email'],
      'rang' => $_POST['rang'],
      'idTarif' => '1'
    ]);
    #Instancie la classe Manager
    $manager = new Manager();
    #Lance la méthode addUtil
    $manager->addUtil($user);
    //$_SESSION['succes'] = $s->getMessage();
  }
  #Affiche un message d'erreur
  catch (Exception $e) {
    $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
  }
}

#Affiche un message d'erreur
else {
  header("Location: ../vue/ListeUtil.php");
  echo 'Erreur : Un ou plusieurs champs ne sont pas saisis.';
}
?>
