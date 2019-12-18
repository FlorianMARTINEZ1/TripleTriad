<?php
require_once 'lib/File.php';

class ControllerCarte{

  protected static $object = 'carte';
  public static function create(){
    $controller='carte';
    $view='update';
    $pagetitle='Formulaire de création de carte';
    require File::build_path(array('view','view.php'));
  }

  public static function error(){
    $controller='carte';
    $view='error';
    $pagetitle='Error 404 - Carte non créée';
    require File::build_path(array('view','view.php'));
  }

  public static function created(){
    require_once File::build_path(array('model','ModelCard.php'));
    $data = array('nomCarte' => $_POST['nomCarte'],
                  'valN' => $_POST['valN'],
                  'valS' => $_POST['valS'],
                  'valO' => $_POST['valO'],
                  'valE' => $_POST['valE'],
                  'source' => $_POST["source"],);

    ModelCard::save($data);
    $imgr = $_POST['urlRed'];
    $imgb = $_POST['urlBlue'];
    $imgr = str_replace('data:image/png;base64,', '', $imgr);
    $imgb = str_replace('data:image/png;base64,', '', $imgb);
    $imgr = str_replace(' ', '+', $imgr);
    $imgb = str_replace(' ', '+', $imgb);
    $fileDatar = base64_decode($imgr);
    $fileDatab = base64_decode($imgb);
    //saving
    $fileNamer = File::build_path(array("css","cartes",$_POST['source'],$_POST['nomCarte'].'.rouge.jpg'));
    $fileNameb = File::build_path(array("css","cartes",$_POST['source'],$_POST['nomCarte'].'.bleue.jpg'));
    file_put_contents($fileNamer, $fileDatar);
    file_put_contents($fileNameb, $fileDatab);//test pour push
    $message = "carte créée !";
    $controller='carte';
    $view='update';
    $pagetitle='Carte créée';
    require File::build_path(array('view','view.php'));
  }

}
