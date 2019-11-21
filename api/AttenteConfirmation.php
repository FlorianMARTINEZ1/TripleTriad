<?php

require_once '../lib/File.php';
require_once File::build_path(array('model','ModelGame.php'));

if(isset($_GET["id"])){
  $id= $_GET['id'];
  ModelGame::attenteConfirmation($id);
}
else{
  $code = $_GET["code"];
  ModelGame::attenteConfirmationAvecCode($code);
}





?>
