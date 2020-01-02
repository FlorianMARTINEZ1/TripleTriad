<?php
require_once 'lib/File.php';


class ControllerGame {
    protected static $object = 'game';

    public static function error(){
      ControllerSite::Accueil();
    }

    public static function equilibre() {
      $deck =  myGet("deck");
      $controller='game';
      $view='Local';
      $pagetitle='Partie équilibrée';
      $type="sans IA";
      $_SESSION["equilibre"] = 5;
      require File::build_path(array('view','view.php'));

    }

    public static function aleatoire() {
      $deck =  myGet("deck");
      $controller='game';
      $view='Local';
      $pagetitle='Partie aléatoire';
      $type="sans IA";
      $_SESSION["equilibre"] = 100;
      require File::build_path(array('view','view.php'));

    }
    public static function IAfaible() {
      $deck =  myGet("deck");
      $controller='game';
      $view='IA';
      $pagetitle='IA faible';
      $type="faible";
      $_SESSION["equilibre"] = 5;
      require File::build_path(array('view','view.php'));

    }
    public static function IAmoyen() {
      $deck =  myGet("deck");
      $controller='game';
      $view='IA';
      $pagetitle='IA moyenne';
      $type="moyen";
      $_SESSION["equilibre"] = 5;
      require File::build_path(array('view','view.php'));


    }
    public static function IAforte() {
      $deck =  myGet("deck");
      $controller='game';
      $view='IA';
      $pagetitle='IA forte';
      $type="forte";
      $_SESSION["equilibre"] = 5;
      require File::build_path(array('view','view.php'));

    }
    public static function IAexperte() {
      $deck =  myGet("deck");
      $controller='game';
      $view='IA';
      $pagetitle='IA Experte';
      $type="experte";
      $_SESSION["equilibre"] = 5;
      require File::build_path(array('view','view.php'));

    }
    public static function IAvsIA() {
      $deck =  myGet("deck");
      $controller='game';
      $view='IAvsIA';
      $pagetitle='IAvsIA';
      $typeIA0="forte";
      $type="2IA";
      $typeIA1="faible";
      $_SESSION["equilibre"] = 5;
      require File::build_path(array('view','view.php'));

    }


    public static function EnLigne() {
      require_once File::build_path(array('model','ModelJoueur.php'));
      require_once File::build_path(array('model','ModelGame.php'));
      $login = $_SESSION['login'];
      $j = ModelJoueur::select($login);
      $id = $j->get("joue");
      $deck = "FF8";
      $AutreJoueur = 0;
      $commence = 0;
      $game = ModelGame::select($id);
      if($game->get("challenged")==$login){
        $AutreJoueur = $game->get("challenger");
        $commence = 0;
      }
      else{
        $AutreJoueur = $game->get("challenged");
        $commence = 1;
      }
      $controller='game';
      $view='Enligne';
      $pagetitle='Partie en ligne';
      $type="sans IA";
      $_SESSION["equilibre"] = 5;

      require File::build_path(array('view','view.php'));
    }
}
?>
