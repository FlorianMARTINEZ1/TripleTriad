<?php

require_once '../lib/File.php';
require_once File::build_path(array('model','ModelGame.php'));

$id= $_GET['id'];
ModelGame::attenteConfirmation($id);





?>
