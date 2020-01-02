<?php

require_once '../lib/File.php';
require_once File::build_path(array('model','ModelGame.php'));
if(isset( $_POST['loginChallenged']) && isset($_POST['loginChallenger'])){
  ModelGame::challenge($_POST['loginChallenged'],$_POST['loginChallenger']);
  echo "Success";
}
else if(isset($_GET['loginChallenged']) && isset($_GET['loginChallenger'])){
  ModelGame::challenge($_GET['loginChallenged'],$_GET['loginChallenger']);
}







?>
