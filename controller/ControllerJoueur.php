<?php
require_once 'lib/File.php';
require_once File::build_path(array('model','ModelJoueur.php')); // chargement du modèle
require_once File::build_path(array('lib','Security.php'));

class ControllerJoueur {
    protected static $object = 'joueur';

    public static function readAll() {

       /* $tab_c = ModelJoueur::getAllUtilisateurs(); */    //appel au modèle pour gerer la BD
        $tab_c = ModelJoueur::selectAll();
        $controller='joueur';
        $view='list';
        $pagetitle='Liste des joueurs';

        require File::build_path(array('view','view.php')); //"redirige" vers la vue


    }

    public static function connect(){

      require File::build_path(array('view','joueur','connect.php'));
    }

    public static function connected(){
      $login = $_GET["login"];
      $mdp = $_GET["password"];
      $mdpchiffrer = Security::chiffrer($mdp);
      $c = ModelJoueur::select($login);

      if(ModelJoueur::checkPassword($login,$mdpchiffrer)){
        $c = ModelJoueur::select($login);
        $_SESSION['login']=$login;
        if($c->get("admin")==0){
          $_SESSION['admin'] = false;
        }
        else{
          $_SESSION['admin'] = true;
        }
        /*$c = ModelJoueur::select($login);*/
        require File::build_path(array('view','joueur','detail.php'));
      }
      else{
        $controller='joueur';
        $view='error';
        $pagetitle='error';

        require File::build_path(array('view','joueur','error.php'));
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
      $c = ModelJoueur::select($log);
      if ($c==false){

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
          $tab_c = ModelJoueur::selectAll();
          require File::build_path(array('view','joueur','deleted.php'));
      }
      else{
         ControllerUtilisateur::connect();
      }


    }

    public static function error(){

      require File::build_path(array("view","joueur","error.php"));

    }
    public static function update(){
      $login = $_GET['login'];
      if(Session::is_user($login) || Session::is_admin()){
          $c = ModelJoueur::select($login);
          if ($c==false){

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
        ControllerUtilisateur::connect();
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

          $c = new ModelJoueur($prenom,$nom,$login,$mdp,$admin);
          /*$v->update();*/
          $data = array(
            'login' => $login,
            'nom' => $nom,
            'prenom' => $prenom,
            'mdp' => $mdp,
            'admin' => $admin


          );
          $c->update($data);
          $tab_c = ModelJoueur::selectAll();
          require File::build_path(array('view','joueur','updated.php'));
      }
      else{
        ControllerUtilisateur::connect();
      }

    }



    public static function created(){
      $login = $_GET['login'];
      if(Session::is_user($login) || Session::is_admin() ){
          if($_GET["email"] == filter_var($_GET["email"], FILTER_VALIDATE_EMAIL)){
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

              $c = new ModelJoueur($login,$nom,$prenom,$mdp,$admin);
              $c->save($data);
              $tab_c = ModelJoueur::selectAll();
              /*ControllerVoiture::readAll();*/
              require File::build_path(array('view','joueur','created.php'));
        }
        else{
          ControllerUtilisateur::error();
        }
      }
      else{
         ControllerUtilisateur::connect();
      }
    }

    public static function create(){

        $controller='joueur';
        $view='udpate';
        $pagetitle='formulaire joueur';
        $action='create';
        $u = new ModelJoueur("","","");

        require File::build_path(array('view','joueur','update.php'));
    }






}
?>
