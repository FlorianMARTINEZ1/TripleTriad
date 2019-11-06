
<?php

require_once "Model.php";


class ModelGame extends Model{

    private $id;
    private $challenger;
    private $challenged;
    private $etat;
    private $plateau;
    protected static $object = 'game';
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
    public function __construct($id = NULL, $challenger = NULL, $challenged = NULL,$etat = NULL,$plateau = NULL) {
        if (!is_null($id) && !is_null($challenger) && !is_null($challenged) && !is_null($etat) &&!is_null($plateau)) {
            $this->id = $id;
            $this->$challenger = $challenger;
            $this->challenged = $challenged;
            $this->etat=$etat;
            $this->plateau=$plateau;
        }
    }

    public static function accepter($id){
      try{
        $sql = "UPDATE game SET game.etat='accepte' WHERE game.id=:id ;";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "id" => $id
        );
        // On donne les valeurs et on exécute la requête
        $req_prep->execute($values);

      }catch(PDOException $e){
        if (Conf::getDebug()) {
            echo $e->getMessage(); // affiche un message d'erreur
        } else {
            echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
        }
        die();
      }


    }

    public static function refuse($id){
      try{
        $sql = "DELETE FROM game WHERE game.id=:id ;";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "id" => $id
        );
        // On donne les valeurs et on exécute la requête
        $req_prep->execute($values);

      }catch(PDOException $e){
        if (Conf::getDebug()) {
            echo $e->getMessage(); // affiche un message d'erreur
        } else {
            echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
        }
        die();
      }


    }

    public static function attenteConfirmation($id){
      $sql = 'SELECT * from game WHERE id = \''.$id.'\';';
      // Préparation de la requête

      $rep = Model::$pdo->query($sql);

      $rep->setFetchMode(PDO::FETCH_CLASS, "ModelGame");
      echo json_encode($rep->fetchAll(PDO::FETCH_ASSOC));

    }


    public static function challenge($challenged,$challenger){
        require_once "ModelJoueur.php";
        try{
        $joueurChallenged = ModelJoueur::select($challenged);
        $joueurChallenger = ModelJoueur::select($challenger);

        if($joueurChallenged == false || $joueurChallenger == false){
          throw new Exception('<br />Un des 2 joueurs n\' est pas inscrit');
        }

        if($joueurChallenged->get("joue")!=NULL || $joueurChallenger->get("joue") !=NULL){
          throw new Exception('<br />Un des 2 joueurs est déjà en recherche, ou entrain de joué');
        }

        $data = array('challenger' => $joueurChallenger->get("login"),
                      'challenged' => $joueurChallenged->get("login"),
                      'etat' => 'demande',
                      'plateau' => 'ca va se faire'
        );

        $value = parent::save($data);

        $joueur = ModelJoueur::select($challenger);

        $sql = 'SELECT * from game WHERE id = \''.$joueur->get("joue").'\';';
        // Préparation de la requête

        $rep = Model::$pdo->query($sql);

        $rep->setFetchMode(PDO::FETCH_CLASS, "ModelGame");
        $tab = $rep->fetchAll();
        echo json_encode($rep->fetchAll(PDO::FETCH_ASSOC));

        if($value == false){
          throw new Exception('<br />Une erreur c\'est produite durant la sauvegardes');
        }
        else{
          /*echo "Tout c'est bien passé ! ";*/
        }




      }
      catch(Exception $e){
        echo $e->getMessage();
      }



    }

 }












?>
