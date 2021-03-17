<?php
require_once '../model/Utilisateur.php';
require_once '../manager/Manager.php';

#Vérifie si les mot de passes sont identiques
if ($_POST['mdp'] === $_POST['mdpconfirm']) {
  try {
    #Instancie la classe Utilisateur
    $user = new Utilisateur([
      'idUtil' => $_SESSION['idUtil'],
      'nom' => $_POST['nom'],
      'prenom' => $_POST['prenom'],
      'mdp' => $_POST['mdp'],
      'email' => $_POST['email']
    ]);
    var_dump($user);
    //die();
    #Instancie la classe Manager
    $manager = new Manager();
    #Lance la méthode modifier
    $manager->modifier($user);
    //$_SESSION['succes'] = $s->getMessage();
  }
  #Affiche un message d'erreur
  catch (Exception $e) {
    $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
  }
}

#Affiche un message d'erreur
else {
  header("Location: ../vue/Modifier.php");
  echo 'Erreur : Les mots de passes ou e-mails ne sont pas identiques.';
}
?>
