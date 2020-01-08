<?php

require_once '../lib/File.php';
require_once File::build_path(array('model','ModelGame.php'));

$log = $_GET['log'];
$code = $_GET['code'];
$logAutre = "log"; // met un pseudo en attendant que l'autre joueur se connecte
ModelGame::createGame($log,$code,$logAutre);





?>
