<?php
require_once 'lib/File.php';


class ControllerGame {
    protected static $object = 'game';

    public static function accueil() {
        require File::build_path(array('view','Accueil.php')); //"redirige" vers la vue
    }

    public static function equilibre() {
      $controller='game';
      $view='Local';
      $pagetitle='Local';
      $type="sans IA";
      $_SESSION["equilibre"] = 5;
      require File::build_path(array('view','view.php'));

    }

    public static function aleatoire() {
      $controller='game';
      $view='Local';
      $pagetitle='Local';
      $type="sans IA";
      $_SESSION["equilibre"] = 100;
      require File::build_path(array('view','view.php'));

    }
    public static function IAfaible() {
      $controller='game';
      $view='IA';
      $pagetitle='IA';
      $type="faible";
      $_SESSION["equilibre"] = 5;
      require File::build_path(array('view','view.php'));

    }
    public static function IAmoyen() {
      $controller='game';
      $view='IA';
      $pagetitle='IA';
      $type="moyen";
      $_SESSION["equilibre"] = 5;
      require File::build_path(array('view','view.php'));


    }
    public static function IAforte() {
      $controller='game';
      $view='IA';
      $pagetitle='IA';
      $type="forte";
      $_SESSION["equilibre"] = 5;
      require File::build_path(array('view','view.php'));

    }

    public static function EnLigne() {
      $controller='game';
      $view='Enligne';
      $pagetitle='Enligne';
      $type="sans IA";
      $_SESSION["equilibre"] = 5;
      require File::build_path(array('view','view.php'));
    }
}
?>
