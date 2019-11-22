<?php

require_once '../lib/File.php';
require_once File::build_path(array('model','ModelGame.php'));

$id= $_GET['id'];
$game = ModelGame::select($id);
<<<<<<< HEAD
if($game->get(etat)=="attente"){ // si le 1er joueur à déja fini la partie, le 2éme la fini
=======
if($game->get("etat")=="attente"){ // si le 1er joueur à déja fini la partie, le 2éme la fini
>>>>>>> 2c31dbf7abebfa902c3ac5a1617e6cf06e58a5eb
  ModelGame::delete($id);
}
else{ // aucun joueur n'a encore terminer la partie
  $data = array(
    "id" => $id,
    "etat" => "attente"
  );
  ModelGame::update($data);
}
<<<<<<< HEAD



=======
>>>>>>> 2c31dbf7abebfa902c3ac5a1617e6cf06e58a5eb



?>
