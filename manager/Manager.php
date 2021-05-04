<?php
# Appelle le ficher 'BDD.php'
require_once 'BDD.php';
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
/*
# PHPMailer
// Import PHPMailer classes into the global namespace
// these must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';// Load Composer's autoloader


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPauth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'projetbtssioslam@gmail.com';           // SMTP username
    $mail->Password   = 'btssioslam';                           // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');           // Add a recipient
    $mail->addAddress('ellen@example.com');                     // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    // Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');               // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');          // Optional name

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'this is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'this is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
}
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

# Fin PHP Mailer
*/

# Début classe Manager

class Manager{

// CONNECTION ET INSCRIPTION //

# Connexion

  public function connexion(Utilisateur $user) {
# Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd->co_bdd()->prepare('SELECT * FROM utilisateur
      WHERE email = :email
      AND mdp = :mdp
    ');
    $req -> execute([
      'email' => $user->getEmail(),
      'mdp' => $user->getMdp()
    ]);
    $res = $req->fetch();

# Si le formulaire de connexion est complété et trouvé dans la BDD.

    if ($res) {
      $_SESSION['idUtil'] = $res['idUtil'];
      $_SESSION['nom'] = $res['nom'];
      $_SESSION['prenom'] = $res['prenom'];
      $_SESSION['email'] = $res['email'];
      $_SESSION['rang'] = $res['rang'];
      header("Location: ../vue/Accueil.php");
    }

# Si la saisie du mot de passe ou de l'e-mail est incorrecte.

    else {
      header("Location: ../index.php");
      throw new Exception ("L'e-mail ou le mot de passe est incorrecte ou n'existe pas.");
    }
  }

# Déconnexion

  public function deconnexion(Utilisateur $user) {
    session_destroy();
    header("Location: ../index.php");
  }

# Inscription

