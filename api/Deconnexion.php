<?php
/*
require_once '../lib/File.php';
require_once File::build_path(array('model','ModelJoueur.php'));

$login = $_GET["login"];

  ModelJoueur::JoueurConnecter($login,"1");

*/
unset($_SESSION['login']);
unset($_SESSION['prenom']);
unset($_SESSION['niv']);
unset($_SESSION['id_user']);
?>
