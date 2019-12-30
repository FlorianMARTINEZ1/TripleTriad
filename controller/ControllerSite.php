<?php
require_once 'lib/File.php';
require_once File::build_path(array('model','ModelHistorique.php')); // chargement du modèle


class ControllerSite {
  protected static $object = 'site';
  // s'occupe de générer les pages extérieux aux joueur et aux parties

    public static function accueil() {
      $controller='site';
      $view='Accueil';
      $pagetitle='Accueil';
      require File::build_path(array('view','view.php')); //"redirige" vers la vue
    }

    public static function regle(){
      $controller='site';
      $view='Regle';
      $pagetitle='Règle';
      require File::build_path(array('view','view.php')); //"redirige" vers la vue

    }

    public static function contact(){
      $controller='site';
      $view='Contact';
      $pagetitle='Contact';
      require File::build_path(array('view','view.php')); //"redirige" vers la vue

    }

    public static function choix(){
        $action = myGet("game");
        $controller='site';
        $view='ChoixDeck';
        $pagetitle='Choix du deck';
        require File::build_path(array('view','view.php'));
    }

    public static function classement(){
      $controller='site';
      $view='classement';
      $pagetitle='Classement';
      $tabClassement = ModelHistorique::classement();
      require File::build_path(array('view','view.php'));
  }

    public static function error(){
        $controller='site';
        $view='error';
        $pagetitle='error';
        require File::build_path(array('view','view.php'));
    }


}
?>
