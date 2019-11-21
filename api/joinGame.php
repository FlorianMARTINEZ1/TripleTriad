<?php

require_once '../lib/File.php';
require_once File::build_path(array('model','ModelGame.php'));
require_once File::build_path(array('model','ModelJoueur.php'));

$login = $_GET["login"];
$code = $_GET["code"];

$game = ModelGame::selectWithCode($code);
if($game == false){
  echo json_encode($game);
}
else{
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


}
?>
