<?php
require_once 'lib/File.php';
require_once File::build_path(array('model','ModelJoueur.php')); // chargement du modèle
require_once File::build_path(array('model','ModelHistorique.php')); // chargement du modèle
require_once File::build_path(array('model','ModelCarte.php')); // chargement du modèle
require_once File::build_path(array('lib','Security.php'));

class ControllerJoueur {
    protected static $object = 'joueur';

    public static function readAllPlayerConnected() {
      if(isset($_SESSION["login"])){
        $tab_j = ModelJoueur::checkJoueursConnected();
        /*$tab_j = ModelJoueur::selectAll();*/
        $controller='joueur';
        $view='userList';
        $pagetitle='Liste des joueurs';
        require File::build_path(array('view','view.php')); //"redirige" vers la vue
      }
      else{
        ControllerJoueur::connect();
      }
    }

    public static function stat(){
      /** On récupère les stats **/
      if(Session::is_admin()){
        require_once File::build_path(array('model','ModelGame.php'));
        $nbPartie = ModelHistorique::nbPartie();
        $nbJoueur = ModelJoueur::nbJoueur();
        $win_rate_IAForte = ModelHistorique::nbWinIAFO();
        $win_rate_IAMoyen = ModelHistorique::nbWinIAM();
        $win_rate_IAFaible = ModelHistorique::nbWinIAFA();
        $nbCartes = ModelCarte::nbCartes();
        $nombreDePartieMultiEnCeMomentEnLigne = ModelGame::nbPartie();

        $controller='joueur';
        $view='stats';
        $pagetitle='Statistiques';
        require File::build_path(array('view','view.php')); //"redirige" vers la vue
      }
      else{
        ControllerSite::Accueil();
      }


    }

    public static function readAll(){
      if(Session::is_admin()){
        $tab_j = ModelJoueur::selectAll();
        $controller = 'joueur';
        $view = 'list';
        $pagetitle = 'Liste des joueurs';
        require File::build_path(array('view', 'view.php'));
      }
      else{
        ControllerSite::Accueil();
      }
    }

    public static function validate(){
     $login = myGet('login');
     $nonce = myGet("nonce");
     $c = ModelJoueur::select($login);
     if($c == false) {
         return false;
         ControllerJoueur::error();
     }
     else{
       if($nonce == $c->get("nonce")){
         $data = array(
           "login" => $login,
           "nonce" => null
         );
         $c->update($data);
         echo "<script> alert('votre email a bien été validé') </script>";
         ControllerJoueur::connect();
       }
       else{
         ControllerJoueur::error();
       }
     }
   }

    public static function ChoixHerbergement(){

      $controller='joueur';
      $view='ChoixModePartie';
      $pagetitle='Choix partie';
      require File::build_path(array('view','view.php')); //"redirige" vers la vue
    }

    public static function quitteFile(){
      require_once File::build_path(array('controller','ControllerGame.php'));
      $login = $_SESSION['login'];
      ModelJoueur::metEnFileDAttente($login,0);
      ControllerSite::Accueil();
    }

    public static function rechercheJoueur() {
      if(isset($_SESSION['login'])){
        $login = $_SESSION['login'];
        ModelJoueur::metEnFileDAttente($login,1);
        $controller='joueur';
        $view='EnAttente';
        $pagetitle='File D\'attente';

        require File::build_path(array('view','view.php')); //"redirige" vers la vue
      }
      else{
          ControllerJoueur::connect();
      }
    }

    public static function connect(){
      $controller='joueur';
      $view='connect';
      $pagetitle='connection';

      require File::build_path(array('view','view.php'));
    }

    public static function connected(){
      $login =  myGet("login");
      $mdp =  myGet("password");
      $mdpchiffrer = Security::chiffrer($mdp);
      $j = ModelJoueur::select($login);
      if(ModelJoueur::checkPassword($login,$mdpchiffrer)  && $j->get("nonce")==null){
        /*ModelJoueur::JoueurConnecter($login,"1");*/
        $j = ModelJoueur::select($login);
        $_SESSION['login']=$login;
        if($j->get("admin")==0){
          $_SESSION['admin'] = false;
        }
        else{
          $_SESSION['admin'] = true;
        }
        ControllerJoueur::read();
      }
      else{
        $msg = "Erreur, l'identifiant ou le mot de passe est incorrect";
        $controller='joueur';
        $view='connect';
        $pagetitle='connection';
        require File::build_path(array('view','view.php'));

      }



    }

    public static function deconnect(){
      $login = $_SESSION['login'];
      ModelJoueur::JoueurConnecter($login,"0");
      session_unset();     // unset $_SESSION variable for the run-time
      session_destroy();
      setcookie(session_name(),'',time()-1);
      ControllerSite::Accueil();
    }



