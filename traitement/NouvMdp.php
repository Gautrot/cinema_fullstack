<?php
require_once '../model/Utilisateur.php';
require_once '../manager/Manager.php';

#Vérifie si les nouveaux mot de passes sont identiques
if ($_POST['mdp'] === $_POST['mdpconfirm']) {
  try {
    #Instancie la classe Utilisateur
    $user = new Utilisateur([
      'mdp' => $_POST['mdp']
    ]);
    #Instancie la classe Manager
    $manager = new Manager();
    #Lance la méthode nouvMdp
    $manager->nouvMdp($user);
    //$_SESSION['succes'] = $s->getMessage();
  }
  #Affiche un message d'erreur
  catch (Exception $e) {
    $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
  }
}

#Affiche un message d'erreur
else {
  header("Location: ../vue/NouvMdp.php");
  echo 'Erreur : Les mots de passes ne sont pas identiques.';
}
?>
