<?php

require_once '../lib/File.php';
require_once File::build_path(array('model','ModelGame.php'));

$log=$_GET["log"];
$case= $_GET['case'];
$carte = $_GET['carte'];
$id =  $_GET['id'];
$game = ModelGame::select($id);
if($game->get("challenged")==$log){
  ModelGame::envoie($id,$case,$carte,"joueur2"); // joueur2 = challenged
}
else if($game->get("challenger")==$log){ // joueur1 = challenger
  ModelGame::envoie($id,$case,$carte,"joueur1");
}







?>
