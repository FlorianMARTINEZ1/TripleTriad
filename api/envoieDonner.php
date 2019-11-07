<?php

require_once '../lib/File.php';
require_once File::build_path(array('model','ModelGame.php'));

$case= $_GET['case'];
$carte = $_GET['carte'];
$id =  $_GET['id'];
ModelGame::envoie($id,$case,$carte);






?>