  public function inscription(Utilisateur $user) {
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT email FROM utilisateur
      WHERE email = :email
    ');
    $req -> execute([
      'email' => $user->getEmail()
    ]);
    $res = $req -> fetchall();

# Si le compte existe dans la BDD, erreur.

    if ($res) {
      header("Location: ../vue/Inscription.php");
      throw new Exception("Ce compte existe.");
    }

    else {
      //$pass = $_POST['mdp'];
      //$hash = password_hash($pass, PASSWORD_DEFAULT);

      $req = $bdd->co_bdd()->prepare('INSERT INTO utilisateur (email, mdp, nom, prenom, rang, idTarif)
        VALUES (:email, :mdp, :nom, :prenom, :rang, :idTarif)
      ');
      //$req->bindParam(':mdp', $hash, PDO::PARAM_STR);
      $res2 = $req->execute([
        'email' => $user->getEmail(),
        'mdp' => $user->getMdp(),
        'nom' => $user->getNom(),
        'prenom' => $user->getPrenom(),
        'rang' => $user->getRang(),
        'idTarif' => $user->getIdTarif()
      ]);

# Si le formulaire d'inscription est complété.

      if ($res2) {
        header("Location: ../index.php");
        //throw new Exception("Votre compte à été crée avec succès !<br>Un e-mail sera envoyé pour valider votre inscription.");
      }

# Si un ou plusieurs champs sont vides.

      else {
        header("Location: ../vue/Inscription.php");
        throw new Exception("Inscription échouée !");
      }
    }
  }

# Mot de passe oublié

  public function oublieMdp(Utilisateur $user) {
# Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd->co_bdd()->prepare('SELECT * FROM utilisateur
      WHERE email = :email
    ');
    $req -> execute([
      'email' => $user->getEmail()
    ]);
    $res = $req->fetch();

# S'il trouve l'email de l'utilisateur, il redirige vers une page pour modifier son mot de passe.

    if ($res) {
      $_SESSION['idUtil'] = $res['idUtil'];
      $_SESSION['email'] = $res['email'];
      header("Location: ../vue/NouvMdp.php");
    }

# Si la saisie de l'e-mail est incorrecte.

    else {
      header("Location: ../vue/MdpOublie.php");
      throw new Exception ("L'e-mail est incorrecte ou n'existe pas.");
    }
  }

# Modification d'un mot de passe

  public function nouvMdp(Utilisateur $user) {
    #Instancie la classe BDD
    $bdd = new BDD();
    //$pass = $_POST['mdp'];
    //$hash = password_hash($pass, PASSWORD_DEFAULT);
    $req = $bdd->co_bdd()->prepare('UPDATE utilisateur
      SET mdp = :mdp
      WHERE idUtil = :idUtil
    ');
    //$req->bindParam(':mdp', $hash, PDO::PARAM_STR);
    $res = $req->execute([
      'mdp' => $user->getMdp(),
      'idUtil' => $user->getIdUtil()
    ]);

    var_dump($_POST['mdp']);
    var_dump($req);
    var_dump($res);
    var_dump($_SESSION);

# Si le nouveau mot de passe est saisie, il redirige vers le formulaire de connexion.

    if ($res) {
      //header("Location: ../index.php");
      //throw new Exception("Votre compte à été crée avec succès !<br>Un e-mail sera envoyé pour valider votre inscription.");
    }

# Si un ou plusieurs champs sont vides.

    else {
      die();
      //header("Location: ../vue/NouvMdp.php");
      throw new Exception("Modification échouée !");
    }
  }

// ACCUEIL //

# Modification d'un compte

  public function modifier(Utilisateur $user) {
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM utilisateur
      WHERE email = :email
      AND idUtil = :idUtil
    ');
    $req -> execute([
      'email' => $user->getEmail(),
      'idUtil' => $user->getIdUtil()
    ]);
    $res = $req -> fetch();

# S'il trouve l'utilisateur

    if ($res) {
      $req = $bdd -> co_bdd()->prepare('UPDATE utilisateur
      SET email = :email,
          mdp = :mdp,
          nom = :nom,
          prenom = :prenom
      WHERE idUtil = :idUtil
      ');
      $res2 = $req -> execute([
        'email' => $user->getEmail(),
        'mdp' => $user->getMdp(),
        'nom' => $user->getNom(),
        'prenom' => $user->getPrenom(),
        'idUtil' => $user->getIdUtil()
      ]);

# Si le formulaire de modification est bien complété

      if ($res2) {
        $_SESSION['nom'] = $res2['nom'];
        $_SESSION['prenom'] = $res2['prenom'];
        $_SESSION['email'] = $res2['email'];
        header("Location: ../vue/Accueil.php");
        //throw new Exception("Votre compte à été modifié avec succès !");
      }

      else {
        header("Location: ../vue/Modifier.php");
        throw new Exception("Modification échouée !");
      }
    }
  }

# Sélectionne les films de la BDD

  public function selectFilm(Film $film){
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM film
      WHERE nomFilm = :nomFilm
    ');
    $req->execute([
      'nomFilm' => $film->getNomFilm()
    ]);
    $film = $req->fetch();

# S'il trouve le nom du film.

    if ($film) {
      $_SESSION['nomFilm'] = $film['nomFilm'];
      $_SESSION['resumeFilm'] = $film['resumeFilm'];

      $bdd = new BDD();
      $req2 = $bdd -> co_bdd()->prepare('SELECT * FROM film
        INNER JOIN salle
        ON salle.idFilm = film.idFilm
      ');
      $req2->execute([]);
      $res = $req2->fetchall();

# S'il trouve le film dans une ou plusieurs salles, il déplace l'utilisateur vers le lien correspondant au nom du film.

      if ($res) {
        header("Location: ../vue/".$_SESSION['nomFilm'].".php");
      }
    }
  }

// RESERVER //

# Ajoute un ticket

  public function addTicket(Ticket $ticket) {
# Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd->co_bdd()->prepare('SELECT * FROM tarif, utilisateur, salle
      WHERE tarif.idTarif = :idTarif
      AND utilisateur.idUtil = :idUtil
      AND salle.idSalle = :idSalle
    ');
    $req -> execute([
      'idSalle' => $ticket->getIdSalle(),
      'idUtil' => $ticket->getIdUtil(),
      'idTarif' => $ticket->getIdTarif()
    ]);
    $res = $req->fetch();

# S'il trouve les ID de l'utilisateur, du tarif et de la salle, il ajoute un nouveau ticket.

    if ($res) {
      $req = $bdd->co_bdd()->prepare('INSERT INTO ticket (idUtil, idSalle, idTarif)
        VALUES (idUtil = :idUtil, idSalle = :idSalle, idTarif = :idTarif);
      ');
    }
  }

# Sélectionne le tarif choisi

  public function selectTarif(Tarif $tarif) {
# Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd->co_bdd()->prepare('SELECT * FROM tarif
      WHERE idTarif = :idTarif;
    ');
    $req -> execute([
      'idTarif' => $tarif->getIdTarif()
    ]);
    $res = $req->fetch();

# S'il trouve l'ID du tarif, il retourne son ID.

    if ($res) {
      $_SESSION['idTarif'] = $res['idTarif'];
    }

# Sinon erreur.

    else {
      header("Location: ../vue/Reserve.php");
      throw new Exception ("Une erreur s'est produite lors de la réservation.");
    }
  }

# Sélectionne la salle choisie

  public function selectSalle(Salle $salle) {
# Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd->co_bdd()->prepare('SELECT * FROM salle
      WHERE numSalle = :numSalle
    ');
    $req -> execute([
      'numSalle' => $salle->getNumSalle()
    ]);
    $res = $req->fetch();

# S'il trouve le numéro de la salle, il retourne son ID.

    if ($res) {
      $_SESSION['idSalle'] = $res['idSalle'];
    }

# Sinon erreur.

    else {
      header("Location: ../vue/Reserve.php");
      throw new Exception ("Une erreur s'est produite lors de la réservation.");
    }
  }

/*
----
Partie Administration
----
*/


# Liste les salles de la BDD

  public function listeSalle($numsalle){
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT numSalle, nomFilm FROM salle
      INNER JOIN film
      ON film.idFilm = salle.idFilm
      WHERE nomFilm = :nomFilm
    ');
    $req->execute([
      'nomFilm' => $numsalle
    ]);
    $a = $req->fetchall();
    return $a;
  }

# Liste les tarifs de la BDD

  public function listeTarif(){
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM tarif');
    $req->execute([]);
    $listetarif = $req->fetchall();
    return $listetarif;
  }

# Liste les utilisateurs de la BDD

  public function listeUtilisateur(){
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM utilisateur');
    $req -> execute([]);
    $listeuser = $req->fetchall();
    return $listeuser;
  }

# Liste les tickets de la BDD

  public function listeTicket(){
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM ticket');
    $req -> execute([]);
    $listeticket = $req->fetchall();
    return $listeticket;
  }

# Ajout d'utilisateur

  public function addUtil(Utilisateur $user) {
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT email FROM utilisateur
      WHERE email = :email
    ');
    $req -> execute([
      'email' => $user->getEmail()
    ]);
    $res = $req -> fetchall();

# Si le compte existe dans la BDD.

    if ($res) {
      header("Location: ../vue/ListeUtil.php");
      throw new Exception("Ce compte existe.");
    }

    else {
      //$pass = $_POST['mdp'];
      //$hash = password_hash($pass, PASSWORD_DEFAULT);

      $req = $bdd->co_bdd()->prepare('INSERT INTO utilisateur (email, mdp, nom, prenom, rang)
        VALUES (:email, :mdp, :nom, :prenom, :rang)
      ');
      //$req->bindParam(':mdp', $hash, PDO::PARAM_STR);
      $res2 = $req->execute([
        'email' => $user->getEmail(),
        'mdp' => $user->getMdp(),
        'nom' => $user->getNom(),
        'prenom' => $user->getPrenom(),
        'rang' => $user->getRang(),
      ]);

      if ($res2) {
        header("Location: ../vue/ListeUtil.php");
        //throw new Exception("Votre compte à été crée avec succès !<br>Un e-mail sera envoyé pour valider votre inscription.");
      }

# Si un ou plusieurs champs sont vides.

      else {
        header("Location: ../vue/ListeUtil.php");
        throw new Exception("Inscription échouée !");
      }
    }
  }

# Suppression d'un utilisateur

  public function deleteUtil(Utilisateur $user) {
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd->co_bdd()->prepare('DELETE FROM utilisateur
      WHERE idUtil = :idUtil
    ');
    $res = $req->execute([
      'idUtil' => $user->getIdUtil()
    ]);

    if ($res) {
      header("Location: ../vue/ListeUtil.php");
      //throw new Exception("Votre compte à été crée avec succès !<br>Un e-mail sera envoyé pour valider votre inscription.");
    }

# Si un ou plusieurs champs sont vides.

    else {
      header("Location: ../vue/ListeUtil.php");
      throw new Exception("Suppression échouée !");
    }
  }

# Suppression d'un ticket

  public function deleteTicket(Ticket $ticket) {
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM ticket
      WHERE id = :id
    ');
    $req -> execute([
      'id' => $ticket->getId()
    ]);
    $res = $req -> fetchall();

    if ($res) {
      $req = $bdd->co_bdd()->prepare('DELETE FROM ticket
        WHERE ticket.id = :id
      ');

      if ($res2) {
        header("Location: ../vue/ListeTicket.php");
        //throw new Exception("Votre compte à été crée avec succès !<br>Un e-mail sera envoyé pour valider votre inscription.");
      }

# Si un ou plusieurs champs sont vides.

      else {
        header("Location: ../vue/ListeTicket.php");
        throw new Exception("Inscription échouée !");
      }
    }
  }

# Fin classe Manager

}
?>
