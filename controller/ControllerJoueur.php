<?php
require_once 'lib/File.php';
require_once File::build_path(array('model','ModelJoueur.php')); // chargement du modèle
require_once File::build_path(array('lib','Security.php'));

class ControllerJoueur {
    protected static $object = 'joueur';

    public static function readAllPlayerConnected() {


        $tab_j = ModelJoueur::checkJoueursConnected();
        /*$tab_j = ModelJoueur::selectAll();*/
        $controller='joueur';
        $view='userList';
        $pagetitle='Liste des joueurs';


        require File::build_path(array('view','viewJoueur.php')); //"redirige" vers la vue


    }

    public static function quitteFile(){
      require_once File::build_path(array('controller','ControllerGame.php'));
      $login = $_SESSION['login'];
      ModelJoueur::metEnFileDAttente($login,0);
      ControllerGame::Accueil();
    }

    public static function rechercheJoueur() {
      if(isset($_SESSION['login'])){
        $login = $_SESSION['login'];
        ModelJoueur::metEnFileDAttente($login,1);
        $controller='joueur';
        $view='EnAttente';
        $pagetitle='File D\'attente';

        require File::build_path(array('view','viewJoueur.php')); //"redirige" vers la vue
      }
      else{
          ControllerJoueur::connect();
      }


    }

    public static function enAttente() {
      if(isset($_SESSION['login'])){
        $controller ='joueur';
        $view = 'ChoixModeMulti';
        $pagetitle="Choix du mode";
        $type="recherche";
        require File::build_path(array('view','viewJoueur.php'));
      }
      else{
        ControllerJoueur::connect();
      }

    }

    public static function connect(){
      $controller='joueur';
      $view='connect';
      $pagetitle='connection';

      require File::build_path(array('view','viewJoueur.php'));
    }

    public static function connected(){
      $login = $_GET["login"];
      $mdp = $_GET["password"];
      $mdpchiffrer = Security::chiffrer($mdp);
      $j = ModelJoueur::select($login);
      if(ModelJoueur::checkPassword($login,$mdpchiffrer)){
        /*ModelJoueur::JoueurConnecter($login,"1");*/
        $j = ModelJoueur::select($login);
        $_SESSION['login']=$login;
        if($j->get("admin")==0){
          $_SESSION['admin'] = false;
        }
        else{
          $_SESSION['admin'] = true;
        }

        $controller='joueur';
        $view='detail';
        $pagetitle='Mon compte';

        require File::build_path(array('view','viewJoueur.php'));
      }
      else{
        /*$controller='joueur';
        $view='error';
        $pagetitle='error';

        require File::build_path(array('view','viewJoueur.php'));*/
        $msg = "Erreur, l'identifiant ou le mot de passe est incorrect";
        $controller='joueur';
        $view='connect';
        $pagetitle='connection';
        require File::build_path(array('view','viewJoueur.php'));

      }



    }

    public static function deconnect(){
      $login = $_SESSION['login'];
      ModelJoueur::JoueurConnecter($login,"0");
      session_unset();     // unset $_SESSION variable for the run-time
      session_destroy();
      setcookie(session_name(),'',time()-1);

      require File::build_path(array('view','Accueil.php'));
    }



    public static function read(){

      $log = $_GET['login'];
      if(Session::is_user($log)){
          $controller='joueur';
          $view='detail';
          $pagetitle='Mon compte';
          $j = ModelJoueur::select($log);
          if ($j==false){

            $controller='joueur';
            $view='error';
            $pagetitle='ERROR';

            require File::build_path(array('view','viewJoueur.php'));
          }
          else{
            require File::build_path(array('view','viewJoueur.php'));
          }
      }
      else{
         ControllerJoueur::connect();
      }

    }

    public static function delete(){

      $log = $_GET['login'];
      if(Session::is_user($log)){
          $controller='joueur';
          $view='deleted';
          $pagetitle='Compte supprimé';
          ModelJoueur::delete($log);
          require File::build_path(array('view','viewJoueur.php'));
      }
      else{
         ControllerJoueur::connect();
      }


    }

    public static function error(){
      $controller='joueur';
      $view='error';
      $pagetitle='ERROR';
      require File::build_path(array("view","viewJoueur.php"));

    }
    public static function update(){
      $login = $_GET['login'];
      if(Session::is_user($login) || Session::is_admin()){
          $j = ModelJoueur::select($login);
          if ($j==false){

            $controller='joueur';
            $view='error';
            $pagetitle='ERROR';

            require File::build_path(array("view","viewJoueur.php"));
          }
          else{

          $action ='udpate';
          $controller='joueur';
          $view='update';
          $pagetitle='Modification du compte';

          require File::build_path(array("view","viewJoueur.php"));
        }

      }
      else{
        ControllerJoueur::connect();
      }


    }

     public static function updated(){

      $login = $_GET['login'];
      if(Session::is_user($login) || Session::is_admin() ){
          $nom = $_GET['nom'];
          $prenom = $_GET['prenom'];
          $mdp = $_GET["password"];
          $admin=0;
          if(!empty($_GET['admin'])){
            $admin = 1;
          }

          $mdp = Security::chiffrer($mdp);

          $j = new ModelJoueur($prenom,$nom,$login,$mdp,$admin);
          /*$v->update();*/
          $data = array(
            'login' => $login,
            'nom' => $nom,
            'prenom' => $prenom,
            'mdp' => $mdp,
            'admin' => $admin
          );
          $j->update($data);

          $controller='joueur';
          $view='updated';
          $pagetitle='Compte modifiér';

          require File::build_path(array('view','viewJoueur.php'));
      }
      else{
        ControllerJoueur::connect();
      }

    }



    public static function created(){
      $login = $_GET['login'];
    /*  if(Session::is_user($login) || Session::is_admin() ){*/
              $nom = $_GET['nom'];
              $prenom = $_GET['prenom'];
              $mdp = $_GET["password"];
              $admin=0;
               if(!empty($_GET['admin'])){
                 $admin = 1;
               }

              $mdp = Security::chiffrer($mdp);


              $data = array(
                'login' => $login,
                'nom' => $nom,
                'prenom' => $prenom,
                'mdp' => $mdp,
                'admin' => $admin,
                'connecte' => 0
              );

              $j = new ModelJoueur($login,$nom,$prenom,$mdp,$admin);
              $j->save($data);
              $controller='joueur';
              $view='created';
              $pagetitle='Compte créé';
              /*ControllerVoiture::readAll();*/
              require File::build_path(array('view','viewJoueur.php'));
    /*  }
      else{
         ControllerJoueur::connect();
      }*/
    }

    public static function create(){

        $controller='joueur';
        $view='update';
        $pagetitle='Creation du compte';
        $action='create';
        $j = new ModelJoueur("","","");

        require File::build_path(array('view','viewJoueur.php'));
    }






}
?>
