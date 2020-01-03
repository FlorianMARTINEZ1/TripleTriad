
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

  public static function getnbCartesWithDeck($deck){
    try {
        $sql = "SELECT COUNT(*) from carte where source =:deck";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);

        $value = array(
            "deck" => $deck,
        );

        // On donne les valeurs et on exécute la requête
        $req_prep->execute($value);


        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'carte');
        $tab = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab))
            return false;
        return $tab[0][0];
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
