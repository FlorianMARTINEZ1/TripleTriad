
<?php

require_once "Model.php";


class ModelGame extends Model{

    private $id;
    private $challenger;
    private $challenged;
    private $etat;
    private $plateau;
    private $code;
    protected static $object ='game';
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

    public static function selectWithCode($code){

  	try {

    $sql = "SELECT * from game WHERE code=:code";
    // Préparation de la requête
    $req_prep = Model::$pdo->prepare($sql);

    $values = array(
        "code" => $code,
        //nomdutag => valeur, ...
    );
    $req_prep->execute($values);
    $req_prep->setFetchMode(PDO::FETCH_CLASS, "ModelGame");
    echo json_encode($req_prep->fetchAll(PDO::FETCH_ASSOC));
    // on envoie les données de la game en JSON

    $req_prep = Model::$pdo->prepare($sql);
    $req_prep->execute($values);
    $req_prep->setFetchMode(PDO::FETCH_CLASS, "ModelGame");
    $tab = $req_prep->fetchAll();
    //Si la game existe on l'envoie pour continuer la fonction

    if (empty($tab))
        return false;
    return $tab[0];
    } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
  	}

    public static function removeTour($id){
      try{
        $sql = "UPDATE game SET game.casejoue=NULL , game.idcartejoue=NULL WHERE game.id=:id ;";
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

    public static function convertCards($id){
        require_once File::build_path(array('model','ModelCard.php'));
        $sql = 'SELECT * FROM game where id = \''.$id.'\'';
        // Préparation de la requête
        $rep = Model::$pdo->query($sql);
        $rep->setFetchMode(PDO::FETCH_CLASS, "ModelGame");
        $tab = $rep->fetchAll();
        $plateau = $tab[0]->get('plateau');
        $tabCart = str_split($plateau, 3);
        for($i=0;$i<10;$i++){
          $tabCart[$i] = intval($tabCart[$i]);
        }

        $sql = 'SELECT * from carte WHERE id IN (:id1,:id2,:id3,:id4,:id5,:id6,:id7,:id8,:id9,:id10);';
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "id1" => $tabCart[0],
            "id2" => $tabCart[1],
            "id3" => $tabCart[2],
            "id4" => $tabCart[3],
            "id5" => $tabCart[4],
            "id6" => $tabCart[5],
            "id7" => $tabCart[6],
            "id8" => $tabCart[7],
            "id9" => $tabCart[8],
            "id10" => $tabCart[9],
        );

        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, "ModelCard");
        echo json_encode($req_prep->fetchAll(PDO::FETCH_ASSOC));

    }


    public static function selectDixCarte(){
      require_once File::build_path(array('model','ModelCard.php'));
      $sql = 'SELECT SQL_NO_CACHE * FROM carte ORDER BY RAND( ) LIMIT 10';
      // Préparation de la requête

      $rep = Model::$pdo->query($sql);

      $rep->setFetchMode(PDO::FETCH_CLASS, "ModelCard");

      $tab = $rep->fetchAll(); // contient les 10 cartes
      $tabid;
      $plateau="";
      for($i=0;$i<10;$i++){
        if($tab[$i]->get("id")<10){
            $plateau=$plateau."00".$tab[$i]->get("id");
        }
        else if($tab[$i]->get("id")<100){
            $plateau=$plateau."0".$tab[$i]->get("id");
        }
        else {
        $plateau=$plateau.$tab[$i]->get("id");
        }
      }
      return $plateau;
    }

    public static function envoie($id,$case,$carte,$etat){
      try{
        $sql = "UPDATE game SET game.casejoue=:casej , game.idcartejoue=:carte , game.etat=:etat WHERE game.id=:id ;";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "casej" => $case,
            "carte" => $carte,
            "id" => $id,
            "etat" =>$etat
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


    public static function accepter($id){
      try{
        $plateau = ModelGame::selectDixCarte();


        $sql = "UPDATE game SET etat=:etat, plateau =:plateau  WHERE game.id=:id ;";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "id" => $id,
            "plateau" => $plateau,
            "etat" => 'accepte'
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

    public static function attenteConfirmationAvecCode($code){
      $sql = 'SELECT * from game WHERE code = \''.$code.'\';';
      // Préparation de la requête

      $rep = Model::$pdo->query($sql);

      $rep->setFetchMode(PDO::FETCH_CLASS, "ModelGame");
      echo json_encode($rep->fetchAll(PDO::FETCH_ASSOC));

    }

    public static function createGame($log,$code,$autre){
      require_once "ModelJoueur.php";
      try{
      $joueurChallenger = ModelJoueur::select($log);

      if($joueurChallenger == false){
        throw new Exception('<br />Un des 2 joueurs n\' est pas inscrit');
      }

      if($joueurChallenger->get("joue") !=NULL){
        throw new Exception('<br />Un des 2 joueurs est déjà en recherche, ou entrain de joué');
      }

      $data = array('challenger' => $joueurChallenger->get("login"),
                    'challenged' => $autre,
                    'etat' => 'demande',
                    'code' => $code,
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
