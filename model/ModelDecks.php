<?php

require_once "Model.php";


class ModelDecks extends Model{

    private $id;
    private $idC1;
    private $idC2;
    private $idC3;
    private $idC4;
    private $idC5;
    protected static $object = 'Decks';
    protected static $primary='id';

    // Getter générique (pas expliqué en TD)
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

    // un constructeur
    public function __construct($id = NULL, $idC1 = NULL, $idC2 = NULL,$idC3 = NULL,$idC4 = NULL, $idC5 = NULL) {
        if (!is_null($id) && !is_null($idC1) && !is_null($idC2) && !is_null($idC3) &&!is_null($idC4) && !is_null($idC5)) {
            $this->id = $id;
            $this->idC1=$idC1;
            $this->idC2=$idC2;
            $this->idC3=$idC3;
            $this->idC4=$idC4;
            $this->idC5=$idC5;
        }
    }


}
?>