<?php

require_once '../lib/File.php';
require_once File::build_path(array('model','ModelGame.php'));

$log = $_GET['log'];
$code = $_GET['code'];
$logAutre = "attente";
ModelGame::createGame($log,$code,$logAutre);





?>
