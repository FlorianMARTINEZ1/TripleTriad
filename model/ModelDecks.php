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

    public static function getIdDeck($arr)
    {
        try {
            $sql = "SELECT id from Decks WHERE idC1=:idC1 AND idC2=:idC2 AND idC3=:idC3 AND idC4=:idC4 AND idC5=:idC5";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);

            $values = array(
                "idC1" => $arr["idC1"],
                "idC2" => $arr["idC2"],
                "idC3" => $arr["idC3"],
                "idC4" => $arr["idC4"],
                "idC5" => $arr["idC5"],

                //nomdutag => valeur, ...
            );

            // On donne les valeurs et on exécute la requête
            $req_prep->execute($values);

            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Decks');
            $tab_carte = $req_prep->fetchAll();
            // Attention, si il n'y a pas de résultats, on renvoie false
            if (empty($tab_carte))
                return print_r($values);
            return $tab_carte[0]["id"];
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