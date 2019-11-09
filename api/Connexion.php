<?php

require_once '../lib/File.php';
require_once File::build_path(array('model','ModelJoueur.php'));

$login = $_GET["login"];

  ModelJoueur::JoueurConnecter($login,"1");


?>