    public static function read(){

      $log =  myGet('login');
      if(Session::is_user($log)){
          $controller='joueur';
          $view='detail';
          $pagetitle='Mon compte';
          if(isset($_SESSION['login']))
          {
            $nbWin = ModelHistorique::getNbWinJoueur($_SESSION['login']);
            $nbPartie = ModelHistorique::getNbPartieJoueur($_SESSION['login']);
          }
          $j = ModelJoueur::select($log);
          if ($j==false){

            $controller='joueur';
            $view='error';
            $pagetitle='ERROR';

            require File::build_path(array('view','view.php'));
          }
          else{
            require File::build_path(array('view','view.php'));
          }
      }
      else{
         ControllerJoueur::connect();
      }

    }

    public static function delete(){

      $log =  myGet('login');
      if(Session::is_user($log)){
          $controller='joueur';
          $view='deleted';
          $pagetitle='Compte supprimé';
          ModelJoueur::delete($log);
          require File::build_path(array('view','view.php'));
      }
      else{
         ControllerJoueur::connect();
      }


    }

    public static function error(){
      $controller='joueur';
      $view='error';
      $pagetitle='ERROR';
      require File::build_path(array("view","view.php"));

    }
    public static function update(){
      $login =  myGet('login');
      if(Session::is_user($login) || Session::is_admin()){
          $j = ModelJoueur::select($login);
          if ($j==false){

            $controller='joueur';
            $view='error';
            $pagetitle='ERROR';

            require File::build_path(array("view","view.php"));
          }
          else{

          $action ='udpate';
          $controller='joueur';
          $view='update';
          $pagetitle='Modification du compte';

          require File::build_path(array("view","view.php"));
        }

      }
      else{
        ControllerJoueur::connect();
      }


    }

     public static function updated(){

      $login =  myGet('login');
      if(Session::is_user($login) || Session::is_admin() ){
          $nom =  myGet('nom');
          $prenom =  myGet('prenom');
          $mdp =  myGet("password");
          $mail = myGet("email");
          $admin=0;
          if(!empty( myGet('admin'))){
            $admin = 1;
          }

          $mdp = Security::chiffrer($mdp);

          $j = new ModelJoueur($prenom,$nom,$login,$mdp,$admin,$mail,0);
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

          require File::build_path(array('view','view.php'));
      }
      else{
        ControllerJoueur::connect();
      }

    }



    public static function created(){
      $login =  myGet('login');
      if(myGet("email") == filter_var(myGet("email"), FILTER_VALIDATE_EMAIL) && ModelJoueur::select($login)==false){
            $nom =  myGet('nom');
            $prenom =  myGet('prenom');
            $mdp =  myGet("password");
            $mail= myGet("email");
            $nonce = Security::generateRandomHex();
            $admin=0;
             if(!empty( myGet('admin'))){
               $admin = 1;
             }

            $mdp = Security::chiffrer($mdp);


            $data = array(
              'login' => $login,
              'nom' => $nom,
              'prenom' => $prenom,
              'mdp' => $mdp,
              'admin' => $admin,
              'mail' => $mail,
              'nonce' => $nonce,
              'connecte' => 0
            );
            $message='
                   <html>
                     <body>
                       <div align="center">
                         <u>Nom de l\'expéditeur :</u>'.$nom.'<br />
                         <u>Prenom de l\'expéditeur :</u>'.$prenom.'<br />
                         <u>Mail de l\'expéditeur :</u>'.$mail.'<br />
                         <br />
                         <a href="http://webinfo.iutmontp.univ-montp2.fr/~ginestes/TripleTriad/index.php?login='.$login.'&nonce='.$nonce.'&action=validate&controller=joueur">Cliquez ici pour valider votre email </a>
                         <br />
                       </div>
                     </body>
                   </html>
                   ';

            mail($mail, 'Valider votre email', $message);

            $j = new ModelJoueur($login,$nom,$prenom,$mdp,$admin,myGet("email"),0);
            $j->save($data);
            $controller='joueur';
            $view='created';
            $pagetitle='Compte créé';
            require File::build_path(array('view','view.php'));
      }
      else{
      ControllerJoueur::create();
    }
    }

    public static function create(){

        $controller='joueur';
        $view='update';
        $pagetitle='Creation du compte';
        $action='create';
        $j = new ModelJoueur("","","");

        require File::build_path(array('view','view.php'));
    }

    public static function historique()
    {
      $controller = 'joueur';
      $view = 'historique';
      $pagetitle='Historique';
      $tabHistorique = ModelHistorique::getHistoriqueJoueur($_SESSION['login']);
      require File::build_path(array('view','view.php'));

    }






}
?>
