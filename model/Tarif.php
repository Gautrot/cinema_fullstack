<?php
class Utilisateur{
  private $idTarif, $nomTarif, $prixTarif;

  public function __construct($donnees){
    $this->hydrate($donnees);
  }

# Getters

  public function getIdTarif() {
    return $this->idTarif;
  }

  public function getNomTarif() {
    return $this->nomTarif;
  }

  public function getPrixTarif() {
    return $this->prixTarif;
  }

# Setters

  public function setIdTarif($idTarif) {
    $this->idTarif = $idTarif;
  }

  public function setNomTarif($nomTarif) {
    if (is_string($nomTarif)) {
      $this->nomTarif = $nomTarif;
    }
  }

  public function setPrixTarif($prixTarif) {
    if (is_string($prixTarif)) {
      $this->prixTarif = $prixTarif;
    }
  }

# Hydratation

  public function hydrate(array $res) {
    foreach ($res as $key => $value) {
      $method = 'set'.ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }
}
?>
