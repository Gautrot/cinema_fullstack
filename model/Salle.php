<?php
class Salle{
  private $idSalle, $numSalle, $numPlace, $maxPlace, $idFilm;

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

  public function getMaxPlace() {
    return $this->maxPlace;
  }

# Setters

  public function setIdSalle($idSalle) {
    if (is_int($idSalle)) {
      $this->idSalle = $idSalle;
    }
  }

  public function setIdFilm($idFilm) {
    if (is_int($idFilm)) {
      $this->idFilm = $idFilm;
    }
  }

  public function setNumSalle($numSalle) {
    if (is_int($numSalle)) {
      $this->numSalle = $numSalle;
    }
  }

  public function setNumPlace($numPlace) {
    if (is_int($numPlace)) {
      $this->numPlace = $numPlace;
    }
  }

  public function setMaxPlace($maxPlace) {
    if (is_int($maxPlace)) {
      $this->maxPlace = $maxPlace;
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
