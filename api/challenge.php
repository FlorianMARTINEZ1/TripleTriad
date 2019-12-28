<?php

require_once '../lib/File.php';
require_once File::build_path(array('model','ModelGame.php'));

$challenged = $_POST['loginChallenged'];
$challenger = $_POST['loginChallenger'];
ModelGame::challenge($challenged,$challenger);
echo "Success";





?>
