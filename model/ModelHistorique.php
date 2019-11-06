<?php

require_once "Model.php";


class ModelHistorique extends Model{

    private $id;
    private $nomJ1;
    private $nomJ2;
    private $scoreJ1;
    private $scoreJ2;
    protected static $object = 'Historique';
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
    public function __construct($id = NULL, $nomJ1 = NULL, $nomJ2 = NULL,$scoreJ1 = NULL,$scoreJ2 = NULL) {
        if (!is_null($id) && !is_null($nomJ1) && !is_null($nomJ2) && !is_null($scoreJ1) &&!is_null($scoreJ2)) {
            $this->id = $id;
            $this->nomJ1 = $nomJ1;
            $this->nomJ2 = $nomJ2;
            $this->scoreJ1=$scoreJ1;
            $this->scoreJ2=$scoreJ2;
        }
    }


}
?>