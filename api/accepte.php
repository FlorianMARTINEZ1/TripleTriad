<?php

require_once '../lib/File.php';
require_once File::build_path(array('model','ModelGame.php'));
require_once File::build_path(array('model','ModelJoueur.php'));


if(isset($_GET["id"])){
  $id= $_GET['id'];
}
else if(isset($_GET["log"])){
  $j = ModelJoueur::select("log");
  $id = $j->get("joue");
}
ModelGame::accepter($id);
ModelGame::AttenteConfirmation($id);




?>
