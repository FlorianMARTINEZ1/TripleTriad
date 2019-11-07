
<?php

require_once "Model.php";


class ModelCard extends Model{

  private $nomCarte;
  private $valN;
  private $valS;
  private $valO;
  private $valE;
  private $couleur;
  protected static $object = 'carte';
  protected static $primary='id';


  public function __construct($nomCarte = NULL, $N = NULL, $S = NULL, $O = NULL, $E = NULL) {
    if (!is_null($nomCarte) && !is_null($N) && !is_null($S) && !is_null($O) && !is_null($E)) {

      $this->nomCarte= $nomCarte;
      $this->valE = $E;
      $this->valN = $N;
      $this->valS = $S;
      $this->valO = $O;
    }
  }

  public function get($nom_attribut) {
      if (property_exists($this, $nom_attribut))
          return $this->$nom_attribut;
      return false;
  }

  // Setter générique (pas expliqué en TD)
  public function set($nom_attribut, $valeur) {
      if (property_exists($this, $nom_attribut))
          $this->$nom_attribut = $valeur;
      return false;
  }


}











?>
