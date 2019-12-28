<?php

require_once '../lib/File.php';
require_once File::build_path(array('model','ModelGame.php'));
require_once File::build_path(array('model','ModelJoueur.php'));


if(isset($_POST["id"])){
  $id= $_POST['id'];
  ModelGame::accepter($id);
  echo "Success";
}
else if(isset($_GET["log"])){
  $j = ModelJoueur::select("log");
  $id = $j->get("joue");
  ModelGame::AttenteConfirmation($id);
}





?>
