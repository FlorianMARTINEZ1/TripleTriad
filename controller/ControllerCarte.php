<?php
require_once 'lib/File.php';
require_once File::build_path(array('model','ModelCarte.php'));

class ControllerCarte{

  protected static $object = 'carte';

  public static function readAll(){
    if(Session::is_admin()){
      $tab_c = ModelCarte::selectAll();
      $controller = 'carte';
      $view = 'list';
      $pagetitle = 'Liste des cartes';
      require File::build_path(array('view', 'view.php'));
    }
    else{
      ControllerSite::Accueil();
    }
  }

  public static function update(){
    $id = myGet("id");
    $c = ModelCarte::select($id);
    if(Session::is_admin() && $c != false){
      $controller = 'carte';
      $action="update";
      $view = 'update';
      $pagetitle = 'Modification carte';
      require File::build_path(array('view', 'view.php'));
    }
    else{
      ControllerSite::Accueil();
    }
  }

  public static function updated(){
    if(!is_null(myGet("id")) && ModelCarte::select(myGet("id")) != false && Session::is_admin()){
      $data = array('id' => $_POST["id"],
                    'nomCarte' => $_POST['nomCarte'],
                    'valN' => $_POST['valN'],
                    'valS' => $_POST['valS'],
                    'valO' => $_POST['valO'],
                    'valE' => $_POST['valE'],
                    'source' => $_POST["source"],);

      ModelCarte::update($data);
      $message = "carte modifié !";
      $c = ModelCarte::select(myGet("id"));
      $controller='carte';
      $view='update';
      $action="update";
      $pagetitle='Carte modifié';
      require File::build_path(array('view','view.php'));

    }
    else{
      ControllerSite::Accueil();
    }
  }



  public static function create(){
    $controller='carte';
    $view='update';
    $action="create";
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
    $data = array('nomCarte' => $_POST['nomCarte'],
                  'valN' => $_POST['valN'],
                  'valS' => $_POST['valS'],
                  'valO' => $_POST['valO'],
                  'valE' => $_POST['valE'],
                  'source' => $_POST["source"],);

    ModelCarte::save($data);
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
    $action="create";
    $pagetitle='Carte créée';
    require File::build_path(array('view','view.php'));
  }

}
