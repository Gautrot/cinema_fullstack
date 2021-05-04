<?php
class Recap{
  private $id, $idUtil, $idSalle, $idTarif;

  public function __construct($donnees){
    $this->hydrate($donnees);
  }

# Getters

  public function getId() {
    return $this->id;
  }

  public function getIdUtil() {
    return $this->idUtil;
  }

  public function getIdSalle() {
    return $this->idSalle;
  }

  public function getIdTarif() {
    return $this->idTarif;
  }

# Setters

  public function setId($id) {
    $this->id = $id;
  }

  public function setIdUtil($idUtil) {
    if (is_string($idUtil)) {
      $this->idUtil = $idUtil;
    }
  }

  public function setIdSalle($idSalle) {
    if (is_string($idSalle)) {
      $this->idSalle = $idSalle;
    }
  }

  public function setIdTarif($idTarif) {
    if (is_string($idTarif)) {
      $this->idTarif = $idTarif;
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
