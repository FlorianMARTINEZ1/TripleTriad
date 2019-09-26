
<?php
class Carte {

  private $nomCarte;
  private $valN;
  private $valS;
  private $valO;
  private $valE;


  public function getNomCarte() {
       return $this->nomCarte;
  }

  public function setNomCarte($nomCarte2) {
       $this->id = $nomCarte;
  }

  public function getValN() {
       return $this->valN;
  }

  public function setValN($valN2) {
       $this->valN = $valN2;
  }
   public function getValS() {
       return $this->valS;
  }

  public function setValS($valS2) {
       $this->valS = $valS2;
  }

 public function getValO() {
       return $this->valO;
  }

  public function setValO($valO2) {
       $this->valO = $valO2;
  }

 public function getValE() {
       return $this->valE;
  }

  public function setValE($valE2) {
       $this->valE = $valE2;
  }



public function __construct($nomCarte = NULL, $N = NULL, $S = NULL, $O = NULL, $E = NULL) {
  if (!is_null($nomCarte) && !is_null($N) && !is_null($S) && !is_null($O) && !is_null($E)) {

    $this->nomCarte= $nomCarte;
    $this->valE = $E;
    $this->valN = $N;
    $this->valS = $S;
    $this->valO = $O;
  }
}

  // une methode d'affichage.
  public function afficher() {
    echo "<p>La carte ".$this->nomCarte." de Valeur : N = ".$this->valN." , S = ".$this->valS." , O = ".$this->valO." , E = ".$this->valE.".</p>";
  }


public function afficher2(){
  echo "<p> N=".$this->valN." S=".$this->valS." O=".$this->valO." E=".$this->valE.".</p>";

}
  public static function getAllCarte(){
    require_once "Model.php";
  try {
    $rep = Model::$pdo->query("SELECT * FROM carte");

    $rep->setFetchMode(PDO::FETCH_CLASS, 'Carte');
    $tab_carte = $rep->fetchAll();

    return $tab_carte;
    } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
  }


  public static function getCarteByNom($nomCarte) {

  try {
    $sql = "SELECT * from carte WHERE nomCarte=:nomCarte";
    // Préparation de la requête
    $req_prep = Model::$pdo->prepare($sql);

    $values = array(
        "nomCarte" => $nomCarte,
        //nomdutag => valeur, ...
    );
    // On donne les valeurs et on exécute la requête
    $req_prep->execute($values);

    // On récupère les résultats comme précédemment
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Carte');
    $tab_carte = $req_prep->fetchAll();
    // Attention, si il n'y a pas de résultats, on renvoie false
    if (empty($tab_carte))
        return false;
    return $tab_carte[0];
    } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
}

public function save(){
  require_once "Model.php";
  try{
  $sql = "INSERT INTO carte (nomCarte,valN,valS,valO,valE) VALUES (:nomCarte,:val_N,:val_S,:val_O,:val_E)";
  $req_prep = Model::$pdo->prepare($sql);

$value = array(
      "nomCarte" => $this->nomCarte,
      "val_N" => $this->valN,
      "val_S" => $this->valS,
      "val_O" => $this->valO,
      "val_E" => $this->valE,
    );

  $req_prep->execute($value);
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

//$tab_c = Carte::getAllCarte();
//foreach ($tab_c as $key => $value) {
//    $value->afficher();
//}
?>
