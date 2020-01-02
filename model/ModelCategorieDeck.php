
<?php

require_once "Model.php";


class ModelCategorieDeck extends Model{

  private $nomDeck;
  private $affichageDeck;
  protected static $object = 'categorieDeck';
  protected static $primary='nomDeck';


  public function __construct($nomDeck = NULL, $affichageDeck = NULL) {
    if (!is_null($nomDeck) && !is_null($affichageDeck)) {
      $this->nomDeck= $nomDeck;
      $this->affichageDeck= $affichageDeck;
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
