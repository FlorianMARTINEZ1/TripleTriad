<?php
require_once 'lib/File.php';

class ControllerCreateurCarte{
  protected static $object = 'carte';
  public static function createCard(){
    $controller='carte';
    $view='createCard';
    $pagetitle='Formulaire de création de carte';
    require File::build_path(array('view','view.php'));
  }
  public static function created(){
    $controller='carte';
    $view='created';
    $pagetitle='Carte créée';
    require File::build_path(array('view','view.php'));
  }
  public static function error(){
    $controller='carte';
    $view='error';
    $pagetitle='Error 404 - Carte non créée';
    require File::build_path(array('view','view.php'));
  }

}
