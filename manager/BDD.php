<?php
session_start();

class BDD {
  private $bdd;

  public function co_bdd() {
    $this->bdd = new PDO('mysql:host=localhost;dbname=cine_php;charset=utf8', 'root', '');

    return $this->bdd;
  }
}

?>
