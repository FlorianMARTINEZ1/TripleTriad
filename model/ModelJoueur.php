
<?php

require_once "Model.php";

class ModelJoueur extends Model{

    private $login;
    private $nom;
    private $prenom;
    private $mdp;
    private $admin;
    protected static $object = 'joueur';
    protected static $primary='login';

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
    public function __construct($login = NULL, $nom = NULL, $prenom = NULL,$mdp = NULL,$admin = NULL) {
        if (!is_null($login) && !is_null($nom) && !is_null($prenom) && !is_null($mdp) &&!is_null($admin)) {
            $this->login = $login;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->mdp=$mdp;
            $this->admin=$admin;
        }
    }



     public static function checkPassword($login,$mot_de_passe_chiffre){
        try {


        $sql = "SELECT * from joueur WHERE login=:login AND mdp=:mdp";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "login" => $login,
            "mdp" => $mot_de_passe_chiffre,
        );
        // On donne les valeurs et on exécute la requête
        $req_prep->execute($values);
        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS,'joueur');
        $tab = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab))
            return false;
        else{
            return true;
        }
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }

    }


    // une methode d'affichage.
    public function afficher() {
        echo "Joueur {$this->prenom} {$this->nom} de login {$this->login}";
    }


 }












  /*  public static function getAllJoueurs() {
        try {
            $pdo = Model::$pdo;
            $sql = "SELECT * from joueur";
            $rep = $pdo->query($sql);
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelJoueur');

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





  public function save(){

    try{
    $sql = "INSERT INTO joueur (login,nom,prenom) VALUES (:log,:nom,:prenom)";
    $req_prep = Model::$pdo->prepare($sql);

    $value = array(
        "log" => $this->login,
        "nom" => $this->nom,
        "prenom" => $this->prenom,
      );

    $req_prep->execute($value);
    } catch (PDOException $e) {
              if (Conf::getDebug()) {
                  return false;
                  /*echo $e->getMessage();*/ // affiche un message d'erreur
                /*
              } else {
                  echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
              }
              die();
          }


    } */

    /* public function update(){


    try{
    $sql = "UPDATE joueur SET nom =:nom, prenom=:prenom WHERE login=:log ";
    $req_prep = Model::$pdo->prepare($sql);

    $value = array(
        "log" => $this->login,
        "nom" => $this->nom,
        "prenom" => $this->prenom,
      );

    $req_prep->execute($value);
    } catch (PDOException $e) {
              if (Conf::getDebug()) {
                  return false;
                  /*echo $e->getMessage();*/ // affiche un message d'erreur

            /*  } else {
                  echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
              }
              die();
          }


    } */

?>