<?php
class Utilisateur{
  private $idSalle, $numSalle, $numPlace, $idFilm;

  public function __construct($donnees){
    $this->hydrate($donnees);
  }

# Getters

  public function getIdSalle() {
    return $this->idSalle;
  }

  public function getIdFilm() {
    return $this->idFilm;
  }

  public function getNumSalle() {
    return $this->numSalle;
  }

  public function getNumPlace() {
    return $this->numPlace;
  }

# Setters

  public function setIdSalle($idSalle) {
    $this->idSalle = $idSalle;
  }

  public function setIdFilm($idFilm) {
    $this->idFilm = $idFilm;
  }

  public function setNumSalle($numSalle) {
    if (is_string($numSalle)) {
      $this->numSalle = $numSalle;
    }
  }

  public function setNumPlace($numPlace) {
    if (is_string($numPlace)) {
      $this->numPlace = $numPlace;
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
