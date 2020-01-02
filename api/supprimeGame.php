<?php

require_once '../lib/File.php';
require_once File::build_path(array('model','ModelGame.php'));

$id= $_GET['id'];
sleep(4);
$game = ModelGame::select($id);
if($game != false){
  ModelGame::delete($id);
}
?>
