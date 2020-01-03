
<?php

require_once "Model.php";


class ModelCarte extends Model{

  private $nomCarte;
  private $valN;
  private $valS;
  private $valO;
  private $valE;
  private $source;
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

  public static function selectAllWithDeck($deck){
  try {
    $sql = "SELECT * FROM carte WHERE source=:source";
    // Préparation de la requête
    $rep = Model::$pdo->prepare($sql);
    $values = array(
        "source" => $deck,
    );
    // On donne les valeurs et on exécute la requête
    $rep->execute($values);
    $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelCarte');
    return $rep->fetchAll();

    } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
  }

  public static function getAllCarte(){
    try {
      require_once File::build_path(array('model','Model.php'));
      $rep = Model::$pdo->query("SELECT * FROM carte");
      $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelCarte');
      echo json_encode($rep->fetchAll(PDO::FETCH_ASSOC));
      } catch (PDOException $e) {
              if (Conf::getDebug()) {
                  echo $e->getMessage(); // affiche un message d'erreur
              } else {
                  echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
              }
              die();
          }
  }

  public static function nbCartes()
    {
        try {
            $sql = "SELECT COUNT(*) from carte";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);

            // On donne les valeurs et on exécute la requête
            $req_prep->execute();

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

  public static function getAllCarteWithDeck($deck){
  try {
    require_once File::build_path(array('model','Model.php'));
    $sql = "SELECT * FROM carte WHERE source=:source";
    // Préparation de la requête
    $rep = Model::$pdo->prepare($sql);
    $values = array(
        "source" => $deck,
    );
    // On donne les valeurs et on exécute la requête
    $rep->execute($values);
    $rep->setFetchMode(PDO::FETCH_CLASS, 'Carte');
    echo json_encode($rep->fetchAll(PDO::FETCH_ASSOC));
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
