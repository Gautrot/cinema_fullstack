<?php
class Film{
  private $idFilm, $nomFilm, $dateSortie, $resumeFilm;

  public function __construct($donnees){
    $this->hydrate($donnees);
  }

# Getters

  public function getIdFilm() {
    return $this->idFilm;
  }

  public function getNomFilm() {
    return $this->nomFilm;
  }

  public function getDateSortie() {
    return $this->dateSortie;
  }

  public function getResumeFilm() {
    return $this->resumeFilm;
  }

# Setters

  public function setIdFilm($idFilm) {
    $this->idFilm = $idFilm;
  }

  public function setDateSortie($dateSortie) {
    if (is_string($dateSortie)) {
      $this->dateSortie = $dateSortie;
    }
  }

  public function setNomFilm($nomFilm) {
    if (is_string($nomFilm)) {
      $this->nomFilm = $nomFilm;
    }
  }

  public function setResumeFilm($resumeFilm) {
    if (is_string($resumeFilm)) {
      $this->resumeFilm = $resumeFilm;
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
