
<?php
class Joueur {

  private $id;
  private $pseudo;
  private $couleur;
  private $Deck;
  private $Game;


  public function getId() {
       return $this->id;
  }

  public function getPseudo() {
       return $this->pseudo;
  }

  public function setCouleur($couleur2) {
       $this->couleur = $couleur2;
  }



public function __construct( $ps = NULL , $g = NULL, $deck = NULL) {
  if (!is_null($ps) && !is_null($g) && !is_null($deck)) {
    $this->pseudo = $ps;
    $this->Game = $g;
    $this->Deck = $deck;
  }
}

public function playTurn(){
    $input;





}
























  // une methode d'affichage.
  public function afficher() {
    echo "<p>Le joueur ".$this->id.", nommer ".$this->pseudo." et de couleur ".$this->couleur.".</p>";
  }

public function afficher2(){
  echo "<p> N=".$this->valN." S=".$this->valS." O=".$this->valO." E=".$this->valE.".</p>";

}
  public static function getAllJoueur(){
    require_once "Model.php";
  try {
    $rep = Model::$pdo->query("SELECT * FROM joueur");

    $rep->setFetchMode(PDO::FETCH_CLASS, 'Joueur');
    $tab_j = $rep->fetchAll();

    return $tab_j;
    } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
  }


  public static function getJoueurById($id) {

  try {
    $sql = "SELECT * from joueur WHERE id=:id_tag";
    // Préparation de la requête
    $req_prep = Model::$pdo->prepare($sql);

    $values = array(
        "id_tag" => $id,
        //nomdutag => valeur, ...
    );
    // On donne les valeurs et on exécute la requête
    $req_prep->execute($values);

    // On récupère les résultats comme précédemment
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Joueur');
    $tab_j = $req_prep->fetchAll();
    // Attention, si il n'y a pas de résultats, on renvoie false
    if (empty($tab_j))
        return false;
    return $tab_j[0];
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
  $sql = "INSERT INTO joueur (id,pseudo) VALUES (:id,:pseudo)";
  $req_prep = Model::$pdo->prepare($sql);

$value = array(
      "id" => $this->id,
      "pseudo" => $this->pseudo,

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

$tab_j = Joueur::getAllJoueur();
foreach ($tab_j as $key => $value) {
    $value->afficher();
}
?>
