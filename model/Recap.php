<?php
class Recap{
  private $id, $idUtil, $idSalle;

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
