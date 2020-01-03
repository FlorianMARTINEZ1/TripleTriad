<?php
require_once 'lib/File.php';
require_once File::build_path(array('model','ModelCategorieDeck.php'));

class ControllerDeck{

  protected static $object = 'deck';

  public static function readAll(){ //fonctionne
    if(Session::is_admin()){
      $tab_deck = ModelCategorieDeck::selectAll();
      $controller = 'deck';
      $view = 'list';
      $pagetitle = 'Liste des decks';
      require File::build_path(array('view', 'view.php'));
    }
    else{
      ControllerSite::Accueil();
    }
  }

  public static function delete(){//fonctionne
    $deck = myGet('deck');
    if(Session::is_admin()){
        ModelCategorieDeck::delete($deck);
        $path_son = File::build_path_directorie(array('css','son'),$deck);
        if (is_dir($path_son)) {
          rmdir($path_son); // supprimer le dossier dans les sons
        }
        $path_img = File::build_path_directorie(array('css','cartes'),$deck);
        if (is_dir($path_img)) {
          rmdir($path_img); // supprime le dossier dans les cartes
        }
        ControllerDeck::readAll();
    }
    else{
       ControllerProduit::readAll();
    }


  }

  public static function update(){
    $deck = myGet("deck");
    $deck = ModelCategorieDeck::select($deck);
    if(Session::is_admin() && $deck != false){

      $controller = 'deck';
      $action="update";
      $view = 'update';
      $pagetitle = 'Modification deck';
      require File::build_path(array('view', 'view.php'));
    }
    else{
      ControllerSite::Accueil();
    }
  }

  public static function updated(){
    if(!is_null(myGet("deck")) && ModelCategorieDeck::select(myGet("deck")) != false && Session::is_admin()){
      $deck= $_POST['nomDeck'];
      $data = array('nomDeck' => $deck,
                    'affichageDeck' => $_POST['affichageDeck'],);

      ModelCategorieDeck::update($data);
      $message = "deck modifié !";
      $deck = ModelCategorieDeck::select(myGet("deck"));
      $controller='deck';
      $view='update';
      $action="update";
      $pagetitle='Deck modifié';
      require File::build_path(array('view','view.php'));

    }
    else{
      ControllerSite::Accueil();
    }
  }



  public static function create(){ //fonctionne
    $controller='deck';
    $view='update';
    $action="create";
    $pagetitle='Formulaire de création de deck';
    require File::build_path(array('view','view.php'));
  }

  public static function error(){ //fonctionne
    $controller='deck';
    $view='error';
    $pagetitle='Error 404 - deck non créée';
    require File::build_path(array('view','view.php'));
  }

  public static function created(){ //fonctionne
    if(Session::is_admin() ){ // si le joueur est admin
      $message = "";
      $deck= $_POST['nomDeck'];
      $data = array('nomDeck' => $deck,
                    'affichageDeck' => $_POST['affichageDeck'],);

      ModelCategorieDeck::save($data);

      $path = File::build_path_directorie(array('css','son'),$deck); // créer dosssier deck dans le son
      if(!is_dir($path)){
        mkdir($path, 0666);
      }

      $path = File::build_path_directorie(array('css','cartes'),$deck);// créer dosssier deck dans les cartes
      if(!is_dir($path)){
        mkdir($path, 0666);
      }
      if (!empty($_FILES['fond']) && is_uploaded_file($_FILES['fond']['tmp_name'])) {
        $message = $message.ControllerDeck::enregistrefichier($deck,$_FILES['fond'],"sound","fond","mp3",array("mp3","ogg","mpeg"),"son");
      }
      if (!empty($_FILES['victoire']) && is_uploaded_file($_FILES['victoire']['tmp_name'])) {
          $message = $message.ControllerDeck::enregistrefichier($deck,$_FILES['victoire'],"victoire","victoire","mp3",array("mp3","ogg","mpeg"),"son");
      }
      if (!empty($_FILES['défaite']) && is_uploaded_file($_FILES['défaite']['tmp_name'])) {
          $message = $message.ControllerDeck::enregistrefichier($deck,$_FILES['défaite'],"Gameover","défaite","mp3",array("mp3","ogg","mpeg"),"son");
      }
      if (!empty($_FILES['fondImg']) && is_uploaded_file($_FILES['fondImg']['tmp_name'])) {
          $message = $message.ControllerDeck::enregistrefichier($deck,$_FILES['fondImg'],$deck,"victoire","jpg",array("jpeg","jpg","png"),"img");
      }
      $message = $message."Deck créée !";
      $controller='deck';
      $view='update';
      $action="create";
      $pagetitle='Deck créée';
      require File::build_path(array('view','view.php'));
    }
    else{
      ControllerSite::Accueil();
    }
  }


  public static function enregistrefichier($deck, $file, $name, $mess , $type, $tab_allowed,$dir ){
    $message="";
    $explosion = explode('.',$file['name']);
    if (!in_array(end($explosion), $tab_allowed)) {
      if($type = "mp3"){
        $message = "Mauvais type de fichier pour la musique de ".$mess.".\n ";
      }
      else {

      }
      $message = "Mauvais type de fichier pour l'image de fond .\n ";
    }
    else{
      $sound_path = File::build_path_directorie(array('css',$dir,$deck),$name.".".$type);
      if (!move_uploaded_file($file['tmp_name'], $sound_path)) {
        $message = "Impossible de mettre la musique du fond .\n";
      }
    }

    return $message;
  }

}
