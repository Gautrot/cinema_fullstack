<?php
class Reserve{
  private $idRes, $resNum, $resDate; $idUtil;

  public function __construct($donnees){
    $this->hydrate($donnees);
  }

# Getters

  public function getIdRes() {
    return $this->idRes;
  }

  public function getResNum() {
    return $this->resNum;
  }

  public function getResDate() {
    return $this->resDate;
  }

  public function getIdUtil() {
    return $this->idUtil;
  }

# Setters

  public function setIdRes($idRes) {
    $this->idRes = $idRes;
  }

  public function setResNum($resNum) {
    if (is_string($resNum)) {
      $this->resNum = $resNum;
    }
  }

  public function setResDate($resDate) {
    if (is_string($resDate)) {
      $this->resDate = $resDate;
    }
  }

  public function setIdUtil($idUtil) {
    $this->idUtil = $idUtil;
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
