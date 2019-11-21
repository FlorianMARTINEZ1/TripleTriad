<?php

require_once '../lib/File.php';
require_once File::build_path(array('model','ModelGame.php'));
require_once File::build_path(array('model','ModelJoueur.php'));

$login = $_GET["log"];
$code = $_GET["code"];

$game = ModelGame::selectWithCode($code);
if($game == false){
  // si la partie exista pas, on fait rien
}
else{
  //sinon on met a jour les données

  $id = $game->get("id");

  $dataGame = array(
    "id" => $id,
    "challenged" => $login,
    "etat" => "accepte"
  );

  $dataJoueur = array(
    "login" => $login,
    "joue" => $id
  );

  ModelGame::update($dataGame);
  ModelJoueur::update($dataJoueur);
  ModelGame::accepter($id);


}
?>
