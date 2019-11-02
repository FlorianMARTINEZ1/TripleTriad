<?php
require_once 'lib/File.php';
require_once File::build_path(array('model','ModelJoueur.php')); // chargement du modèle
require_once File::build_path(array('lib','Security.php'));

class ControllerJoueur {
    protected static $object = 'joueur';

    public static function readAll() {


        $tab_j = ModelJoueur::selectAll();
        $controller='joueur';
        $view='list';
        $pagetitle='Liste des joueurs';

        require File::build_path(array('view','view.php')); //"redirige" vers la vue


    }

    public static function connect(){
      $controller='joueur';
      $view='connect';
      $pagetitle='connect';

      require File::build_path(array('view','viewJoueur.php'));
    }

    public static function connected(){
      $login = $_GET["login"];
      $mdp = $_GET["password"];
      $mdpchiffrer = Security::chiffrer($mdp);
      $j = ModelJoueur::select($login);
      if(ModelJoueur::checkPassword($login,$mdpchiffrer)){
        $j = ModelJoueur::select($login);
        $_SESSION['login']=$login;
        if($j->get("admin")==0){
          $_SESSION['admin'] = false;
        }
        else{
          $_SESSION['admin'] = true;
        }
        /*$j = ModelJoueur::select($login);*/
        require File::build_path(array('view','joueur','detail.php'));
      }
      else{
        $controller='joueur';
        $view='error';
        $pagetitle='error';

        require File::build_path(array('view','viewJoueur.php'));
      }



    }

    public static function deconnect(){
      session_unset();     // unset $_SESSION variable for the run-time
      session_destroy();
      setcookie(session_name(),'',time()-1);

      require File::build_path(array('view','view.php'));
    }



    public static function read(){

      $log = $_GET['login']; // prend l'immatriculation dans l'URL
      /*$v = ModelJoueur::getjoueurByImmat($ima); */
      $j = ModelJoueur::select($log);
      if ($j==false){

        $controller='joueur';
        $view='error';
        $pagetitle='error';

        require File::build_path(array('view','joueur','error.php'));
      }
      else{

        $controller='joueur';
        $view='detail';
        $pagetitle='affiche detaille joueur';


      require File::build_path(array('view','joueur','detail.php')); // redirige vers la vue
    }



    }

    public static function delete(){

      $log = $_GET['login'];
      if(Session::is_user($log)){
          $controller='joueur';
          $view='delete';
          $pagetitle='suppr utlisateur';


          ModelJoueur::delete($log);
          $tab_j = ModelJoueur::selectAll();
          require File::build_path(array('view','joueur','deleted.php'));
      }
      else{
         ControllerJoueur::connect();
      }


    }

    public static function error(){

      require File::build_path(array("view","joueur","error.php"));

    }
    public static function update(){
      $login = $_GET['login'];
      if(Session::is_user($login) || Session::is_admin()){
          $j = ModelJoueur::select($login);
          if ($j==false){

            $controller='joueur';
            $view='error';
            $pagetitle='error';

            require File::build_path(array('view','joueur','error.php'));
          }
          else{

          $action ='udpate';
          $controller='joueur';
          $view='update';
          $pagetitle='update joueur';

          require File::build_path(array('view','joueur','update.php'));
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
          $tab_j = ModelJoueur::selectAll();

          $controller='joueur';
          $view='updated';
          $pagetitle='update joueur';

          require File::build_path(array('view','viewJoueur'));
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
                'admin' => $admin
              );

              $j = new ModelJoueur($login,$nom,$prenom,$mdp,$admin);
              $j->save($data);
              $controller='joueur';
              $view='created';
              $pagetitle='create joueur';
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
        $pagetitle='formulaire joueur';
        $action='create';
        $j = new ModelJoueur("","","");

        require File::build_path(array('view','viewJoueur.php'));
    }






}
?>
