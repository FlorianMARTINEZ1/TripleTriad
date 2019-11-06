<?php

require_once '../lib/File.php';
require_once File::build_path(array('model','ModelGame.php'));

$challenged = $_GET['loginChallenged'];
$challenger = $_GET['loginChallenger'];
ModelGame::challenge($challenged,$challenger);





?>
