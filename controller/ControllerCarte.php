<?php
require_once 'lib/File.php';
require_once File::build_path(array('model','ModelCarte.php'));

class ControllerCarte{

  protected static $object = 'carte';

  public static function readAll(){
    if(Session::is_admin()){
      if(!is_null(myGet("deck"))){
          $tab_c = ModelCarte::selectAllWithDeck(myGet("deck"));
      }else{
          $tab_c = ModelCarte::selectAll();
      }
      $controller = 'carte';
      $view = 'list';
      $pagetitle = 'Liste des cartes';
      require File::build_path(array('view', 'view.php'));
    }
    else{
      ControllerSite::Accueil();
    }
  }

  public static function delete(){
    $id = myGet('id');
    if(Session::is_admin()){
        $carte = ModelCarte::select($id);
        $path_img = File::build_path_directorie(array('css','cartes',$carte->get("source")),$carte->get("nomCarte"));
        unlink($path_img.".bleue.jpg"); // supprime la carte bleu
        unlink($path_img.".rouge.jpg"); // supprime la carte rouge
        $controller='carte';
        $view='deleted';
        $pagetitle='Carte supprimé';
        ModelCarte::delete($id);
        require File::build_path(array('view','view.php'));
    }
    else{
       ControllerProduit::readAll();
    }


  }

  public static function update(){
    require_once File::build_path(array('model','ModelCategorieDeck.php'));
    $id = myGet("id");
    $c = ModelCarte::select($id);
    if(Session::is_admin() && $c != false){
      $controller = 'carte';
      $action="update";
      $view = 'update';
      $pagetitle = 'Modification carte';
      $tab_deck = ModelCategorieDeck::selectAll();
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
    require_once File::build_path(array('model','ModelCategorieDeck.php'));
    $controller='carte';
    $view='update';
    $action="create";
    $pagetitle='Formulaire de création de carte';
    $tab_deck = ModelCategorieDeck::selectAll();

    require File::build_path(array('view','view.php'));
  }

  public static function error(){
    $controller='carte';
    $view='error';
    $pagetitle='Error 404 - Carte non créée';
    require File::build_path(array('view','view.php'));
  }

  public static function created(){
    if(Session::is_admin() || $_POST["source"] == "autre"){ // si le joueur est admin ou que la source de la carte est autre
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
    else{
      ControllerSite::Accueil();
    }
  }

}
