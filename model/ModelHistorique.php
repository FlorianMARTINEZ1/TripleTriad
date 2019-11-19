<?php

require_once "Model.php";


class ModelHistorique extends Model{

    private $id;
    private $nomJ1;
    private $nomJ2;
    private $scoreJ1;
    private $scoreJ2;
    private $deckJ1;
    private $deckJ2;
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
    public function __construct($id = NULL, $nomJ1 = NULL, $nomJ2 = NULL,$scoreJ1 = NULL,$scoreJ2 = NULL, $deckJ1 = NULL, $deckJ2 = NULL) {
        if (!is_null($id) && !is_null($nomJ1) && !is_null($nomJ2) && !is_null($scoreJ1) &&!is_null($scoreJ2) && !is_null($deckJ1) && !is_null($deckJ2)) {
            $this->id = $id;
            $this->nomJ1 = $nomJ1;
            $this->nomJ2 = $nomJ2;
            $this->scoreJ1=$scoreJ1;
            $this->scoreJ2=$scoreJ2;
            $this->deckJ1=$deckJ1;
            $this->deckJ2=$deckJ2;
        }
    }

    public static function getHistoriqueJoueur($j)
    {
        try {
            $sql = "SELECT * from Historique WHERE nomJ1=:nomj OR nomJ2=:nomj";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);

            $values = array(
                "nomj" => $j
            );

            // On donne les valeurs et on exécute la requête
            $req_prep->execute($values);

            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Historique');
            $tab = $req_prep->fetchAll();
            // Attention, si il n'y a pas de résultats, on renvoie false
            if (empty($tab))
                return "vide";
            return $tab;
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

}
?>