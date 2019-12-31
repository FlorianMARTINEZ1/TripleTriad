<?php

require_once '../lib/File.php';
require_once File::build_path(array('model','ModelGame.php'));

if(isset($_GET['id'])){ // jeux multi
  $id =$_GET['id'];
  ModelGame::convertCards($id);
}
else if(isset($_GET["deck"])){ // jeux solo
  require_once File::build_path(array('model','ModelCarte.php'));
  $deck = $_GET["deck"];
  ModelCarte::getAllCarteWithDeck($deck);
}






?>
