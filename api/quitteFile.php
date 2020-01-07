<?php

require_once '../lib/File.php';
require_once File::build_path(array('model','ModelGame.php'));
require_once File::build_path(array('model','ModelJoueur.php'));


if(isset($_GET["log"])){
  /** Enlève le joueur de la file **/
  ModelJoueur::metEnFileDAttente($_GET["log"],0);
  $idG =  ModelJoueur::select($_GET["log"])->get("joue");

  if(ModelGame::select($idG)->get("etat") == "accepte"){
    // 2ème joueur qui arrive => ne fait rien
  }
  else{ // premier joueur => etat devient accepte
    ModelGame::accepter($idG);
  }
}
if(isset($_POST["log"])){
    ModelJoueur::metEnFileDAttente($_POST["log"],0);
}
?>
