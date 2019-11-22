<?php

require_once '../lib/File.php';
require_once File::build_path(array('model','ModelGame.php'));

$id= $_GET['id'];
$game = ModelGame::select($id);
if($game->get(etat)=="attente"){ // si le 1er joueur à déja fini la partie, le 2éme la fini
  ModelGame::delete($id);
}
else{ // aucun joueur n'a encore terminer la partie
  $data = array(
    "id" => $id,
    "etat" => "attente"
  );
  ModelGame::update($data);
}






?>
